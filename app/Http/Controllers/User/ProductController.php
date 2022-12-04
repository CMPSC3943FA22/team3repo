<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Auth;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data['pageHeading'] = 'Products';
        $data['title'] = 'Products';
        $data['data'] = DB::table('products')->orderBy('updated_at', 'DESC')->simplePaginate(10);
        return view('user.pages.product.index', $data);
    }

    public function addEdit(Request $request, $id=0)
    {
        $data['data_value'] = DB::table('products')->where('id', $id)->first();
        $data['title'] = ($id == 0) ? "Add" : "Edit";
        $data['pageHeading'] = ($id == 0) ? "Add" : "Edit";
        $data['categories'] = Category::where('status', '1')->get();
        $data['post_url'] =  route('user.product.update', [$id, 'page' => $request->query('page'), 'search' => $request->query('search')]);
        return view('user.pages.product.add', $data);
    }

    public function update(Request $request, $id=0) {
        $product = ($id == 0) ? new Product : Product::find($id);
        $product->name = $request->name;
        $product->status = $request->status;
        $product->alter_price = $request->alter_price;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->is_featured = $request->is_featured;
        if($request->image_1) {
            $this->validate($request, [
                'image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
            if ($request->hasFile('image_1')) {
                $image = $request->file('image_1');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/product/');
                $image->move($destinationPath, $name);
                $product->image_1 = $name;
            }
        }

        $product->user_id = Auth::id();
        $product->save();
        return redirect()->route('user.product', ['page' => $request->query('page'), 'search' => $request->query('search')]);   
     }

     public function delete(Request $request, $id=0) {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('user.product', ['page' => $request->query('page'), 'search' => $request->query('search')]);
    }

    public function order(){
     $data['pageHeading'] = 'Order';
     $data['title'] = 'Order';
     $data['orderlists'] = Order::orderBy('updated_at', 'DESC')->simplePaginate(10);;
     return view('user.pages.order.index', $data);
    }
}

