<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioDetail;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    // public function createPortfolio_item(Request $request) {
        // $category_id = $request -> id;
        // $category = Category::where('id', $category_id) -> first();
    
        // if (!$category) {
        //     return "Please insert a valid category first";
        // } else {
        //     $filePaths = [];
        //     foreach ($request->file('file') as $image) {
        //         $imageName = $image->getClientOriginalName();
        //         $image->move(public_path().'/images/', $imageName);
        //         $filePaths[] = '/images/' . $imageName; // Store the full path
        //     }
        //     $images = json_encode($filePaths);
    
        //     $portfolioDetail = new PortfolioDetail();
        //     $portfolioDetail->category_id = $category->id;
        //     $portfolioDetail->head_line = $request->input('head_line');
        //     $portfolioDetail->image = $images; // Store the JSON-encoded image paths
        //     $portfolioDetail->short_des = $request->input('short_des');
        //     $portfolioDetail->description = $request->input('description');
        //     $portfolioDetail->client = $request->input('client');
        //     $portfolioDetail->date = $request->input('date');
        //     $portfolioDetail->project_url = $request->input('project_url');
        //     // Set other fields as needed
        //     $portfolioDetail->save();
    
        //     return $portfolioDetail; // Return the created portfolio item
        // }



        public function createPortfolio_item(Request $request)
        {
            $category_id = $request -> id;
            $category = Category::where('id', $category_id) -> first();
        
            if (!$category) {
                return "Please insert a valid category first";
            }

            else
            {
                $imageUrls = [];
                foreach ($request->file('file') as $imagefile) {
                    $path = $imagefile->store('/images/resource', ['disk' => 'public']);
                    $imageUrls[] = $path;
                }
              }

            $product = new PortfolioDetail;
            $product->category_id = $category->id;
            $product->head_line = $request->input('head_line');
            $product->short_des = $request->input('short_des');
            $product->description = $request->input('description');
            $product->client = $request->input('client');
            $product->date = $request->input('date');
            $product->project_url = $request->input('project_url');
            $product->image = json_encode($imageUrls); // Serialize the array of image URLs
            $product->save();
            return $product;

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
