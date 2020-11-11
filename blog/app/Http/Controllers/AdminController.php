<?php

use Illuminate\Support\Facades\Redirect;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
Session_start();

class AdminController extends Controller
{
    public function auth(){
        $admin_id=Auth::id(); //bai 26
        
        if($admin_id){
            return redirect('dashboard');
        }else{
            return redirect('admin');
        }
    }
    public function index(){
        $this->auth();
        return view('admin_login');
    }
    public function index1(){
        return view('admin_layout');
    }
    public function show_dashboard(){
        $this->auth();
        return view('admin.dashboard');
    }
    public function search(Request $request){
        $search=$request->search;
        $category=DB::table('tbl_category_product')->where->get();
        $brand=DB::table('tbl_brand_product')->get();
        $product=DB::table('tbl_product');
        return view('admin_layout');
    }
    public function dashboard(Request $request){
        $this->auth();
        $admin_email= $request->admin_email;
        $admin_password= md5($request->admin_password);

        $resuft= DB::table('tbl_admin')
        ->where('admin_email', $admin_email)
        ->where('admin_password', $admin_password)
        ->first();
        if ($resuft){
            Session::put('admin_name',$resuft->admin_name);
            Session::put('admin_id',$resuft->admin_id);
           return redirect('/dashboard');
         }else{
             Session::put('massage','nhap sai');
             return redirect('/admin');
        }
    }
    public function admin_logout(){
        $this->auth();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect('/admin');
    }
}
