<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductFromRequest;
use App\Http\Requests\CategoryFromRequest;
use App\Http\Requests\BranchFromRequest;
use App\Http\Requests\UserFromRequest;
use App\Model\Branch;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Order;
use App\Model\Product;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class AdminController extends Controller
{
    public $categories;
    public $branches;

    public function change_lang($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }

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

        if ($users->save()) {
            $mess = trans('messages.updatesuccess');
        }

        return view('admin.edit_user', compact('users'))->with(trans('mess'), $mess);
    }

    public function delete_user(Request $request)
    {
        $users = User::findOrfail($request->get('id'));
        $users->delete();

        return redirect('admin/user')->with(trans('mess_del'), trans('messages.delsuccess'));
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
        if ($categories->save()) {
            $mess = trans('messages.addsuccess');
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

        if ($categories->save()) {
            $mess = trans('messages.updatesuccess');
        }

        return view('admin.cate_edit', compact('categories'))->with(trans('mess'), $mess);
    }

    public function delete_cate(Request $request)
    {
        $categories = Category::findOrfail($request->get('id'));
        $categories->delete();

        return redirect('admin/cate')->with(trans('mess_del'), trans('messages.delsuccess'));
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
        $products->image = $request->get('image');

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);


        $imageName = time().'.'.request()->image->getClientOriginalExtension();



        request()->image->move(public_path('images'), $imageName);
        $products->image = $imageName;



        if ($products->save()) {
            $mess = trans('messages.addsuccess');

        }



                return view('admin.product_add', compact('products', 'categories', 'branches'))->with(trans('mess'), $mess);

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

        $products->image = $request->get('image');

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);


        $imageName = time().'.'.request()->image->getClientOriginalExtension();



        request()->image->move(public_path('images'), $imageName);
        $products->image = $imageName;

        if ($products->save()) {
            $mess = trans('messages.updatesuccess');
        }

        return view('admin.product_edit', compact('products', 'categories', 'branches'))->with(trans('mess'), $mess);
    }

        public function delete_product(Request $request)
        {
            $products = Product::findOrfail($request->get('id'));
            $products->delete();

            return redirect('admin/product')->with(trans('mess_del'), trans('messages.delsuccess'));
        }

        public function create_branch()
        {
            $branches = Branch::all();

            return view('admin.branch_add', compact('branches'));
        }

        public function store_branch(BranchFromRequest $request)
        {
            $branches = new Branch();
            $branches->address = $request->get('address');
            $branches->phone = $request->get('phone');

            if ($branches->save()) {
                $mess = trans('messages.addsuccess');
            }
            $branches = Branch::all();

            return view('admin/branch', compact('branches'))->with(trans('mess'), $mess);
        }

        public function edit_branch($id)
        {
            $branches = Branch::findOrFail($id);

            return view('admin.branch_edit', compact('branches'));
        }

        public function update_branch(BranchFromRequest $request, $id)
        {
            $branches = Branch::findOrFail($id);
            $branches->address = $request->get('address');
            $branches->phone = $request->get('phone');

            if ($branches->save()) {
                $mess = trans('messages.updatesuccess');
            }
            $branches = Branch::all();

            return view('admin/branch', compact('branches'))->with(trans('mess'), $mess);
        }

        public function delete_branch(Request $request)
        {
            $branches = Branch::findOrfail($request->get('id'));
            $branches->delete();

            return redirect('admin/branch')->with(trans('mess_del'), trans('messages.delsuccess'));
        }

        public function branch_info($id)
        {
            $branches = Branch::findOrfail($id);
            $products = Product::all();

            return view('admin.branch_info', compact('branches', 'products'));
        }
    }

