<?php
namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\GifPack;
use App\Models\Issue;
use App\Models\Magazine;
use App\Models\Package;
use App\Models\User;
use App\Models\UserGif;
use App\Models\UserMagazine;
use App\Models\UserSubscription;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // login page
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('auth.dashboard');
        }
        return view('login');
    }

    // register page
    public function register()
    {
        if (auth()->check()) {
            return redirect()->route('auth.dashboard');
        }
        return view('register');
    }

    // home page
    public function home()
    {
        return view('app');
    }

    // contact page
    public function contact()
    {
        return view('contact');
    }

    // service page
    public function service()
    {
        $packages  = Package::where('status', 'active')->get();
        $gif_packs = GifPack::where('status', 'active')->get();
        return view('service', compact('packages', 'gif_packs'));
    }

    // Demonstration page
    public function demonstration(){
        return view('typeset');
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
            $users        = User::where('role', 'user')->count();
            $magazines    = Magazine::count();
            $issues       = Issue::count();
            $packages     = Package::count();
            $contacts     = ContactMessage::where('is_replied', 0)->count();
            $gif_packages = GifPack::count();
            $prices       = UserSubscription::where('status', 'active')->orWhere('status', 'expired')->sum('price') + UserGif::where('status', 'active')->sum('price');

            $gifs = UserGif::with('users', 'packs')->latest()->get();

            $subscriptions = UserSubscription::with(['package', 'user'])->latest()->get();
            return view('auth.admin.dashboard', compact('users', 'magazines', 'issues', 'packages', 'contacts', 'prices', 'subscriptions', 'gif_packages', 'gifs'));
        }
        $subscriptions = $user->user_subscription()->orderBy('id', 'desc')->get();

        return view('auth.users.dashboard', compact('subscriptions'));
    }

    /**
     * User purchase magazine
     */
    public function userMagazines(Request $request){
        $magIds = UserMagazine::where('user_id',$request->user()->id)->where('status','active')->distinct()->get('magazine_id');

        $magazines = [];
        foreach($magIds as $id){
            $mag = Magazine::where('id',$id->magazine_id)->first();
            if($mag->status === 'active' && $mag->publish_status === 'published'){
                $magazines[] = $mag;
            }
        }
        return view('auth.users.magazine-list',compact('magazines'));
    }
}
