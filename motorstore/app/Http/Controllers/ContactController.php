<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFromRequest;
use App\Model\Category;
use App\Model\Contact;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function index()
    {
        $contacts = Contact::all();

        return view('contact', compact('contacts'));
    }

    public function store_contact(ContactFromRequest $request)
    {
        $users = $this->users;
        $contacts = new Contact();
        $contacts->id = $request->get('id');
        $contacts->notes = $request->get('notes');
        $contacts->phone = $request->get('phone');
        $contacts->address = $request->get('address');


        if ($contacts->save()) {
            $mess = trans('messages.addcontactsuccess');
        }

        return view('contact', compact('contacts', 'users'))->with(trans('mess'), $mess);
    }

    public function delete_contact(Request $request)
    {
        $contacts = Contact::findOrfail($request->get('id'));
        $contacts->delete();

        return redirect('admin/contact')->with(trans('mess_del'), trans('messages.delsuccess'));
    }
}

