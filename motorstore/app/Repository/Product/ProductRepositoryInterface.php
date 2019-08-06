<?php
namespace App\Repository\Product;

interface ProductRepositoryInterface
{
    public function getproduct();
    public function showallproduct();
    public function findproduct($id);

}
