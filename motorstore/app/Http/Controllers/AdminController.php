<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductFromRequest;
use App\Http\Requests\CategoryFromRequest;
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
    public $categories;
    public $branches;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->branches = Branch::all();
    }

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
            },
            'branch' => function ($query) {
                $query->select('id', 'address');
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

    public function create_category()
    {
        $categories = Category::all();

        return view('admin.category_add', compact('categories'));
    }

    public function store_category(CategoryFromRequest $request)
    {

        $categories = new Category();
        $categories->id = $request->get('id');
        $categories->catename = $request->get('catename');
        $categories->parent_id = $request->get('parent_id');
        $mess = "";
        if ($categories->save())
        {
            $mess = "Add Success";
        }
        $categories = Category::all();

        return view('admin/cate', compact('categories'))->with(trans('mess'), $mess);
    }

    public function edit_cate($id)
    {
        $categories = Category::findOrfail($id);

        return view('admin.cate_edit', compact('categories'));
    }

    public function update_cate(CategoryFromRequest $request, $id)
    {
        $categories = Category::findOrfail($id);
        $categories->catename = $request->get('catename');
        $categories->parent_id = $request->get('parent_id');

        if ($categories->save())
        {
            $mess = "Update Success";
        }

        return view('admin.cate_edit', compact('categories'))->with(trans('mess'), $mess);
    }

    public function delete_cate(Request $request)
    {
        $categories = Category::findOrfail($request->get('id'));
        $categories->delete();

        return redirect('admin/cate')->with(trans('mess_del'), "Delete Success");
    }

    public function create_product()
    {
        $products = Product::all();
        $categories = $this->categories;
        $branches = $this->branches;

        return view('admin.product_add', compact('products', 'categories', 'branches'));
    }

    public function store_product(ProductFromRequest $request)
    {
        $branches = $this->branches;
        $categories = $this->categories;
        $products = new Product();
        $products->pdname = $request->get('pdname');
        $products->plate = $request->get('plate');
        $products->color = $request->get('color');
        $products->type = $request->get('type');
        $products->year = $request->get('year');
        $products->price = $request->get('price');
        $products->detail = $request->get('detail');
        $products->category_id = $request->get('category_id');
        if ($products->save())
        {
            $mess = "Add Success";
        }


        return view('admin.product_add',compact('products', 'categories', 'branches'))->with(trans('mess'), $mess);
    }

    public function edit_product($id)
    {
        $products = Product::findOrfail($id);
        $categories = $this->categories;
        $branches = $this->branches;
        return view('admin.product_edit', compact('products', 'categories', 'branches'));
    }

    public function update_product(ProductFromRequest $request, $id)
    {
        $branches = $this->branches;
        $categories = $this->categories;
        $products = Product::findOrFail($id);
        $products->pdname = $request->get('pdname');
        $products->plate = $request->get('plate');
        $products->color = $request->get('color');
        $products->type = $request->get('type');
        $products->year = $request->get('year');
        $products->price = $request->get('price');
        $products->detail = $request->get('detail');
        $products->category_id = $request->get('category_id');
        $products->branch_id = $request->get('branch_id');

        if ($products->save())
        {
            $mess = "Update Success";
        }

        return view('admin.product_edit',  compact('products', 'categories', 'branches'))->with(trans('mess'), $mess);
    }
}

