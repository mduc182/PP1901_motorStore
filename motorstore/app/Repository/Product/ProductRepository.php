<?php
namespace App\Repository\Product;


use App\Model\Product;

class ProductRepository implements ProductRepositoryInterface
{
   public function getproduct()
   {
        return Product::all();
   }

   public function findproduct($id){
        return Product::find($id);
   }

   public function showallproduct()
   {
       $products = Product::with([
           'category' => function ($query) {
               $query->select('id', 'catename');
           },
           'post' => function ($query) {
               $query->select('id', 'post_name');
           },
           'branch' => function ($query) {
               $query->select('id', 'address');
           }])->paginate(5);

       return $products;
   }

   public function createproduct()
   {
       $products = new Product();

       return $products;
   }

}
