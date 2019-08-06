<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Repository\CategoryRepository;
use App\Repository\Product\ProductRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function cate_page($id)
    {
        $categories = $this->categoryRepository->getcate($id);
        $products = $this->productRepository->getproduct();

        return view('category.dream', compact('categories', 'products'));
    }

    public function product_page($id)
    {
        $products = $this->productRepository->findproduct($id);
        return view('category.detail', compact('products'));
    }

    protected $categoryRepository;
    protected $productRepository;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
}
