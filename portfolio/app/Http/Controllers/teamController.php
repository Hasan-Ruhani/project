<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teamController extends Controller
{
    public function teamPage(){
        return view("pages.teamPage");
    }
}
