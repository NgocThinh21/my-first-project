<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Session;
Session_start();

use Illuminate\Http\Request;

class productController extends Controller
{
    public function add_product(){
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        //$brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product);//->with('brand_product',$brand_product);
    }   
    //tao san phma
    public function save_product(Request $request){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_image']=$request->product_image;
        $data['product_content']=$request->product_content;
        $data['product_desc']=$request->product_desc;
        $data['category_id']=$request->product_category;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $get_image= $request->file('product_image');
        if($get_image){
            $get_name_image= $get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('massage','thanh cong');
            return redirect('add-product');
        }
        $data['product_image']='';
        DB::table('tbl_product')->insert($data);
        Session::put('massage','thanh cong');
        return redirect('add-product');
        //$brand_product=DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
    } 
    //liet ke san pham
    public function all_product(){
        $product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->get();
        return view('admin.all_product')->with('product',$product);
    }

    //kich hoat san pham
    public function active($id){
        DB::table('tbl_product')
        ->where('product_id',$id)
        ->update(['product_status'=>0]);
        return redirect('all-product');
    }
    //khong kich hoat san pham
    public function unactive($id){
        DB::table('tbl_product')
        ->where('product_id',$id)
        ->update(['product_status'=>1]);
        return redirect('all-product');
    }
    //thay doi san pham
    public function edit_product($id){
        $edit =DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('product_id',$id)->get();
        
        return view('/admin/edit_product')->with('edit',$edit);
    }

    //thay doi va cap nhap san pham
    public function update_product(Request $request,$id){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_image']=$request->product_image;
        $data['product_content']=$request->product_content;
        $data['product_desc']=$request->product_desc;
        $data['category_id']=$request->product_category;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $get_image= $request->file('product_image');
        if($get_image){
            $get_name_image= $get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$id)->update($data);
            Session::put('massage','thanh cong');
            return redirect('all-product');
        }
        $data['product_image']='';
        DB::table('tbl_product')->where('product_id',$id)->update($data);
        Session::put('massage','thanh cong');
        return redirect('all-product');
    }

    //xoa san pham
    public function delete_product($id){
        DB::table('tbl_product')
        ->where('product_id',$id)
        ->delete();
        return redirect('all-product');
    }
}
