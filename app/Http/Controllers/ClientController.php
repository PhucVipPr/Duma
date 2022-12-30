<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Sell_product;
use App\Models\User;
use Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class ClientController extends Controller
{
    public function viewClient(){
        $products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        return view('client/home',['products'=>$products]);
    }

    public function viewCategory(){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->select('products.*','images.url','sell_products.prices')
            ->paginate(3);
        if(Request::get('sort')=='price_asc'){
            $product = DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->orderBy('prices','ASC')
                ->paginate(3);
        }
        elseif(Request::get('sort')=='price_desc'){
            $product = DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->orderBy('prices','DESC')
                ->paginate(3);
        }
        return view('client/category')->with('products',$product);
    }

    public function show($product_id){
        $product = DB::table('categories')
            ->join('products','products.cate_id','=','categories.cate_id')
            ->select('products.*','categories.cate_name')
            ->get()
            ->where('product_id',"=",$product_id)->first();
        $image = DB::table('images')->where('product_id',"=",$product_id)->first();
        $sellProduct = DB::table('sell_products')->where('product_id',"=",$product_id)->first();
        return view('client/product',compact('product','image','sellProduct'));
    }

    public function search(Request $request){
        $keyword = $request->keyword_submit;
        $search_product = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id WHERE product_name LIKE '%$keyword%'");
        return view('client/search')->with('search_product',$search_product);
    }

    public function news(){
        return view('/client/news');
    }
}

