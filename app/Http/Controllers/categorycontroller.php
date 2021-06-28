<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\admin;

use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    function show_category(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();

        $results = category::all();
        $catid=$req->input('cat_id');
        $catname=$req->input('cat_name');
        return view('admincategory',['results'=>$results,'aname'=>$user2]);
        
    }
    function edit_category($id)
    {
        //dd($id);
        $results = category::where('cat_id',$id)->get();
         return view('admineditcategory',['results'=>$results]);
    }
    
}
