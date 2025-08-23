<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\GifPack;
use App\Models\Issue;
use App\Models\Package;
use App\Models\User;
use App\Models\UserGif;
use App\Models\UserSubscription;

class PageController extends Controller
{
    // login page
    public function login()
    {
        return view('login');
    }

    // register page
    public function register()
    {
        return view('register');
    }

    // home page
    public function home()
    {
        $issues = Issue::where('status', 'active')->latest()->get();
        return view('app', compact('issues'));
    }

    // contact page
    public function contact()
    {
        return view('contact');
    }

    // service page
    public function service()
    {
        $packages = Package::all();
        $gif_packs = GifPack::all();
        return view('service', compact('packages','gif_packs'));
    }

    // forgot password page
    public function forgotPassword()
    {
        return view('password.forgot-password');
    }

    // reset new password page
    public function resetNewPassword()
    {
        return view('password.reset-password');
    }

    // dashboard page
    public function dashboard()
    {
        $user = auth()->user();
        if ($user->isAdmin()) {
            $users    = User::where('role', 'user')->count();
            $issues   = Issue::count();
            $packages = Package::count();
            $contacts = ContactMessage::where('is_replied', 0)->count();
            $gif_packages = GifPack::count();
            $prices   = UserSubscription::where('status', 'active')->orWhere('status', 'expired')->sum('price') + UserGif::where('status','active')->sum('price');

            $gifs = UserGif::with('users','packs')->latest()->get();

            $subscriptions = UserSubscription::with(['package','user'])->latest()->get();
            return view('auth.admin.dashboard', compact('users', 'issues', 'packages', 'contacts', 'prices', 'subscriptions','gif_packages','gifs'));
        }
        $subscriptions = $user->user_subscription;

        return view('auth.users.dashboard',compact('subscriptions'));
    }
}
