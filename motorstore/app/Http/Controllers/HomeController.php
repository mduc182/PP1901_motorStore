<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserFromRequest;
use App\Model\Category;
use App\Model\Post;
use App\Model\Product;
use App\Model\User;
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
        $posts = Post::where('id', '>', 0)->with('products')->get();



        return view('index', compact('categories', 'posts'));
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

    public function user_profile($id)
    {
        $users = User::findOrfail($id);

        return view('user_profile', compact('users'));
    }

    public function update_users(UserFromRequest $request, $id)
    {
        $users = User::findOrfail($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->user_address = $request->get('user_address');
        $users->user_phone = $request->get('user_phone');

        if ($users->save()) {
            $mess = trans('messages.updatesuccess');
        }

        return view('user_profile', compact('users'))->with(trans('mess'), $mess);
    }
}

