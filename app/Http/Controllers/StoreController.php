<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required',
            'color' => 'required',
        ]);

        $imgName = time() . '.' . $request->img->extension();

        $request->img->move(public_path('images'), $imgName);

        $store = new Store([
            'name' => $request->get('name'),
            'img' => $imgName,
            'color' => $request->get('color'),
        ]);

        $store->save();

        return redirect(route('add-product'))->with('success', 'Store has been added');
    }
}
