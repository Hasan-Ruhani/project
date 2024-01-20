<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function createCategory(Request $request){
        // $category = Category::create([
        //     'name' => $request->input('category')
        // ]);
        // return $category->toArray();

        $category = Category::where('name', $request->input('category'))->first();

        if ($category) {
            return response()->json(['message' => 'Category already exists'], 409);
        } 
        else {
            $newCategory = Category::create([
                'name' => $request->input('category')
            ]);
            return response()->json($newCategory, 200);
        }
    }
    
    public function allCategory(){
        return Category::all()->toArray();
    }

        public function deleteCategory(Request $request) {
        $category_id = $request -> id;
        return Category::where('id', $category_id) -> delete();
    }
}
