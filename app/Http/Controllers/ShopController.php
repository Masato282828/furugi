<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Cloudinary;
use Illuminate\Support\Facades\DB;

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
        $input_categories=$request['category'];
        $input = $request['shop'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ["image" => $image_url];
        //dd($input);
        $shop->fill($input)->save();
            foreach($input_categories as $input_category)  {
                $shop->categories()->attach( $input_category);
            };
        return redirect('/shops/' . $shop->id);
    }
    
    public function edit(Shop $shop, Category $categories)
    {
        //dd($shop->id);
    
        //$active_categories=$shop->categories()->wherePivot('is_active', true)->get();
        $categories=$categories->get();
        //dd($categories);
        
        $shop_categories = DB::table('category_shop')->where('shop_id', $shop->id)->get();
        // function Checkbox($categories, $checks) {
        //     $array= [];
        //         foreach ($categories as $category) {
        //          $categoryArray = json_decode($category, true);
        //              $categoryArray += ['check' => false];
        //             foreach ($checks as $check) {
        //                 dd($check->categories()->wherePivot('is_active', true)->get());
        //                 if ($category->name == $check->name) {
        //             $category->check = true;
        //             break;
        //             }
        //         $array += $categoryArray;
        //         dd($categoryArray);
        //         }
        //      return $array;
        //     }
    //}
        
        // dd(Checkbox($categories, $shop_categories));
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
    
   public function upload(Request $request)
    {
        $dir ='/task/furugi/public/imgs';
        
        $file_name = $request->file('image')->getClientOriginalName();
        
        $request->file('image')->storeAs('pbulic/' . $dir, $file_name);
        
        $image = new Image();
        $image->name = $file_name;
        $image->path = 'storage/' . $dir . '/' . $file_name;
        $image->save();
        
        return redirect('/');
    }
    
    public function currentLocation(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        // currentLocationで表示
        return view('currentLocation', [
            // 現在地緯度latをbladeへ渡す
            'lat' => $lat,
            // 現在地経度lngをbladeへ渡す
            'lng' => $lng,
        ]);
    }
    
    
}
