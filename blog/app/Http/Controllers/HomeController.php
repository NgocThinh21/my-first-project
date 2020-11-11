<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Session;
Session_start();


class HomeController extends Controller
{
    public function index(){
        
        $category=DB::table('tbl_category_product')->orderby("category_id","desc")->get();
        $brand=DB::table('tbl_brand_product')->get();
        $product=DB::table('tbl_product')->get();
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        
        // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.product_id')

        return view('pages.home')->with('category',$category)->with('brand',$brand)->with('product',$product);
    }
}
