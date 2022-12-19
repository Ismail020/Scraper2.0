<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use App\Models\Store;
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
        $accessoires = Accessoire::all();

        return view('welcome', compact('products', 'categories', 'accessoires'));
    }

    public function stores()
    {
        $stores = Store::all();

        return view('stores', compact('stores'));
    }

    public function all($id)
    {
        $store = Store::find($id);
        $products = Product::where('store_id', $id)->get();

        if (isset($_GET['order'])) {
            if ($_GET['order'] == 'ascending') {
                $products = $products->sortBy('current');
            } else if ($_GET['order'] == 'descending') {
                $products = $products->sortByDesc('current');
            }
        } else {
            // $products = $products->sortBy('price');
        }

        $count = count($products);

        return view('all', compact('products', 'store', 'count'));
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
        $products = Product::where('category_id', 11)->get();

        Log::truncate();
        foreach ($products as $product) {
            $html = file_get_html($product->link);

            try {
                if (strpos($product->class, ',') !== false) {
                    $class = substr($product->class, 0, strpos($product->class, ','));
                    $price = $html->find($class, 1)->innertext;
                } else {
                    $price = $html->find($product->class, 0)->innertext;
                }

                if (strpos($price, '&#8364;') !== false) {
                    $price = str_replace('&#8364;', '', $price);
                }

                $price = preg_replace("/[^0-9,]/", "", $price);
                $price = (int) $price;

                if (empty($product->price)) {
                    $product->price = [
                        [
                            'date' => date('Y-m-d'),
                            'price' => $price,
                        ],
                    ];

                    $test = array_column($product->price, 'price');

                    $current = end($test);
                    $highest = max($test);
                    $lowest = min($test);
                    $average = array_sum($test) / count($test);


                    $product->high = $highest;
                    $product->low = $lowest;
                    $product->average = $average;
                    $product->current = $current;
                    $product->save();
                } else {
                    $product->price = json_decode($product->price, true);

                    if (!in_array(date('Y-m-d'), array_column($product->price, 'date'))) {
                        $product->price = array_merge($product->price, [
                            [
                                'date' => date('Y-m-d'),
                                'price' => $price,
                            ],
                        ]);
                    }

                    $priceArray = array_column($product->price, 'price');
                    $current = end($priceArray);
                    $highest = max($priceArray);
                    $lowest = min($priceArray);
                    $average = array_sum($priceArray) / count($priceArray);

                    $product->high = $highest;
                    $product->low = $lowest;
                    $product->average = $average;
                    $product->current = $current;
                    $product->save();
                }
            } catch (\Throwable $th) {
                if (empty($product->price)) {
                    $product->price = [
                        [
                            'date' => date('Y-m-d'),
                            'price' => 'Not Available',
                        ],
                    ];

                    $product->high = 'NA';
                    $product->low = 'NA';
                    $product->average = 'NA';
                    $product->current = 'NA';

                    $product->save();
                } else {
                    $product->price = json_decode($product->price, true);

                    if (!in_array(date('Y-m-d'), array_column($product->price, 'date'))) {
                        $product->price = array_merge($product->price, [
                            [
                                'date' => date('Y-m-d'),
                                'price' => 'Not Available',
                            ],
                        ]);
                    }

                    $priceArray = array_column($product->price, 'price');
                    $priceArray = array_filter($priceArray, function ($value) {
                        return $value !== 'Not Available';
                    });

                    if (!empty($priceArray)) {
                        $current = end($priceArray);
                        $highest = max($priceArray);
                        $lowest = min($priceArray);
                        $average = array_sum($priceArray) / count($priceArray);

                        $product->high = $highest;
                        $product->low = $lowest;
                        $product->average = $average;
                        $product->current = $current;
                        $product->save();
                    }
                }
            }
        }

        $categories = Category::all();

        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->id)->get();
            // get all the prices and decode them
            $prices = [];
            foreach ($products as $product) {
                $prices[] = json_decode($product->price, true);
            }
            // get the lowest price of prices array
            $lowest = [];
            foreach ($prices as $price) {
                $lowest[] = min(array_column($price, 'price'));
            }

            // get the lowest price of the lowest array
            $lowest = min($lowest);
            $category->low = $lowest;
            $category->save();
        }

        return redirect()->route('front');
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
        if (isset($_GET['order'])) {
            if ($_GET['order'] == 'ascending') {
                $products = Product::where('category_id', $id)->orderBy('current', 'asc')->get();
            } else if ($_GET['order'] == 'descending') {
                $products = Product::where('category_id', $id)->orderBy('current', 'desc')->get();
            }
        } else {
            $products = Product::where('category_id', $id)->get();
        }
        $category = Category::find($id);

        $count = count($products);

        return view('show', compact('products', 'category', 'count'));
    }

    public function test()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('test', compact('products', 'categories'));
    }
}
