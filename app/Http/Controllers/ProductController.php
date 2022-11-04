<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

        return view('add-product', compact('categories'));
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
            'name' => 'required',
            'link' => 'required',
            'store' => 'required',
            'class' => 'required',
            'color' => 'required',
        ]);

        $category = Category::where('id', $request->name)->first();

        $product = new Product([
            'name' => $category->name,
            'category_id' => $request->get('name'),
            'link' => $request->get('link'),
            'store' => $request->get('store'),
            'class' => $request->get('class'),
            'color' => $request->get('color'),
        ]);

        $product->save();
        return redirect('/')->with('success', 'Product has been added');
    }

}
