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

    // public function createSpcContact(Request $request){

    //     $profile_id = $request->input('profile_id');
    //     $profile = Profile::where('id', $profile_id)->first();

    //     if ($profile) {
    //         $clint_Email = $profile->user->email;

    //         $data = [
    //             'profile_id' => $profile_id,
    //             'name' => $request->input('name'),
    //             'email' => $request->input('email'),
    //             'subject' => $request->input('subject'),
    //             'message' => $request->input('message'),
    //         ];

    //         $contact = SpecificContact::create($data);
    //         $response = [
    //             'contact' => $contact,
    //             'clint_Email' => $clint_Email,
    //         ];

    //         return $response;
    //     } else {
    //         return 'Customer profile not exists';
    //     }
    // }

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
                // Mail::to($clint_Email)->send(new contactMail($contact));
                Mail::to($clint_Email)->send(new contactMail(
                    $contact->name,
                    $contact->email,
                    $contact->message
                ));
                
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


    // function sendOTPCode(Request $request){

    //     $email = $request -> input('email');
    //     $otp = rand(100000,999999);
    //     $count = User::where('email','=',$email) -> count();

    //     if($count==1){
    //         // OTP Email Address
    //         Mail::to($email) -> send(new OTPMail($otp));
    //         // OTO Code Table Update
    //         User::where('email','=',$email) -> update(['otp' => $otp]);

    //         return response() -> json([
    //             'status' => 'success',
    //             'message' => '4 Digit OTP Code has been send to your email !'
    //         ],200);
    //     }
    //     else{
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'unauthorized'
    //         ]);
    //     }
    // }
    
}
