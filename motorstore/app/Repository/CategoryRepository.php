<?php
namespace App\Repository;

use App\Model\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getcate($id)
    {
        return Category::find($id);
    }

    public function getallcate()
    {
        return Category::paginate(20);
    }

    public function createcategory()
    {
        $categories = new Category();

        return $categories;
    }

}

