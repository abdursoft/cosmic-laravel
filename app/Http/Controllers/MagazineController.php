<?php
namespace App\Http\Controllers;

use App\Models\Magazine;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    /**
     * Display a listing of the magazines.
     */
    public function index()
    {
        $magazines = Magazine::with(['package', 'issues'])->latest()->get();

        return view('auth.admin.magazine', compact('magazines'));
    }

    /**
     * Store a newly created magazine in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255|unique:magazines',
            'sub_title'      => 'nullable|string|max:255',
            'description'    => 'nullable|string',
            'thumbnail'      => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'intro_image'    => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'package_id'     => 'nullable|exists:packages,id',
            'archive_access' => 'nullable',
            'archive_days'   => 'nullable',
            'publish_date'   => 'required',
            'publish_status' => 'nullable|in:scheduled,published',
            'is_archive'     => 'nullable',
        ]);

        if ($request->hasFile('intro_image')) {
            $thumbnail              = Storage::disk('public')->put('magazines', $request->file('intro_image'));
            $validated['intro_image'] = $thumbnail;
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail              = Storage::disk('public')->put('magazines', $request->file('thumbnail'));
            $validated['thumbnail'] = $thumbnail;
        }

        Magazine::create($validated);

        return back()->with('success', 'Magazine successfully created');
    }

    /**
     * Show the form for editing the specified magazine.
     */
    public function edit($id)
    {
        $magazine  = Magazine::findOrFail($id);
        $magazines = Magazine::with('package')->latest()->get();
        $packages  = Package::latest()->get();

        return view('auth.admin.magazine', compact('magazine', 'magazines', 'packages'));
    }

    /**
     * Update the specified magazine in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'sometimes|string|max:255|unique:magazines,title,' . $id,
            'sub_title'      => 'sometimes|string|max:255',
            'description'    => 'nullable|string',
            'thumbnail'      => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'intro_image'    => 'nullable|file|mimes:jpg,jpeg,png,webp',
            'package_id'     => 'nullable|exists:packages,id',
            'archive_access' => 'nullable',
            'archive_days'   => 'nullable',
            'publish_date'   => 'required',
            'publish_status' => 'sometimes|in:scheduled,published',
            'is_archive'     => 'nullable',
        ]);


        try {
            $magazine = Magazine::findOrFail($id);

            if ($request->hasFile('thumbnail')) {
                $validated['thumbnail'] = Storage::disk('public')->put('magazines', $request->file('thumbnail'));
                if ($magazine->thumbnail) {
                    Storage::disk('public')->delete($magazine->thumbnail);
                }
            }

            if ($request->hasFile('intro_image')) {
                $validated['intro_image'] = Storage::disk('public')->put('magazines', $request->file('intro_image'));
                if ($magazine->intro_image) {
                    Storage::disk('public')->delete($magazine->intro_image);
                }
            }

            $magazine->update($validated);

            return back()->with('success', 'Magazine successfully updated');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Magazine couldn\'t be updated']);
        }
    }

    /**
     * Remove the specified magazine from storage.
     */
    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);

        if ($magazine->thumbnail) {
            Storage::disk('public')->delete($magazine->thumbnail);
        }

        $magazine->delete();

        return back()->with('success', 'Magazine deleted successfully');
    }

    /**
     * Display the specified magazine (optional if you need).
     */
    public function show($magazine)
    {
        return response()->json($magazine->load('package'));
    }

    /**
     * Show magazine for user selection
     */
    public function showMagazineSelect(Request $request, $package){
        $package = Package::find($package);
        $session = Cookie::get('purchase_session');
        return view ('magazine-selection',compact('package','session'));
    }
}
