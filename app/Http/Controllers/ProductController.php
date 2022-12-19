<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $stores = Store::all();

        return view('add-product', compact('categories', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required',
            'store_id' => 'required',
            'category_id' => 'required',
            'class' => 'required',
        ]);

        $category = Category::where('id', $request->category_id)->first();

        $store = Store::where('id', $request->store_id)->first();

        $product = new Product([
            'category_id' => $category->id,
            'link' => $request->get('link'),
            'store_id' => $store->id,
            'class' => $request->get('class'),
        ]);

        $product->save();
        return redirect('/')->with('success', 'Product has been added');
    }

    public function product($id)
    {
        $product = Product::where('id', $id)->first();

        $categories = Category::all();

        $stores = Store::all();

        return view('product', compact('product', 'categories', 'stores'));
    }

    public function update(Product $product)
    {
        $product->update(request()->validate([
            'link' => 'required',
            'store_id' => 'required',
            'category_id' => 'required',
            'class' => 'required',
            'price' => 'required',
            'high' => 'required',
            'low' => 'required',
            'current' => 'required',
        ]));

        $price = $product->price;
        $price = json_decode($price, true);
        $test = array_column($price, 'price');
        $average = array_sum($test) / count($test);
        $product->average = $average;
        $product->average = round($product->average, 2);
        $product->save();

        return redirect('/')->with('success', 'Product has been updated');
    }
}
