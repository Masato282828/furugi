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
    
    public function create()
    {
        return view('shops/create');
    }
    
    public function store(Request $request, Shop $shop)
    {
        $input = $request['post'];
        //dd($input);
        $shop->fill($input)->save();
        return redirect('/shops/' . $shop->id);
    }
}
