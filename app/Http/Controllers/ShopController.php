<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\PostRequest;
use App\Models\Category;

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
    
    public function store(Request $request, Shop $shop)
    {
        $input = $request['shop'];
        $input_categories=$request['category'];
        $shop->fill($input)->save();
            foreach($input_categories as $input_category)  {
                $shop->categories()->attach( $input_category);
            };
            
        return redirect('/shops/' . $shop->id);
    }
    
    public function edit(Shop $shop)
    {
        return view('shops/edit')->with(['shop' => $shop]);
    }
    
    public function update(PostRequest $request, Shop $shop)
    {
        $input_shop = $request['shop'];
        $shop->fill($input_shop)->save();
        return redirect('/shops/' . $shop->id);
    }
    
    public function delete(Shop $shop)
    {
        $shop->delete();
        return redirect('/');
    }
    
    public function create(Category $category)
    {
        return view('shops/create')->with(['categories' => $category->get()]);
    }
}
