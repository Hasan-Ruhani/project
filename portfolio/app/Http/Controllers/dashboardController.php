<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

    public function dashboardPage(){
        return view("pages.dashboard");
    }

    function createProfile(Request $request){
        $user_id = $request->header('id');

        $img = $request->file('image');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$user_id}-{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";

        $img -> move(public_path('uploads'), $img_name);

        // save to database
        return Profile::where($user_id, $request -> input('id')) -> create([
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'description' => $request->input('description'),
            'image' => $img_url,
            'facebook' => $request->input('facebook'),
            'github' => $request->input('github'),
            'linkedin' => $request->input('linkedin'),
            'user_id' => $user_id
        ]);
    }

    function deleteProfile(Request $request){
        $user_id = $request -> header('id');
        $profile_id = $request -> input('id');
        $filePath = $request -> input('file_path');
        File::delete($filePath);
        // return Profile::where('id', $member_id) -> delete();
        return Profile::where('id', $profile_id) -> where('user_id', $user_id) -> delete();
    }

    public function profileList(): JsonResponse{
        $data = Profile::all();
        return ResponseHelper::Out('success', $data, 200);
    }

    function userProfile(Request $request){
        $user_id = $request -> header('id');
        $profile = Profile::where($user_id, $request -> input('id')) -> first();
        return response() -> json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $profile
        ],200);
    }


    function updateProfile(Request $request){
        $user_id = $request -> header('id');
        $profile_id = $request -> input('id');

        if($request -> hasFile('image')){

            // upload new file/image
            $img = $request -> file('image');
            $t = time();
            $file_name = $img -> getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img -> move(public_path('uploads'), $img_name);

            // delete old file/image
            $file_path = $request -> input('file_path');
            File::delete($file_path);

            // update Member
            return Profile::where('id', $profile_id) -> where('user_id', $user_id) -> update([
            // return MemberDetail::where('id', $member_id) -> update([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'description' => $request->input('description'),
                'image' => $img_url,
                'facebook' => $request->input('facebook'),
                'github' => $request->input('github'),
                'linkedin' => $request->input('linkedin'),
                ]);
        }
        else{
            return Profile::where('id', $profile_id) -> where('user_id', $user_id) -> update([
            // return MemberDetail::where('id', $member_id) -> update([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'description' => $request->input('description'),
                'social_link1' => $request->input('social_link1'),
                'social_link2' => $request->input('social_link2'),
                'social_link3' => $request->input('social_link3'),
            ]);
        }

    }
}
