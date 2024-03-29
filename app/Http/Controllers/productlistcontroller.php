<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\category;
use App\Models\subcategory;
use App\Models\customer;
use App\Models\admin;
use Illuminate\Http\Request;

class productlistcontroller extends Controller
{
    function  show_product(Request $req)
    {
        $c=subcategory::all();
        $sc=subcategory::all();
        $pro=product::join('customers','customers.c_id','products.c_id')->get();
        $email=$req->session()->get('adminemail');
         $user2=admin::where('a_email','like',$email)->get();

        $scname=subcategory::join('categories','categories.cat_id','subcategories.cat_id')->get();
        $procus=customer::join('products','products.c_id','customers.c_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('categories','products.cat_id','categories.cat_id')->get();
        return view('product',['procus'=>$procus,'aname'=>$user2]); 

    }
     
}
