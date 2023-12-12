<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function createCategory(Request $request){
        $category = Category::create([
            'category' => $request -> input('category')
        ]);
        return $category;
    }
}
