<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName);
                $imageUrl = 'storage/images/' . $imageName;

                $test = new Test();
                $test->name = $request->input('name');
                $test->url = $imageUrl;
                $test->save();
            }

            return 'Images uploaded successfully';
        }

        return 'No images were uploaded';
    }
}

