<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Category;

class IndexController extends Controller
{

    public function listProduit(){
        $prs = Produit::all();
        $cats = Category::all();
        return view('website.index.index')->with('produits', $prs)->with('categories' , $cats);

    }

    }
