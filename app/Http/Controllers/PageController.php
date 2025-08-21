<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Issue;
use App\Models\Package;
use App\Models\User;
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
        return view('service', compact('packages'));
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
            $prices   = UserSubscription::where('status', 'active')->orWhere('status', 'expired')->sum('price');

            $subscriptions = UserSubscription::with(['package','user'])->latest()->get();
            return view('auth.admin.dashboard', compact('users', 'issues', 'packages', 'contacts', 'prices', 'subscriptions'));
        }
        $subscriptions = $user->user_subscription;

        return view('auth.users.dashboard',compact('subscriptions'));
    }
}
