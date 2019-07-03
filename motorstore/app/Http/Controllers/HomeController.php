<?php

namespace App\Http\Controllers;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id',0)->with('childs')->get();
        $products = Product::all();

        return view('index', compact('categories', 'products'));
    }

    public function admin()
    {
        return view('layouts.admin');
    }

    public function change_lang($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }
}
