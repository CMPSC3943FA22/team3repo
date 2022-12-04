<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;

class IndexController extends Controller
{
    public function index() {
        $featuredProducts = Product::where('is_featured', '1')->get();
        $products = Product::orderBy('id', 'DESC')->get();
        $categories = Category::all();
        return view('frontend.pages.index', compact('categories', 'featuredProducts', 'products'));
    }

    public function detail(Request $request) {
        $categories = Category::all();
        $product = Product::where('id', $request->id)->first();
        $showProducts = Product::where('category_id', $product->category_id)->get();
        return view('frontend.pages.detail', compact('categories', 'product', 'showProducts'));
    }
    public function product(Request $request){
        $categories = Category::all();
        $products = Product::where('category_id', $request->id)->get();
        return view('frontend.pages.product', compact('categories', 'products'));
    }

    public function checkout(Request $request){
        $categories = Category::all();
        $product = Product::where('id', $request->id)->first();
        return view('frontend.pages.order', compact('categories', 'product'));
    }

    public function order(Request $request){
        try{
            $value = $request->all();
            $create=Order::create($value);
            if($create){
                session()->flash('success','Thank you for your order, Our Team will contact you soon.');
                return back();
            }else{
                session()->flash('error','Sorry! Your order could not be placed at the moment please try again. Thank you!');
                return back();
            }
        }catch (\Exception $e){
            $e = $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }
}