<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\StripeController;
use App\Models\GifPack;
use App\Models\UserGif;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserGifController extends Controller
{
    // purchase gif pack
    public function purchaseGifPack($id)
    {
        $user = auth()->user();
        if (empty($user->id)) {
            return back()->with('error', 'Please login to access this page');
        }

        try {
            $gif      = GifPack::findOrFail($id);
            $stripe   = new StripeController();
            $trans_id = bin2hex(random_bytes(16));
            $payment  = $stripe->payment($user->email, $gif->price, 'USD', $gif->title, ['title' => $gif->title, 'user' => $user->id], $trans_id);
            DB::beginTransaction();
            UserGif::create([
                'price'       => $gif->price,
                'user_id'     => $user->id,
                'gif_pack_id' => $gif->id,
                'payment_id'  => $trans_id,
                'txn_id'      => $payment['id'],
            ]);
            DB::commit();
            return redirect()->away($payment['url']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Gif package couldn\'t prepare for download ' . $th->getMessage());
        }
    }

    // user gif pack history
    public function userGifPacks()
    {
        $gifs = auth()->user()->gifs()->with('packs')->get();
        return view('auth.users.gif-packs', compact('gifs'));
    }

    // download gif packages
    public function downloadGifPacks($id)
    {

        $purchase = UserGif::where('status','active')->where('id',$id)->first();
        if(empty($purchase->id)){
            return redirect()->route('home')->with('error','You are not allowed to download this gif package');
        }

        $gifPack = GifPack::findOrFail($purchase->gif_pack_id);
        if (! Storage::disk('public')->exists($gifPack->gif_archive)) {
            abort(404, 'File not found');
        }

        return Storage::disk('public')->download($gifPack->gif_archive, $gifPack->title . '.' . pathinfo($gifPack->gif_archive, PATHINFO_EXTENSION));
    }
}
