<?php

use Illuminate\Support\Facades\Redirect;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
Session_start();

class categoryProduct extends Controller
{
    public function auth(){
        $auth=Session::get('admin_id');
        if($auth){
            return redirect('dashboard');
        }else{
            return redirect('admin')->send();
        }
    }
    public function add_category_product(){
        $this->auth();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->auth();
      $all_category_product=DB::table('tbl_category_product')->get();
      $managerl_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);
      return view('admin_layout')->with('admin.all_category_product',$managerl_category_product);
    }
    public function save_category_product(Request $request){
        $this->auth();
       $data = array();
       $data['category_name']=$request->category_product_name;
       $data['category_desc']=$request->category_product_desc;
       $data['category_status']=$request->category_product_status;
       DB::table('tbl_category_product')->insert($data);
       return  redirect('add-category-product');
    }
    public function active($category_product_id){
        $this->auth();
        DB::table('tbl_category_product')
        ->where('category_id',$category_product_id)
        ->update(['category_status' =>0]);
        Session::put('massage','sau thanh cong');
        
        return redirect('/all-category-product');
        
    }
    public function unactive($category_product_id){
        $this->auth();
        DB::table('tbl_category_product')
        ->where('category_id',$category_product_id)
        ->update(['category_status' => 1]);
        Session::put('massage','sau thanh cong');
        
        return redirect('/all-category-product');

    }
    public function edit_category_product($category_product_id){
        $this->auth();
        $edit_category_product=DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
      $manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
      return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);

    }
    public function delete_category_product($category_product_id){
        $this->auth();
       DB::table('tbl_category_product')
       ->where('category_id',$category_product_id)
       ->delete();
     
      return redirect('all-category-product');

    }
    public function update_category_product(Request $request,$category_id){
        $this->auth();
        $data= array();
        $data['category_name']=$request->edit_category_product_name;
        $data['category_desc']=$request->edit_category_product_desc;
       
       // Session::put('massage','them thanh cong');
       
        DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
        return redirect('/all-category-product');
    }
}
