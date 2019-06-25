<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFromRequest;
use App\Model\Branch;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Order;
use App\Model\Product;
use App\Model\User;
use Illuminate\Http\Request;
use function Sodium\compare;

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
                $query->select('id', 'name', 'user_phone', 'user_address');
            }])->get()->toArray();

        return view('admin.order', compact('orders'));
    }

    public function contactpage()
    {
        $contacts = Contact::with([
            'user' => function ($query) {
                $query->select('id', 'name', 'user_phone', 'user_address');
            }])->get()->toArray();

        return view('admin.contact', compact('contacts'));
    }

    public function edit_user($id)
    {
        $users = User::findOrfail($id);

        return view('admin.edit_user', compact('users'));
    }

    public function update_user(UserFromRequest $request, $id)
    {
        $users = User::findOrfail($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->user_address = $request->get('user_address');
        $users->user_phone = $request->get('user_phone');
        $users->isAdmin = $request->get('isAdmin');

        if ($users->save())
        {
            $mess = "Update Success" ;
        }

        return view('admin.edit_user', compact('users'))->with(trans('mess'), $mess);
    }

    public function delete_user(Request $request)
    {
        $users = User::findOrfail($request->get('id'));
        $users->delete();

        return redirect('admin/user')->with(trans('mess_del'), "Delete Success");
    }
}
