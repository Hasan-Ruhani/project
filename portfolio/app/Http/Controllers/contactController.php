<?php

namespace App\Http\Controllers;

use App\Mail\contactMail;
use App\Models\Profile;
use App\Models\SpecificContact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    public function contactPage(){
        return view("pages.contactPage");
    }

    public function createSpcContact(Request $request){

        $profile_id = $request->input('profile_id');
        $profile = Profile::where('id', $profile_id)->first();
        
        if ($profile) {
            $clint_Email = $profile->user->email;
            $data = [
                'profile_id' => $profile_id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'clint_email' => $clint_Email,
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ];

           $contact = SpecificContact::create($data);

            if ($contact) {
               Mail::to($clint_Email)->send(new contactMail($data));
               
            }

            return $contact;
        } else {
            return 'Customer profile not exists';
        }
    }



    public function spcUserContact(Request $request) {
        $user_id = $request->header('id');
        $user = User::find($user_id);
    
        if ($user) {
            $profile_id = $user->profile->id;
            return Profile::where('id', $profile_id)->with('spcContact')->get();
        } else {
            return 'No contact found for the user.';
        }
    }
    
}
