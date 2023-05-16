<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index(Shop $shop)
    {
        return view('shops/index')->with(['shops' => $shop->getPaginateByLimit()]);
    }
    
    public function show(Shop $shop)
    {
        return view('shops/show')->with(['shop' => $shop]);
    }
}
