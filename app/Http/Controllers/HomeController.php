<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        //sample of some of the products (in the main website's home page)
        $products        = Product::orderBy('created_at' , 'DESC')->paginate(10);
        $latest_products = Product::orderBy('id' , 'DESC')->latest()->limit(1)->get();

        return view('website.website.home' , compact('products' , 'latest_products'));
    }

}
