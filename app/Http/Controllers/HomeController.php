<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function front()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }

    public function index()
    {
        return view('home');
    }

    public function update()
    {
        include_once 'php/simple_html_dom.php';
        ini_set('user_agent', 'My-Application/2.5');

        $products = Product::all();

        Log::truncate();
        foreach ($products as $product) {
            $html = file_get_html($product->link);
            $price = $html->find($product->class, 0)->plaintext;
            $price = preg_replace('/[^0-9]/', '', $price);
            $price = (int) $price;
            $price = round($price / 100, 0, PHP_ROUND_HALF_UP);
            
            if ($price != '') {
                $product->price = $price;
                $product->save();
            }

            $log = new Log([
                'store' => $product->store,
                'price' => $price,
                'date' => date('Y-m-d H:i:s'),
            ]);

            $log->save();
        }
    }

    public function save()
    {
        $logs = Log::all();
        $file = 'php/log.json';
        $current = file_get_contents($file);
        $logs = json_encode($logs);
        
        // put $logs in $file
        file_put_contents($file, $logs);
    }

    public function show($id)
    {
        $products = Product::where('category_id', $id)->get();

        return view('show', compact('products'));
    }
}
