<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function produit()
    // {
    //     $products = Product::with('categories')->latest()->paginate(4);
    //     // $comments = Comment::with('post')->latest()->paginate(3);

    //     // dd($posts);
    //     return view('admin.adminProduits', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

    //     // return redirect()->route('produits');
    // }
}
