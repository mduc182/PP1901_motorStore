<?php
namespace App\Repository\Order;

use App\Model\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function getallorder()
    {
        $orders = Order::with([
            'product' => function ($query) {
                $query->select('id');
            }
        ])->paginate(5);

        return $orders;
    }
}
