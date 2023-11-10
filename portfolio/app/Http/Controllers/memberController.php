<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Member;
use App\Models\MemberDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class memberController extends Controller
{
    public function blogPage(){
        return view("pages.blogPage");
    }

    public function memberList(): JsonResponse{
        $data = MemberDetail::all();
        return ResponseHelper::Out('success', $data, 200);
    }


    public function memberDetail(Request $request):JsonResponse{

        $data=MemberDetail::where('id',$request->id)->get();

        return ResponseHelper::Out('success',$data,200);
    }
}
