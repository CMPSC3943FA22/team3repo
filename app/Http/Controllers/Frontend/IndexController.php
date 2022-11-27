<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use DB;

class IndexController extends Controller
{
    public function index(Request $request) {
        return view('frontend.pages.index');
    }
}