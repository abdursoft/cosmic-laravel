<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\StripeController;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Display a listing of the packages.
     */
    public function index()
    {
        $packages = Package::latest()->get();
        return view('auth.admin.package',compact('packages'));
    }

    /**
     * Store a newly created package in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'thumbnail'   => 'required|file|mimes:jpg,jpeg,png,webp',
            'type'        => 'required|in:weekly,monthly,yearly,lifetime',
            'description' => 'required|string',
            'status'      => 'required|in:active,inactive',
            'price'       => 'required|numeric|min:0',
        ]);

        if($request->hasFile('thumbnail')){
            $thumbnail = Storage::disk('public')->put('thumbnail',$request->file('thumbnail'));
            $validated['thumbnail'] = $thumbnail;
        }


        $stripe = new StripeController();
        $product = $stripe->productCreate($request->name,$request->description,$request->price);

        if($product->id ?? $product['id']){
            $validated['product_id'] = $product->id ?? $product['id'];
            $price = $stripe->productPrice($product->id ?? $product['id'], $request->price,'USD',substr($request->type,0,-2));
            $validated['price_id'] = $price['id'] ?? $price->id;
        }else{
            return back()->withErrors('error','Product couldn\'t create in stripe store');
        }

        Package::create($validated);

        return back()->with('success','Product successfully created');
    }

    // edit packages
    public function edit($id){
        $package = Package::findOrFail($id);
        $packages = Package::latest()->get();

        return view('auth.admin.package',compact('package','packages'));
    }

    /**
     * Display the specified package.
     */
    public function show(Package $package)
    {
        return response()->json($package->load('user'));
    }

    /**
     * Update the specified package in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'thumbnail'   => 'sometimes|string',
            'type'        => 'sometimes|in:weekly,monthly,yearly,lifetime',
            'description' => 'sometimes|string',
            'status'      => 'sometimes|in:active,inactive',
            'price'       => 'sometimes|numeric|min:0',
        ]);

        try {
            $package = Package::findOrFail($id);

            if($request->hasFile('thumbnail')){
                $validated['thumbnail'] = Storage::disk('public')->put('thumbnail',$request->file('thumbnail'));
                Storage::disk('public')->delete($package->thumbnail);
            }
            $package->update($validated);
            return back()->with('success', 'Package successfully updated');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Package couldn\'t updated']);
        }
    }

    /**
     * Remove the specified package from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json([
            'message' => 'Package deleted successfully',
        ]);
    }
}
