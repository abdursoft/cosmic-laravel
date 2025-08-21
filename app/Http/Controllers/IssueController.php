<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Traits\IssueHelper;
use Illuminate\Http\Request;
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
            'issue_type'  => 'required|in:free,premium'
        ]);

        try {
            if ($request->hasFile('thumbnail')) {
                $thumbnail              = Storage::disk('public')->put('thumbnail', $request->file('thumbnail'));
                $validated['thumbnail'] = $thumbnail;
            }
            if ($request->hasFile('issue')) {
                $issue_path              = $this->uploadIssue($request);
                if(is_array($issue_path)){
                    $validated['issue_path'] = $issue_path['issue'];
                    $validated['issue']      = $issue_path['archive'];
                }
            }
            Issue::create($validated);
            return back()->with('success', 'Issue successfully created');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->withErrors(['error' => 'Issue couldn\'t created']);
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
            'issue_type'  => 'sometimes|in:free,premium'
        ]);

        try {
            $issue = Issue::findOrFail($id);
            if ($request->hasFile('thumbnail')) {
                Storage::disk('public')->delete($issue->thumbnail);
                $validated['thumbnail'] = Storage::disk('public')->put('thumbnail', $request->file('thumbnail'));
            }
            if ($request->hasFile('issue')) {
                $issue_path              = $this->uploadIssue($request);
                if(is_array($issue_path)){
                    $validated['issue_path'] = $issue_path['issue'];
                    $validated['issue']      = $issue_path['archive'];
                    File::deleteDirectory(storage_path($issue->issue_path));
                    File::delete(public_path($issue->issue));
                }
            }

            $issue->update($validated);

            return back()->with('success', 'Issue successfully updated');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Issue couldn\'t updated']);
        }
    }

    /**
     * Remove an issue.
     */
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        if(!empty($issue->issue_path)){
            File::deleteDirectory(storage_path($issue->issue_path));
        }
        if(!empty($issue->issue)){
            File::delete(public_path($issue->issue));
        }
        $issue->delete();
        return back()->with('success', 'Issue successfully deleted');
    }

    // IssueController.php
    public function scan($id, $type,$return=false)
    {
        $issue = Issue::findOrFail($id);
        if($issue->issue_type == 'premium'){
            return back()->with('error','This issue is not public to read');
        }
        $basePath = storage_path($issue->issue_path);
        $directory = explode('/',$issue->issue_path);
        $dir = end($directory);
        $patterns = [
            'pages' => ['dir' => 'pages', 'regex' => '/^(\d+)\.(jpg|png|gif)$/i', 'formatter' => fn($m,$f,$d)=>[
                'page'=>(int)$m[1],'file'=>$f,'url'=>asset("storage/issues/$d/pages/$f")
            ]],
            'audio' => ['dir' => 'audio', 'regex' => '/^bgm(\d+)_(\d+)_([^.]+)\.(mp3|wav)$/i', 'formatter' => fn($m,$f,$d)=>[
                'page'=>[(int)$m[1],(int)$m[2]],'description'=>$m[3],'file'=>$f,'url'=>asset("storage/issues/$d/audio/$f")
            ]],
            'sfx'   => ['dir' => 'sfx',   'regex' => '/^sfx(\d+)_(\d+)_([^.]+)\.(mp3|wav)$/i', 'formatter' => fn($m,$f,$d)=>[
                'page'=>[(int)$m[1],(int)$m[2]],'event'=>$m[3],'file'=>$f,'url'=>asset("storage/issues/$d/sfx/$f")
            ]],
        ];

        if (!isset($patterns[$type])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        $p = $patterns[$type];
        $result = [];
        foreach (scandir($basePath.'/'.$p['dir']) as $file) {
            if (preg_match($p['regex'], $file, $matches)) {
                $result[] = $p['formatter']($matches, $file,$dir);
            }
        }

        if(!$return){
            return response()->json($result);
        }
        return $result;

    }

    // read issues
    public function readIssue($id){
        $issue = Issue::findOrFail($id);
        $sfxs = $this->scan($id,'sfx',true);
        $pages = $this->scan($id,'pages',true);
        $audios = $this->scan($id,'audio',true);
        $path = explode('/',$issue->issue_path);
        $path = end($path);
        return view('issue',compact('issue','sfxs','pages','audios','path'));
    }

}
