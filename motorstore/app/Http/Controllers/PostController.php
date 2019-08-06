<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFromRequest;
use App\Model\Branch;
use App\Model\Post;
use App\Model\Product;
use App\Repository\Post\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function post_page()
    {
        $posts = $this->postRepository->getallpost();

        return view('admin.post', compact('posts'));
    }

    public function add_post()
    {
        $posts = $this->postRepository->getallpost();

        return view('admin.post_add', compact('posts'));
    }

    public function store_post(PostFromRequest $request)
    {
        $posts = $this->postRepository->createpost();
        $posts->id = $request->get('id');
        $posts->post_name = $request->get('post_name');

        if ($posts->save()) {
            $mess = trans('messages.addsuccess');
        }

        return view('admin.post_add', compact('posts'))->with(trans('mess'), $mess);
    }

    public function edit_post($id)
    {
        $posts = $this->postRepository->findpost($id);

        return view('admin.post_edit', compact('posts'));
    }

    public function update_post(PostFromRequest $request, $id)
    {
        $posts = $this->postRepository->findpost($id);
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
