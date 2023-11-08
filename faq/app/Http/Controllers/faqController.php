<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class faqController extends Controller
{

    public function faqPage(){
        return view("component.faq");
    }
    
    function faq(){
        return DB::table('faq_table')->get();
    }
}
