<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index() {
        $products =Product::latest()->get();
        return view('user_template.home',compact('products'));
    }
}
