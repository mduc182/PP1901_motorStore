<?php
namespace App\Repository\Post;

use App\Model\Post;

class PostRepository implements PostRepositoryInterface
{
    public function getallpost()
    {
        return Post::paginate(5);
    }

    public function findpost($id)
    {
        $posts = Post::find($id);
        return $posts;
    }

    public function createpost()
    {
        $posts = new Post();

        return $posts;
    }
}
