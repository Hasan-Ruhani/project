<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioDetail;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function createPortfolio_item(Request $request) {
        $category_id = $request -> id;
        $category = Category::where('id', $category_id) -> first();
        
        if(!$category){
            return "Please insert category first";
        }
        else{
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img -> move(public_path('uploads'), $img_name);

            return PortfolioDetail::create([
                'category_id' => $category -> id,
                'title' => $request -> input('title'),
                'image' => $img_url,
                'short_des' => $request -> input('short_des')
            ]);
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
