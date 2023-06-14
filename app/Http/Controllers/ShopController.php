<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Image;
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
        $images = $request['image'];
        //dd($images);
        $shop->fill($input)->save();
            foreach($input_categories as $input_category)  {
                $shop->categories()->attach( $input_category);
            };
            foreach ($images as $img) {
                $image = new Image();
                $shop_id=DB::table('shops')->latest('id')->first()->id;
                $image_url = Cloudinary::upload($img->getRealPath())->getSecurePath();
                //$image->image_url = $image_url;
                //dd($shop_id);
                //$image->shop_id=$shop_id;
                //dd($shop_id);
                //dd($image);
                //dd($request->all());
                $image->fill(['image_url' => $image_url,'shop_id' => $shop_id])->save();
            }
        return redirect('/shops/' . $shop->id);
    }
    
    public function edit(Shop $shop, Category $categories)
    {
        $active_categories=$shop->categories()->get();
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
        return view('shops/edit')->with(['shop' => $shop, 'categories'=> $categories]);
    }
    
    public function update(PostRequest $request, Shop $shop)
    {
        $input_categories=$request['category'];
        $input_shop = $request['shop'];
        if ($request->file('image')==NULL){$image_url =NULL;}
            else
            {
                $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
                $input += ["image" => $image_url];
            }
        $shop->fill($input_shop)->save();
            foreach($input_categories as $input_category)  {
                    $shop->categories()->attach( $input_category);
                };
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
