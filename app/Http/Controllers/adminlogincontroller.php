<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascade\Hash;
use Illuminate\Http\Request;
use iLLuminate\Session;
use App\Models\admin;

class adminlogincontroller extends Controller
{
    function adminlogin(Request $req)
    {
         $email=$req->input('email');
         $password=$req->input('password');
         
        
         $user=admin::where('a_email','like',$email)->where('a_password','like',$password)->count();
         
         if($user>0)
         {
            $req->session()->put('adminemail',$email);
            $email=$req->session()->get('adminemail');
            $user2=admin::where('a_email','like',$email)->get();
            return view('/admindashboard',['results'=>$user,'aname'=>$user2]);
            }
         else {
             echo "<script > alert('Invalid login credential.')</script>";
             return view('/adminlogin',['aname'=>$user2]);
         }
    }
    function dashboard(Request $req)   
    {
      $email=$req->session()->get('adminemail');
      $user2=admin::where('a_email','like',$email)->get();
      return view('/admindashboard',['aname'=>$user2]);
    }
     function adminlogout()
     {
      session()->forget('adminemail');
        return view('/','adminlogin');
     }
    function adminviewprofile(Request $req)
     {
      $email=$req->session()->get('adminemail');
       $view=admin::where('a_email','like',$email)->get();
       $user2=admin::where('a_email','like',$email)->get();
      
       return view('adminviewprofile',['data'=>$view,'aname'=>$user2]);
     }
     
   }
   