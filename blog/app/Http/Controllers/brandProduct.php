<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Session;
Session_start();

use Illuminate\Http\Request;

class brandProduct extends Controller
{
    public function auth(){
        $auth=Session::get('admin_id');
        if($auth){
            return redirect('dashboard');
        }else{
            return redirect('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->auth();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->auth();
      $all_brand_product=DB::table('tbl_brand_product')->get();
      $managerl_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
      return view('admin_layout')->with('admin.all_brand_product',$managerl_brand_product);
    }
    public function save_brand_product(Request $request){
        $this->auth();
       $data = array();
       $data['brand_name']=$request->brand_product_name;
       $data['brand_desc']=$request->brand_product_desc;
       $data['brand_status']=$request->brand_product_status;
       DB::table('tbl_brand_product')->insert($data);
       return  redirect('add-brand-product');
    }
    public function active($brand_product_id){
        
        DB::table('tbl_brand_product')
        ->where('brand_id',$brand_product_id)
        ->update(['brand_status' =>0]);
        Session::put('massage','sau thanh cong');
        
        return redirect('/all-brand-product');
        
    }
    public function unactive($brand_product_id){
        $this->auth();
        DB::table('tbl_brand_product')
        ->where('brand_id',$brand_product_id)
        ->update(['brand_status' => 1]);
        Session::put('massage','sau thanh cong');
        
        return redirect('/all-brand-product');

    }
    public function edit_brand_product($brand_product_id){
        $this->auth();
        $edit_brand_product=DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
      $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
      return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);

    }
    public function delete_brand_product($brand_product_id){
        $this->auth();
       DB::table('tbl_brand_product')
       ->where('brand_id',$brand_product_id)
       ->delete();
     
      return redirect('all-brand-product');

    }
    public function update_brand_product(Request $request,$brand_id){
        $this->auth();
        $data= array();
        $data['brand_name']=$request->edit_brand_product_name;
        $data['brand_desc']=$request->edit_brand_product_desc;
       
       // Session::put('massage','them thanh cong');
       
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update($data);
        return redirect('/all-brand-product');
    }
}
