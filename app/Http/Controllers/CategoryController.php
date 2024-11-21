<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }
    
    public function store(Request $request){
        $request->validate([
            'name.*'=>['required'],
        ]);
        
        $category = Category::create([
            'name'=> $request->name
        ]);

        if(!$category){
            // Session::flash("error", "something went wrong");
            return redirect()->back();
        }
        // Session::flash("error", "Category added Successfully");
        return redirect()->back();
    }
}
