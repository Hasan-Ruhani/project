<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\MemberDetail;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    function createMember(Request $request){
        // $user_id = $request->header('id');

        $img = $request->file('image');

        $t = time();
        $file_name = $img->getClientOriginalName();
        // $img_name = "{$user_id}-{$t}-{$file_name}";
        $img_name = "{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";

        $img -> move(public_path('uploads'), $img_name);

        // save to database
        return MemberDetail::create([
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'description' => $request->input('description'),
            'image' => $img_url,
            'social_link1' => $request->input('social_link1'),
            'social_link2' => $request->input('social_link2'),
            'social_link3' => $request->input('social_link3'),
            // 'user_id' => $user_id
        ]);
    }

    function deleteMember(Request $request){
        // $user_id = $request -> header('id');
        $member_id = $request -> input('id');
        $filePath = $request -> input('file_path');
        File::delete($filePath);
        return MemberDetail::where('id', $member_id) -> delete();
        // return MemberDetail::where('id', $member_id) -> where('user_id', $user_id) -> delete();
    }


    function updateMember(Request $request){
        // $user_id = $request -> header('id');
        $member_id = $request -> input('id');

        if($request -> hasFile('image')){

            // upload new file/image
            $img = $request -> file('image');
            $t = time();
            $file_name = $img -> getClientOriginalName();
            // $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img -> move(public_path('uploads'), $img_name);

            // delete old file/image
            $file_path = $request -> input('file_path');
            File::delete($file_path);

            // update Member
            // return MemberDetail::where('id', $member_id) -> where('user_id', $user_id) -> update([
            return MemberDetail::where('id', $member_id) -> update([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'description' => $request->input('description'),
                'image' => $img_url,
                'social_link1' => $request->input('social_link1'),
                'social_link2' => $request->input('social_link2'),
                'social_link3' => $request->input('social_link3'),
                ]);
        }
        else{
            // return MemberDetail::where('id', $product_id) -> where('user_id', $user_id) -> update([
            return MemberDetail::where('id', $member_id) -> update([
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
