<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function homePage(){
        return view("pages.homePage");
    }
    
    public function errorPage(){
        return view("pages.404Page");
    }
}
