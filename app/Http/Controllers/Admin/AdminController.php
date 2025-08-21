<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\adminMail;
use App\Models\ContactMessage;
use App\Models\Issue;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // user list
    public function users(){
        $users = User::where('role','user')->latest()->get();
        return view('auth.admin.users',compact('users'));
    }

    // transactions list
    public function transactions(){
        $subscriptions = UserSubscription::with(['package','user'])->latest()->get();
        return view('auth.admin.user-subscription', compact('subscriptions'));
    }

    // issues list
    public function issues(){
        $issues = Issue::all();
        dd($issues);
    }

    // contact list
    public function contacts(){
        $contacts = ContactMessage::all();
        return view('auth.admin.contact',compact('contacts'));
    }

    // replay contact message
    public function replayContact(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
            'id'      => 'required|numeric'
        ]);

        try {
            $contact = ContactMessage::findOrFail($request->id);
            Mail::to($request->email)->send(new adminMail($request->name,$request->email,$request->subject,$request->message));
            $contact->is_replied = 1;
            $contact->reply_message = $request->message;
            $contact->save();
            return back()->with('success','Replay message successfully sent');
        } catch (\Throwable $th) {
            return back()->with('error', 'Replay message couldn\'t sent'. $th->getMessage());
        }
    }
}
