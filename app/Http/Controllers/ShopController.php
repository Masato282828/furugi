<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function shops(Shop $shop)
    {
        return view('shops/index')->with(['shops' => $shop->getByLimit()]);
    }
    
    public function show(Shop $shop)
    {
        return view('shops/show')->with(['shop' => $shop]);
    }
}
