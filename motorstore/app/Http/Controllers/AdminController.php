<?php

namespace App\Http\Controllers;

use App\Model\Branch;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Order;
use App\Model\Product;
use App\Model\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userpage()
    {
        $users = User::all();

        return view('admin.user', compact('users'));
    }

    public function catepage()
    {
        $categories = Category::all();

        return view('admin.cate', compact('categories'));
    }

    public function productpage()
    {
        $products = Product::with([
            'category' => function ($query) {
                $query->select('id', 'catename');
            }])->get()->toArray();

        return view('admin.product', compact('products'));
    }

    public function branchpage()
    {
        $branches = Branch::all();

        return view('admin.branch', compact('branches'));
    }

    public function orderpage()
    {
        $orders = Order::with([
            'user' => function ($query) {
                $query->select('id', 'name');
            }])->get()->toArray();

        return view('admin.order', compact('orders'));
    }

    public function contactpage()
    {
        $contacts = Contact::with([
            'user' => function ($query) {
                $query->select('id', 'name');
            }])->get()->toArray();

        return view('admin.contact', compact('contacts'));
    }
}
