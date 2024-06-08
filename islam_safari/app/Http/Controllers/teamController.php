<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class teamController extends Controller
{

    public function dashboardPage(){
        return view("pages.dashboard");
    }

    public function profilePage(){
        return view("pages.index.profile_dashboardPage");
    }

    public function profileDetail_page(){
        return view("pages.others.profile_details");
    }

    function createProfile(Request $request){
        // Get the user ID from the request header
    $user_id = $request->header('id');

    // Validate the request
    $validatedData = $request->validate([
        'image' => 'nullable|image|max:5120',
        'designation' => 'nullable|string|max:50',
        'description' => 'nullable|string|max:2000',
        'facebook' => 'nullable|string|max:500',
        'whatsapp' => 'nullable|string|max:500',
    ]);

    // Set default value for designation if not provided
    if (empty($validatedData['designation'])) {
        $validatedData['designation'] = 'Student';
    }

    // Handle the image upload
    $img_url = null;
    if ($request->hasFile('image')) {
        $img = $request->file('image');
        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$user_id}-{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";
        $img->move(public_path('uploads'), $img_name);
        $validatedData['image'] = $img_url;
    }

    // Add the user ID to the validated data
    $validatedData['user_id'] = $user_id;

    // Save to database
    $profile = Profile::create($validatedData);

    return response()->json([
        'message' => 'Profile created successfully',
        'profile' => $profile
    ], 201);
    }

    

    public function profileDetail(Request $request):JsonResponse{

        $data=User::where('id',$request->id) -> with('profile') -> get();

        return ResponseHelper::Out('success',$data,200);
    }

    public function userList(): JsonResponse {
        $data = User::with('profile') -> get();
        return ResponseHelper::Out('success', $data, 200);
    }
    

    function userProfile(Request $request){
        $user_id = $request -> header('id');
        $profile = User::where('id', $user_id) -> with('profile') -> first();
        return response() -> json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $profile
        ],200);
    }


    function updateProfile(Request $request){
        $user_id = $request -> header('id');
        $user = User::where('id', $user_id) -> first();
        $profile_id = $user->profile->id;

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

             $profile =  Profile::where('id', $profile_id) -> update([
                    
                    'designation' => $request->input('designation'),
                    'description' => $request->input('description'),
                    'image' => $img_url,
                    'facebook' => $request->input('facebook'),
                    'whatsapp' => $request->input('whatsapp'),
                    ]);

                    $user =  User::where('id', $user_id) -> update([

                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'number' => $request->input('number'),
                    ]);

                    if (!$user  || !$profile ) {
                        return false;
                    } else {
                        return true;
                    }
            }
            else{
                 $profile = Profile::where('id', $profile_id) -> update([
                    
                    'designation' => $request->input('designation'),
                    'description' => $request->input('description'),
                    'facebook' => $request->input('facebook'),
                    'whatsapp' => $request->input('whatsapp'),
                ]);

                $user = User::where('id', $user_id) -> update([

                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'number' => $request->input('number'),
                    ]);

                    if (!$user  || !$profile ) {
                        return false;
                    } else {
                        return true;
                    }
                }
            }

    function deleteProfile(Request $request){
        $user_id = $request -> header('id');
        $profile_id = $request -> input('id');
        $filePath = $request -> input('file_path');
        File::delete($filePath);
        
        return Profile::where('id', $profile_id) -> where('user_id', $user_id) -> delete();
    }
}

