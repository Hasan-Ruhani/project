<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function store(Request $request)
    {
        $images = [];

        if ($request->hasFile('files')) {
            $test = Test::create(); // Create a new Test model

            foreach ($request->file('files') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $images[] = $fileName; // Store the file names in an array
            }

            // Associate the uploaded images with the Test model
            foreach ($images as $image) {
                $test->images()->create(['image' => $image]);
            }

            return "Images uploaded and associated with the Test model";
        } else {
            return "No files uploaded";
        }
    }


        
}
