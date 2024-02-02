<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\PortfolioDetail;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function portfolio_dash(){
        return view('components.dashboard.portfolioItem');
    }

    public function portfolioDetail_page(){
        return view('pages.others.portfolioDetails');
    }

    public function createPortfolio_item(Request $request) {
        $category_id = $request->id;
        $category = Category::find($category_id);

        
        if (!$category) {
            return "Please insert a valid category first";
        }
        else {
     
            if ($request->hasFile('front_img')) {
                $img = $request->file('front_img');
                $t = time();
    
                $file_extension = $img->getClientOriginalName();
                $img_name = "{$t}-{$file_extension}";
                $img_url = "public/uploads/{$img_name}";
                $img->move(public_path('uploads'), $img_name);
    
                $portfolio = PortfolioDetail::create([
                    'category_id' => $category->id,
                    'head_line' => $request->input('head_line'),
                    'front_img' => $img_url,
                    'short_des' => $request->input('short_des'),
                    'description' => $request->input('description'),
                    'client' => $request->input('client'),
                    'date' => $request->input('date'),
                    'project_url' => $request->input('project_url')
                ]);

                if ($request->hasfile('images')) {
                    foreach ($request->file('images') as $file) {
                        $time = time();
                        $file_name = $file->getClientOriginalName();
                        $image_name = "{$time}-{$file_name}";
                        $path = $file->store('multi_img', 'public');

                        // if ($request->hasFile('images')) {
                        //     $images = [];
                        //     foreach ($request->file('images') as $file) {
                        //         $path = $file->store('uploads', 'public');
                        //         $images[] = $path;
                        //     }
                        // }

                        Image::create([
                            'portfolio_id' => $portfolio -> id,
                            'filename' => $path
                        ]);
                    }

                } else {
                    return "No image found in the request";
                }
                return response()->json(['message' => 'Data addeded successfully'], 201);
            } else {
                return "No image found in the request";
            }

        }
    }    
    

    public function updatePortfolio_item(Request $request) {
        $portfolio_id = $request->id;
        $portfolio = PortfolioDetail::find($portfolio_id);
        // gettype($portfolio);
        if(!$portfolio){
            return "Not found portfolio for this ID";
        }
        else{
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img->move(public_path('uploads'), $img_name);
    
            $portfolio->title = $request->input('title');
            $portfolio->image = $img_url;
            $portfolio->short_des = $request->input('short_des');
            $portfolio->save();
    
            return "Portfolio item updated successfully";
        }
    }
    

    public function portfolioDetail(Request $request){
        $id = $request->id;
        return PortfolioDetail::with('images') -> with('category')->find($id);
    }
    

    public function portfolioBy_category(Request $request) {
        $category_id = $request -> id;
        $category = Category::where('id', $category_id) -> first();
        if(!$category){
            return "No category found for this Item!!";
        }

        else{
            return PortfolioDetail::where('category_id', $category_id) -> get();
        }
    }

    public function allPortfolio() {
        return PortfolioDetail::all();
    }

    public function deletePortfolio(Request $request) {
        $portfolio_id = $request -> id;
        $portfolio = PortfolioDetail::where('id', $portfolio_id) -> first();
        if(!$portfolio){
            return "No portfolio found for this ID!!";
        }

        else{
            return PortfolioDetail::where('id', $portfolio_id) -> delete();
        }
    }
}
