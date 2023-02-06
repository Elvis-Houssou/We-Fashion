<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function solde()
    {
        $products = Product::with('categories')->where('state', 'en solde')->where('visibility', 'publie')->inRandomOrder()->paginate(6);

        return view('we-fashion.solde.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homme()
    {
        $products = Product::with('categories')->where('id_category', 1)->where('visibility', 'publie')->inRandomOrder()->paginate(6);

        return view('we-fashion.hommes.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function femme()
    {
        $products = Product::with('categories')->where('id_category', 2)->where('visibility', 'publie')->inRandomOrder()->paginate(6);

        return view('we-fashion.femmes.index', compact('products'));
    }

    public function produit()
    {
        $products = Product::with('categories')->latest()->paginate(15);

        return view('admin.adminProduits', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function categories()
    {
        $products = Product::with('categories')->latest()->paginate(15);

        return view('admin.adminCategories', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.adminCreate', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request = request();
        $categorie = Category::find($request->input('id_category'));


        $results = $request->all();

        $images = $request->file('images');
        $filename = Str::uuid()->toString(). "." . $images->getClientOriginalExtension();

        if ($request->input('id_category') == 1 && $request->hasFile('images')) {
            $images->move(storage_path('app/public/images/hommes'), $filename);
            $results['images'] = $filename;

        }else {
            $images->move(storage_path('app/public/images/femmes'), $filename);
            $results['images'] = $filename;
        }

        $product = new Product;
        $product->fill($results);
        $categorie->products()->save($product);


        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        // $product = Product::findOrFail($id);
        $product = Product::where('id', $id)->first();


        return view('we-fashion.showProduct', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.adminEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product, $id)
    {

        $request = request();
        $categorie = Category::find($request->input('id_category'));

        $product = Product::findOrFail($id);

        $results = $request->all();
        // dd($results);

        $images = $request->file('images');
        $filename = Str::uuid()->toString(). "." . $images->getClientOriginalExtension();

        if ($request->input('id_category') == 1 && $request->hasFile('images')) {
            $images->move(storage_path('app/public/images/hommes'), $filename);
            $results['images'] = $filename;

        }else {
            $images->move(storage_path('app/public/images/femmes'), $filename);
            $results['images'] = $filename;
        }

        // $product = new Product;
        $product->fill($results);
        $categorie->products()->save($product);

        return redirect()->route('admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);


        $product->delete();

        return redirect()->route('admin');
    }
}
