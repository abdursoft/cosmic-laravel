<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\IssuePackage;
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
        $issues = Issue::latest()->get();
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
            'issue_type'  => 'required|in:free,premium',
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

            if ($issue_status) {
                foreach ($request->packages as $package) {
                    IssuePackage::create([
                        'issue_id'   => $issue->id,
                        'package_id' => $package,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['status' => 'upload successfull'],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'upload failed', 'error' => $th->getmessage()],400);
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

    /**
     * Update an issue.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'sometimes|string|max:255',
            'sub_title'   => 'nullable|string|max:255',
            'thumbnail'   => 'sometimes|file|mimes:jpeg,jpg,png',
            'description' => 'nullable|string',
            'issue'       => 'sometimes|file:mimes:zip',
            'type'        => 'sometimes|in:stander,pro,unlimited',
            'price'       => 'sometimes|numeric|min:0',
            'issue_type'  => 'sometimes|in:free,premium',
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

            if ($issue_status) {
                IssuePackage::where('issue_id', $request->id)->delete();
                foreach ($request->packages as $package) {
                    IssuePackage::create([
                        'issue_id'   => $issue->id,
                        'package_id' => $package,
                    ]);
                }
            }

            DB::commit();
            return back()->with('success', 'Issue successfully updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Issue couldn\'t update ' . $th->getMessage());
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
    public function scan($id, $type, $return = false)
    {
        $issue = Issue::findOrFail($id);
        if ($issue->issue_type == 'premium' && auth()->user()->role !== 'admin') {
            return back()->with('error', 'This issue is not public to read');
        }
        $basePath  = storage_path($issue->issue_path);
        $directory = explode('/', $issue->issue_path);
        $dir       = end($directory);
        $patterns  = [
            'pages' => ['dir' => 'pages', 'regex' => '/^(\d+)\.(jpg|png|gif)$/i', 'formatter' => fn($m, $f, $d) => [
                'page' => (int) $m[1],
                'file' => $f,
                'url'  => asset("storage/issues/$d/pages/$f"),
            ]],
            'audio' => ['dir' => 'audio', 'regex' => '/^bgm(\d+)_(\d+)_([^.]+)\.(mp3|wav|aac)$/i', 'formatter' => fn($m, $f, $d) => [
                'page'        => [(int) $m[1], (int) $m[2]],
                'description' => $m[3],
                'file'        => $f,
                'url'         => asset("storage/issues/$d/audio/$f"),
            ]],
            'sfx'   => [
                'dir'       => 'sfx',
                'regex'     => '/^sfx(\d+)_(\d+)_([^.]+)\.(mp3|wav|aac)$/i',
                'formatter' => fn($m, $f, $d) => [
                    'page'  => array_filter([
                        (int) $m[1],
                        (int) $m[2],
                        is_numeric($m[3]) ? (int) $m[3] : null,
                    ]),
                    'event' => is_numeric($m[3]) ? null : $m[3],
                    'file'  => $f,
                    'url'   => asset("storage/issues/$d/sfx/$f"),
                ],
            ],
        ];

        if (! isset($patterns[$type])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        $p      = $patterns[$type];
        $result = [];
        foreach (scandir($basePath . '/' . $p['dir']) as $file) {
            if (preg_match($p['regex'], $file, $matches)) {
                $result[] = $p['formatter']($matches, $file, $dir);
            }
        }

        if (! $return) {
            return response()->json($result);
        }
        return $result;
    }

    // read issues
    public function readIssue($id)
    {
        $package  = null;
        $issue    = Issue::findOrFail($id);
        $packages = UserSubscription::latest()->get();
        foreach ($packages as $key => $pack) {
            if ($pack->status == 'active') {
                $package = check_package($issue->id, $pack->package_id);
            }
        }

        if ($package || $issue->issue_type == 'free') {
            $sfxs   = $this->scan($id, 'sfx', true);
            $pages  = $this->scan($id, 'pages', true);
            $audios = $this->scan($id, 'audio', true);
            $path   = explode('/', $issue->issue_path);
            $path   = end($path);
            return view('issue', compact('issue', 'sfxs', 'pages', 'audios', 'path'));
        }
        return back()->with('error', 'Your are not able to see this magazine');
    }

    // read issues
    public function adminReadIssue($id)
    {
        $issue  = Issue::findOrFail($id);
        $sfxs   = $this->scan($id, 'sfx', true);
        $pages  = $this->scan($id, 'pages', true);
        $audios = $this->scan($id, 'audio', true);
        $path   = explode('/', $issue->issue_path);
        $path   = end($path);
        return view('issue', compact('issue', 'sfxs', 'pages', 'audios', 'path'));
    }
}
