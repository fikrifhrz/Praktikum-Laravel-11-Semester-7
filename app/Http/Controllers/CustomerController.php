<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Support\Facedes\Storage;

class CustomerController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index() : View
    {
        //get all products
        $customer = Customer::latest()->paginate(10);

        //render view with products
        return view('customers.index', compact('customers'));
    }

    /**
     * create
     * @return view
     */
    public function create() : View
    {
        return view('customers.create');
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */

    public function store($request) : RedirectResponse
    {
        //validate form
        $request->validate([
            'nik'    => 'required|numeric',
            'name'   => 'required|string|max:255',
            'telp'   => 'required|numeric',
            'email'  => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

    Customer::create([
            'nik'    => $request->nik,
            'name'   => $request->name,
            'telp'   => $request->telp,
            'email'  => $request->email,
            'alamat' => $request->alamat,
    ]);
    //redirect to index
    return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return view
     */

    public function show(string $id): View
    {
        //get customer by ID
        $customer = Customer::findorFail($id);

        //render view with customer
        return View('customer.show', compact('customer'));
    }
}