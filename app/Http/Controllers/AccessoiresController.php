<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;

class AccessoiresController extends Controller
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

    public function create()
    {
        return view('add-accessoires');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'required',
            'link' => 'required',
        ]);

        $imgName = time() . '.' . $request->img->extension();

        $request->img->move(public_path('images'), $imgName);

        $store = new Accessoire([
            'name' => $request->get('name'),
            'img' => $imgName,
            'link' => $request->get('link'),
        ]);

        $store->save();

        return redirect(route('front'))->with('success', 'Accessoire has been added');
    }
}
