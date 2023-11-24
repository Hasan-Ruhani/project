<?php

namespace App\Http\Controllers;

use App\Helper\adminJWTToken;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\View\View;

class adminController extends Controller
{

    function AdminPage():View{
        return view('pages.auth.admin-page');
    }

    function adminLogin(Request $request){
        $count = Admin::where('email','=',$request -> input('email'))
             -> where('password','=',$request -> input('password'))
             -> select('id') -> first();
 
        if($count!==null){
            // User Login-> JWT Token Issue
            $admintoken=adminJWTToken::CreateToken($request -> input('email'),$count -> id);
            return response() -> json([
                'status' => 'success',
                'message' => 'Admin Login Successful',
            ],200) -> cookie('token',$admintoken,60*24*30);
        }
        else{
            return response() -> json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ],200);
 
        }
 
     }

     function adminLogout(){
        return redirect('/adminLogin') -> cookie('admin_token', '', -1);
    }
}
