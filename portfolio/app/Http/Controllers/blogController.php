<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogController extends Controller
{
    public function blogPage(){
        return view("pages.blogPage");
    }
}
