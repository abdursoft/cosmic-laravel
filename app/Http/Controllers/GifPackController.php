<?php

namespace App\Http\Controllers;

use App\Models\GifPack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GifPackController extends Controller
{
    /**
     * Display a listing of gif packs.
     */
    public function index()
    {
        $gifPackages = GifPack::latest()->get();
        return view('auth.admin.gif-pack', compact('gifPackages'));
    }

    /**
     * Show the form for creating a new gif pack.
     */
    public function create()
    {
        return view('gif_packs.create');
    }

    /**
     * Store a newly created gif pack.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'thumbnail'   => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gif_archive' => 'required|mimes:zip,gif|max:100240',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'status'      => 'in:active,inactive',
        ]);

        try {
            // Upload files
            $thumbnailPath = $request->file('thumbnail')->store('gif_packs/thumbnails', 'public');
            $archivePath   = $request->file('gif_archive')->store('gif_packs/archives', 'public');

            // Save record
            GifPack::create([
                'title'       => $request->title,
                'thumbnail'   => $thumbnailPath,
                'gif_archive' => $archivePath,
                'description' => $request->description,
                'price'       => $request->price ?? 0,
                'status'      => $request->status ?? 'active',
            ]);

            return back()->with('success', 'Gif Pack created successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gif Pack couldn\'t created');
        }
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $gif_pack    = GifPack::findOrFail($id);
        $gifPackages = GifPack::latest()->get();
        return view('auth.admin.gif-pack', compact('gif_pack', 'gifPackages'));
    }

    /**
     * Update gif pack.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'gif_archive' => 'nullable|mimes:zip,gif|max:100240',
            'description' => 'nullable|string',
            'price'       => 'nullable|numeric|min:0',
            'status'      => 'in:active,inactive',
        ]);

        try {
            $gifPack = GifPack::findOrFail($id);
            // Update thumbnail if new uploaded
            if ($request->hasFile('thumbnail')) {
                Storage::disk('public')->delete($gifPack->thumbnail);
                $gifPack->thumbnail = $request->file('thumbnail')->store('gif_packs/thumbnails', 'public');
            }

            // Update archive if new uploaded
            if ($request->hasFile('gif_archive')) {
                Storage::disk('public')->delete($gifPack->gif_archive);
                $gifPack->gif_archive = $request->file('gif_archive')->store('gif_packs/archives', 'public');
            }

            $gifPack->title =  $request->title;
            $gifPack->description= $request->description;
            $gifPack->price = $request->price ?? $gifPack->price;
            $gifPack->status =  $request->status ?? $gifPack->status;
            $gifPack->save();

            return back()->with('success', 'Gif Pack updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gif Pack couldn\'t updated');
        }
    }

    /**
     * Delete gif pack.
     */
    public function destroy(GifPack $gifPack)
    {
        Storage::disk('public')->delete([$gifPack->thumbnail, $gifPack->gif_archive]);
        $gifPack->delete();

        return redirect()->route('gif_packs.index')->with('success', 'Gif Pack deleted successfully!');
    }
}
