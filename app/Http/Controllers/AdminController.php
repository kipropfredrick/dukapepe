<?php

namespace App\Http\Controllers;
use \App\Models;
use Illuminate\Http\Request;
use \App\Models\Brands;
use \App\Models\Sub_Category;
use \App\Models\Category;
use \App\Models\Products;
use Illuminate\Support\Str;
use DB;
class AdminController extends Controller
{
    //
    public function index(){
        return View('admin.admin');
    }
    public function brand(Request $req){
    return view('admin.brand');
    }
    public function add_brand(Request $req)
    {
     $name=$req->name;
     $brand= new Brands();
     $brand->name=$name;
     $brand->save();
     return back()->with('message','brand added succesfulley');
    }
    public function category(){
        return view('admin.categories');
    }
    public function subcategory(){
        $cate=Category::get();
        return view('admin.subcategories',compact('cate'));
    }
    public function add_category(Request $req){
        $random = Str::random(10);
        $cat=new Category();
        $cat->category_name=$req->name;
        $cat->slug=$random;
        $cat->save();
        return back()->with('success','category added');

    }
    public function add_subcategory(Request $req){
        $random = Str::random(10);

        $cat=new Sub_Category();
        $cat->subcat_id=$req->id;
        $cat->subcat_name=$req->name;
        $cat->slug=$random;
        $cat->save();
        return back()->with('success','category added');

    }
    public function products(){
        $cate=Category::get();
        $brand=Brands::get();
        return view('admin.product',compact('cate','brand'));
    }
    public function addpro(Request $req){
       // dd($req->all());
        $prod=new Products();
        $prod->cat_id=$req->cid;
        $prod->sub_categot_id=$req->subid;
        $prod->name=$req->name;
        $prod->brand_id=$req->bid;
        $prod->price=$req->price;
        $prod->save();
        return back()->with('succes','data saved');
    }
    public function subcat($id)
    {
        //
        $cities = DB::table("sub__categories")
                    ->where("subcat_id",$id)
                    ->get();
                    //return $cities;
        return json_encode($cities);
    }
}
