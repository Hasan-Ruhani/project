<?php

namespace App\Http\Controllers;

use App\MOdels\File;
use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function index()
    {
        return view('fileUpload');
    }

    // public function store(Request $request)
    // {
    //     if ($request->hasfile('images')) {
    //         foreach ($request->file('images') as $file) {
    //             $path = $file->store('images/all', 'admin'); // This will save in 'storage/app/public/images'
    //             $images[] = $path; // This will store the path in the array
    //         }
    //     }

    //     foreach ($images as $image) {
    //         Image::create([
    //             'related_id' => '0',
    //             'filename' => basename($image) // Store just the filename
    //         ]);
    //     }

    //     return back()->with('success', 'Images uploaded successfully');
    // }
    
    public function store(Request $request){
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('images/all', 'admin');
                $images[] = $path;
            }
        }

        foreach ($images as $image) {
            Image::create([
                'related_id' => '0',
                'filename' => basename($image)
            ]);
        }

        return response()->json(['message' => 'Images uploaded successfully'], 201);
    }

}
