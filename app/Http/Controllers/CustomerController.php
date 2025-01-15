<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Customer;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all customers
        $customers = Customer::latest()->paginate(10);

        // Render view with customers
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return View
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form input
        $request->validate([
            'nik' => 'required|numeric|unique:customers,nik',
            'name' => 'required|min:3',
            'telp' => 'required|numeric',
            'email' => 'required|email|unique:customers,email',
            'alamat' => 'required|min:5',
        ]);

        // Create customer
        Customer::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        // Redirect to customer index with success message
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified customer.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        // Get customer by ID
        $customer = Customer::findOrFail($id);

        // Render view with customer details
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get customer by ID
        $customer = Customer::findOrFail($id);

        // Render view with customer data for editing
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified customer in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form input
        $request->validate([
            'nik' => 'required|numeric|unique:customers,nik,' . $id,
            'name' => 'required|min:3',
            'telp' => 'required|numeric',
            'email' => 'required|email|unique:customers,email,' . $id,
            'alamat' => 'required|min:5',
        ]);

        // Get customer by ID
        $customer = Customer::findOrFail($id);

        // Update customer data
        $customer->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        // Redirect to customer index with success message
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Get customer by ID
        $customer = Customer::findOrFail($id);

        // Delete customer
        $customer->delete();

        // Redirect to customer index with success message
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}