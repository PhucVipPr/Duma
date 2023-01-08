<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Sell_product;
use App\Models\User;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class ClientController extends Controller
{
    public function viewClient(){
        $products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        return view('client/home',['products'=>$products]);
    }

    public function viewInfo(){
        $infos = DB::table('users')
            ->where('isAdmin','=',0)
            ->get();
        return view('client/info',compact('infos'));
    }

    public function editInfo($id){
        $infos = DB::table('users')
            ->select('users.*')
            ->get()
            ->where('users.isAdmin','=',0)
            ->where('users.id','=',$id);
        return view('client/editInfo',compact('infos'));
    }


    public function update(Request $request,$id){
        $updateInfo = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address'=> 'required',
            ]);
        DB::table('users')->where('id','=',$id)->update($updateInfo);
        return redirect('client/info');
    }


    public function viewCategory(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->select('products.*','images.url','sell_products.prices')
            ->paginate(4);


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

    public function searchInfo(Request $request){
        $keyword = $request->get('keyword_submit');
//        dd($keyword);
        $collection =DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('product_name','like','%'.$keyword.'%')
            ->paginate(10);
//            ->sortBy('prices');
//        dd($collection);
//        dd($collection->sortBy('prices'));
        if($request-> get('sort')=='price_asc'){
            $collection =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('product_name','like','%'.$keyword.'%')
                ->paginate(10);
            $collection->setCollection(
            $collection->sortBy('prices')
          );
        }
        if($request-> get('sort')=='price_desc'){
            $collection =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('product_name','like','%'.$keyword.'%')
                ->paginate(10);
            $collection->setCollection(
                $collection->sortByDesc('prices')
            );
        }
//        $collection = $collection->sortBy('prices')->all();


//       ;
//        if($keyword != null){
//            $search_product = DB::table('products')
//                ->join('images','images.product_id','=','products.product_id')
//                ->join('sell_products','sell_products.product_id','=','products.product_id')
//                ->select('products.*','images.url','sell_products.prices')
//                ->where('product_name','like','%'.$keyword.'%');
//        }
//        if($request-> get('sort')=='price_asc'){
//            $search_product = DB::table('products')
//                ->join('images','images.product_id','=','products.product_id')
//                ->join('sell_products','sell_products.product_id','=','products.product_id')
//                ->select('products.*','images.url','sell_products.prices')
//                ->orderBy('prices','ASC')
//                ->paginate(4);
//        }
//        elseif($request->get('sort')=='price_desc'){
//            $search_product = DB::table('products')
//                ->join('images','images.product_id','=','products.product_id')
//                ->join('sell_products','sell_products.product_id','=','products.product_id')
//                ->select('products.*','images.url','sell_products.prices')
//                ->orderBy('prices','DESC')
//                ->paginate(4);
//        }
        return view('client/search',['search_product'=>$collection]);
    }

    public function news(){
        return view('/client/news');
    }
}

