<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    public function index(){
        return Inertia::render("index",[
            'customers'=> Customer::all()->map(function($customer){
                return [
                    'id'=> $customer->id,
                    'name'=> $customer->name,
                    'email'=> $customer->email,
                    'phone'=> $customer->phone,
                ];
            })
        ]);

    }
    public function create(){
        return Inertia::render('create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|unique:customers',
        ]);

        Customer::create($validated);
        return Redirect::route('index');
    }

    public function edit(Customer $customer){
        return Inertia::render('edit',[
            'customer' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer){
        $validated = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|unique:customers',
        ]);

        $customer->update($validated);
        return Redirect::route('index');
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return Redirect::route('index');
    }
}
