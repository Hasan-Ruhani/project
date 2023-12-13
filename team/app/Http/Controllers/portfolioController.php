<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class portfolioController extends Controller
{
    public function createPortfolio_item(Request $request) {
        $category_id = $request -> id;
        $category = Category::where('id', $category_id) -> first();
        
        // if(!$category){
        //     return "Please insert category first";
        // }
        // else{
            $img = $request->file('image');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
            $img -> move(public_path('uploads'), $img_name);

            return PortfolioItem::create([
                'category_id' => $category -> id,
                'title' => $request -> input('title'),
                'image' => $img_url,
                'short_des' => $request -> input('short_des')
            ]);
        // }
    }

    public function portfolioBy_category(Request $request) {
        $category_id = $request -> id;
        $category = Category::where('id', $category_id) -> first();
        if(!$category){
            return "No category found for this Item!!";
        }

        else{
            return PortfolioItem::where('category_id', $category_id) -> get();
        }
    }

    public function allPortfolio() {
        return PortfolioItem::all();
    }

    public function deletePortfolio(Request $request) {
        $portfolio_id = $request -> id;
        $portfolio = PortfolioItem::where('id', $portfolio_id) -> first();
        if(!$portfolio){
            return "No portfolio found for this ID!!";
        }

        else{
            return PortfolioItem::where('id', $portfolio_id) -> delete();
        }
    }
}
