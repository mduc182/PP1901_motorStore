<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFromRequest;
use App\Model\Branch;
use App\Model\Post;
use App\Model\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_page()
    {
        $posts = Post::paginate(3);

        return view('admin.post', compact('posts'));
    }

    public function add_post()
    {
        $posts = Post::all();

        return view('admin.post_add', compact('posts'));
    }

    public function store_post(PostFromRequest $request)
    {
        $posts = new Post();
        $posts->id = $request->get('id');
        $posts->post_name = $request->get('post_name');

        if ($posts->save()) {
            $mess = trans('messages.addsuccess');
        }

        return view('admin.post_add', compact('posts'))->with(trans('mess'), $mess);
    }

    public function edit_post($id)
    {
        $posts = Post::findOrFail($id);

        return view('admin.post_edit', compact('posts'));
    }

    public function update_post(PostFromRequest $request, $id)
    {
        $posts = Post::findOrFail($id);
        $posts->post_name = $request->get('post_name');

        if ($posts->save()) {
            $mess = trans('messages.updatesuccess');
        }

        return view('admin.post', compact('posts'))->with(trans('mess'), $mess);
    }

    public function delete_post(Request $request)
    {
        $posts = Post::findOrfail($request->get('id'));
        $posts->delete();

        return redirect('admin/post')->with(trans('mess_del'));
    }
}
