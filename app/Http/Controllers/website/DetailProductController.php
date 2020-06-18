<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DetailProductController extends Controller
{
    public function index(){
        $cats = Category::all();
        return view('website.detailproduct')->with('categories' , $cats);
    }
}
