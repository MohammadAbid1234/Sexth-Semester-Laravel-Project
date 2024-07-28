<?php

namespace App\Http\Controllers;

use App\Models\Customer; // Import the Customer model
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // return "ok";
        $customers = Customer::all(); // Retrieve all customers from the database
        return view('customers.index', compact('customers')); // Pass the customers to the view
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('customers.create'); // Return the create view
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
        ]);

        // Create a new customer
        Customer::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $customer = Customer::findOrFail($id); // Find the customer by ID
        return view('customers.show', compact('customer')); // Pass the customer to the view
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $customer = Customer::findOrFail($id); // Find the customer by ID
        return view('customers.edit', compact('customer')); // Pass the customer to the edit view
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,'.$id,
            'phone' => 'nullable|string|max:20',
        ]);

        // Find the customer by ID and update it
        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        // Find the customer by ID and delete it
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect to the index page with a success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
