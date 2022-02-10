<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Brands;
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
     $brand=new Brands();
     $brand->name=$name;
     $brand->save();
     return back()->with('message','brand added succesfulley');
    }
}
