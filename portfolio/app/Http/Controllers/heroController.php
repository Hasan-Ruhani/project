<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use Illuminate\Http\Request;

class heroController extends Controller
{
    public function createHero(Request $request){
        try {
            if ($request->hasFile('hero_image')) {
                $hero_img = $request->file('hero_image');
                $t = time();
                $file_name = $hero_img->getClientOriginalName();
                $img_name = "{$t}-{$file_name}";
                $img_url = "uploads/Heroes/{$img_name}";
                $hero_img->move(public_path('uploads'), $img_name);
    
                $heroSlider = HeroSlider::create([
                    'head_line' => $request->input('head_line'),
                    'short_des' => $request->input('short_des'),
                    'hero_img' => $img_url,
                    'about_link' => $request->input('about_link'),
                    'hire_link' => $request->input('hire_link')
                ]);
    
                return $heroSlider;
            } 
            else {
                return 'Please provide a hero image.';
            }
        } catch (\Exception $e) {
            return 'Something went wrong!! Try Again';
        }
    }
    
    

    public function heroAll(){
        $heroes = HeroSlider::all();
        if($heroes->isEmpty()){
            return 'Not found any hero sliders';
        } else {
            return $heroes;
        }
    }
    

    public function deleteHero(Request $request){
        $heroID = $request->id;
        $hero = HeroSlider::find($heroID);
    
        if($hero) {
            $hero->delete();
            return "Hero Slider deleted successfully";
        } else {
            return "Hero slider not exists!!";
        }
    }
    
}
