<?php
namespace App\Repository\Post;

interface PostRepositoryInterface
{
    public function getallpost();
    public function findpost($id);
    public function createpost();
}
