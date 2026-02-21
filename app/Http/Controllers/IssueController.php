<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssuePackage;
use App\Models\IssueSequence;
use App\Models\Magazine;
use App\Models\UserMagazine;
use App\Models\UserSubscription;
use App\Traits\IssueHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class IssueController extends Controller
{

    use IssueHelper;
    /**
     * Display a listing of issues.
     */
    public function index()
    {
        $issues = Issue::with(['magazines' => function($m){
            $m->select('title','sub_title','id');
        }])->latest()->get();
        return view('auth.admin.issue', compact('issues'));
    }

    /**
     * Store a newly created issue.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'sub_title'   => 'nullable|string|max:255',
            'thumbnail'   => 'required|file|mimes:jpeg,jpg,png,webp',
            'description' => 'nullable|string',
            'magazine_id' => 'required|exists:magazines,id',
            'issue_index' => 'required|numeric'
        ]);

        $issue_status = false;
        if ($request->issue_type == 'premium') {
            if (empty($request->packages)) {
                return back()->with('error', 'Please select some subscription package for premium issue');
            }
            $issue_status = true;
        }

        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnail              = Storage::disk('public')->put('thumbnail', $request->file('thumbnail'));
                $validated['thumbnail'] = $thumbnail;
            }
            if ($request->hasFile('issue')) {
                $issue_path = $this->uploadIssue($request);
                if (is_array($issue_path)) {
                    $validated['issue_path'] = $issue_path['issue'];
                    $validated['issue']      = $issue_path['archive'];
                }
            }
            DB::beginTransaction();
            $issue = Issue::create($validated);

            DB::commit();
            return response()->json(['status' => 'upload successful'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'upload failed', 'error' => $th->getmessage()], 400);
        }
    }

    /**
     * Edit an existing issue
     */
    public function edit($id)
    {
        $issue  = Issue::findOrFail($id);
        $issues = Issue::latest()->get();
        return view('auth.admin.issue', compact('issue', 'issues'));
    }

    /**
     * Display a specific issue.
     */
    public function show(Issue $issue)
    {
        return response()->json($issue);
    }

    // show magazines
    public function showMagazines()
    {
        $magazines = Magazine::where('status', 'active')->get();
        return view('magazines', compact('magazines'));
    }

    // show issues
    public function showIssues($id)
    {
        $magazine = Magazine::with(['issues' => function($issue){
            $issue->where('status','active')->get();
        }])->find($id);
        return view('issues', compact('magazine'));
    }

    /**
     * Update an issue.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'sometimes|string|max:255',
            'sub_title'   => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type'        => 'sometimes|in:stander,pro,unlimited',
            'price'       => 'sometimes|numeric|min:0',
            'issue_type'  => 'sometimes|in:free,premium',
            'magazine_id' => 'required|exists:magazines,id',
            'issue_index' => 'required|numeric'
        ]);

        $issue_status = false;
        if ($request->issue_type == 'premium') {
            if (empty($request->packages)) {
                return back()->with('error', 'Please select some subscription package for premium issue');
            }
            $issue_status = true;
        }

        try {
            $issue = Issue::findOrFail($id);
            if ($request->hasFile('thumbnail')) {
                Storage::disk('public')->delete($issue->thumbnail);
                $validated['thumbnail'] = Storage::disk('public')->put('thumbnail', $request->file('thumbnail'));
            }
            if ($request->hasFile('issue')) {
                $issue_path = $this->uploadIssue($request);
                if (is_array($issue_path)) {
                    $validated['issue_path'] = $issue_path['issue'];
                    $validated['issue']      = $issue_path['archive'];
                    File::deleteDirectory(storage_path($issue->issue_path));
                    File::delete(public_path($issue->issue));
                }
            }

            DB::beginTransaction();
            $issue->update($validated);

            DB::commit();
            return response()->json(['status' => 'upload successful'], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Remove an issue.
     */
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        if (! empty($issue->issue_path)) {
            File::deleteDirectory(storage_path($issue->issue_path));
        }
        if (! empty($issue->issue)) {
            File::delete(public_path($issue->issue));
        }
        $issue->delete();
        return back()->with('success', 'Issue successfully deleted');
    }

    // IssueController.php
    public function scan($id, $type, $demo = false, $return = false)
    {
        $issue = Issue::findOrFail($id);
        if (!$demo && $issue->issue_type == 'premium' && ! auth()->user()?->id) {
            return [];
        }

        $basePath  = storage_path($issue->issue_path);
        $directory = explode('/', $issue->issue_path);
        $dir       = end($directory);

        // Helper: build URL
        $makeUrl = fn($folder, $file, $dir) => asset("storage/issues/$dir/$folder/$file")."?time=".time();

        // Helper: extract all numbers from filename
        $extractNumbers = function ($file) {
            $name = pathinfo($file, PATHINFO_FILENAME); // removes .mp3/.wav/.aac
            preg_match_all('/\d+/', $name, $matches);
            return array_map('intval', $matches[0]);
        };

        $patterns = [
            'pages' => [
                'dir'       => 'pages',
                'regex'     => '/^\d+\.(jpg|png|gif|webp)$/i',
                'formatter' => fn($m, $f, $d) => [
                    'page' => (int) preg_replace('/\D/', '', pathinfo($f, PATHINFO_FILENAME)),
                    'file' => $f,
                    'url'  => $makeUrl('pages', $f, $d),
                ],
            ],
            'audio' => [
                'dir'       => 'audio',
                'regex'     => '/^bgm.*\.(mp3|wav|aac)$/i',
                'formatter' => fn($m, $f, $d) => [
                    'pages'       => $extractNumbers($f), // e.g. [12, 15]
                    'description' => preg_replace('/\d+|bgm|\.mp3|\.wav|\.aac/i', '', pathinfo($f, PATHINFO_FILENAME)),
                    'file'        => $f,
                    'url'         => $makeUrl('audio', $f, $d),
                ],
            ],
            'bmg' => [
                'dir'       => 'bmg',
                'regex'     => '/^bmg.*\.(mp3|wav|aac)$/i',
                'formatter' => fn($m, $f, $d) => [
                    'pages'       => $extractNumbers($f), // e.g. [12, 15]
                    'description' => preg_replace('/\d+|bmg|\.mp3|\.wav|\.aac/i', '', pathinfo($f, PATHINFO_FILENAME)),
                    'file'        => $f,
                    'url'         => $makeUrl('bmg', $f, $d),
                ],
            ],
            'sfx'   => [
                'dir'       => 'sfx',
                'regex'     => '/^sfx.*\.(mp3|wav|aac)$/i',
                'formatter' => fn($m, $f, $d) => [
                    'pages' => $extractNumbers($f), // e.g. [5, 10, 12]
                    'event' => preg_replace('/\d+|sfx|\.mp3|\.wav|\.aac/i', '', pathinfo($f, PATHINFO_FILENAME)) ?: null,
                    'file'  => $f,
                    'url'   => $makeUrl('sfx', $f, $d),
                ],
            ],
            'gfx'   => [
                'dir'       => 'gfx',
                'regex'     => '/^gfx.*\.(mp3|wav|aac)$/i',
                'formatter' => fn($m, $f, $d) => [
                    'pages' => $extractNumbers($f), // e.g. [16, 19, 21, 23]
                    'event' => preg_replace('/\d+|gfx|\.mp3|\.wav|\.aac/i', '', pathinfo($f, PATHINFO_FILENAME)) ?: null,
                    'file'  => $f,
                    'url'   => $makeUrl('gfx', $f, $d),
                ],
            ],
        ];

        if (! isset($patterns[$type])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        $p      = $patterns[$type];
        $result = [];

        foreach (scandir($basePath . '/' . $p['dir']) as $i=>$file) {
            if (preg_match($p['regex'], $file)) {
                $result[] = $p['formatter']([], $file, $dir);
            }
        }

        return $result;
    }

    // read issues
    public function readIssue(Request $request, $id)
    {
        $sequence = IssueSequence::where('issue_id',$id)->where('user_id',$request->user()->id)->first();

        if($request->user()->role == 'user' && ($sequence->status == 'archived' && !$sequence->magazine->accessible())){
            return back()->with('error', 'Your are not able to see this magazine');
        }

        if ($sequence->magazine) {
            $path   = explode('/', $sequence->issue->issue_path);
            $path   = end($path);
            $issue  = $sequence->issue;
            $demo   = false;
            return view('issue', compact('issue', 'path','demo'));
        }

        return back()->with('error', 'Your are not able to see this magazine');
    }

    // show demo issue
    public function demoIssue($issue=null){
        if($issue){
            $issue = Issue::findOrFail($issue);
        }else{
            $issue  = Issue::where('status','active')->orderBy('id','desc')->first();
        }

        $path   = explode('/', $issue->issue_path);
        $path   = end($path);
        $demo   = true;
        return view('issue', compact('path','issue','demo'));
    }

    // user magazines
    public function userMagazine($subscription)
    {
        $subscription = UserSubscription::where('user_id', auth()->user()->id)->where('status', 'active')->find($subscription);

        return view('auth.users.magazines', compact('subscription'));
    }

    // open issues according the magazine id
    public function openIssues(Request $request, $id)
    {
        $magazines = IssueSequence::where('user_id', $request->user()->id)->where('magazine_id', $id)->get();

        if (!$magazines) {
            return back()->with('error', "There are no issues according the magazine {$id}");
        }

        $magazine = Magazine::find($id);

        $active  = [];
        $archive = [];
        foreach ($magazines as $mag) {
            if($mag->status == 'active'){
                $active[] = $mag->issue;
            }else{
                $archive[] = $mag->issue;
            }
        }

        return view('auth.users.issues', compact('magazine', 'active', 'archive'));
    }


    // read issues
    public function adminReadIssue($id)
    {
        $issue  = Issue::findOrFail($id);
        $path   = explode('/', $issue->issue_path);
        $path   = end($path);
        $demo   = false;
        return view('issue', compact('issue', 'path','demo'));
    }

    public function active(){
        $issues = Issue::get();
        foreach($issues as $issue){
            $issue->is_archive = 0;
            $issue->save();
        }
    }
}
