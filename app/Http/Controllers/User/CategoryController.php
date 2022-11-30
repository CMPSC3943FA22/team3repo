<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $data['pageHeading'] = 'Categories';
        $data['title'] = 'Categories';
        $data['data'] = DB::table('categories')->orderBy('updated_at', 'DESC')->simplePaginate(10);
        return view('user.pages.category.index', $data);
    }

    public function addEdit(Request $request, $id=0)
    {
        $data['data_value'] = DB::table('categories')->where('id', $id)->first();
        $data['title'] = ($id == 0) ? "Add" : "Edit";
        $data['pageHeading'] = ($id == 0) ? "Add" : "Edit";
        $data['post_url'] =  route('user.category.update', [$id, 'page' => $request->query('page'), 'search' => $request->query('search')]);
        return view('user.pages.category.add', $data);
    }

    public function update(Request $request, $id=0) {
        $category = ($id == 0) ? new Category : Category::find($id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->position = $request->position;
        $category->description = $request->description;
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->route('user.category', ['page' => $request->query('page'), 'search' => $request->query('search')]);   
     }

     public function delete(Request $request, $id=0) {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('user.category', ['page' => $request->query('page'), 'search' => $request->query('search')]);
     }

 

}

