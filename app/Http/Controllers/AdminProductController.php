<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Sell_product;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class AdminProductController extends Controller
{
    public function create()
    {
        $categories = Category::get();
        return view('admin/product/add_product', ['category' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|max:255',
            'url' => 'required',
            'product_name' => 'required',
            'prices' => 'required|numeric|max:10000000',
            'product_code' => 'required|numeric',
            'product_info' => 'required',
        ]);
        $product_id = $request->input('product_id');
        $url = $request->input('url');
        $product_name = $request->input('product_name');
        $prices = $request->input('prices');
        $product_code = $request->input('product_code');
        $product_info = $request->input('product_info');
        $cate_id = $request->input('cate_id');
        DB::table('products')->insert([
            'cate_id' => $cate_id,
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_code' => $product_code,
            'product_info' => $product_info,
        ]);
        DB::table('images')->insert([
            'product_id' => $product_id,
            'url' => $url,
        ]);
        DB::table('sell_products')->insert([
            'product_id' => $product_id,
            'prices' => $prices,
        ]);
        return redirect('admin/product/add_product');
    }

    public function edit($product_id)
    {
        $category = Category::get();
        $products = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->select('products.*','images.url','sell_products.prices')
            ->get()
            ->where('product_id','=',$product_id)->first();
        return view('admin/product/edit_product', compact('products','category'));
    }

    public function update(Request $request, $product_id)
    {
        $updateProduct = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|numeric',
            'product_info' => 'required',
        ]);
        $updateUrl = $request->validate([
            'url' => 'required',
        ]);
        $updatePrice = $request->validate([
            'prices' => 'required|numeric|max:10000000',
        ]);
        DB::table('products')->where('product_id', '=', $product_id)->update($updateProduct);
        DB::table('images')->where('images.product_id', '=', $product_id)->update($updateUrl);
        DB::table('sell_products')->where('sell_products.product_id', '=', $product_id)->update($updatePrice);
        return redirect('/admin/product/index')->with('completed', 'Your product has been updated');
    }
}


