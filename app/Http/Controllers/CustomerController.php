<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);
        $citys = City::all();
        return view('/customers.list', compact('customers', 'citys'));
    }

    public function create()
    {
        $citys = City::all();
        return view('/customers.create', compact('citys'));
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->city_id = $request->city_id;
        $customer->save();
        return redirect()->route('customer.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $citys = City::all();
        return view('customers.edit', compact('customer', 'citys'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->city_id = $request->city_id;
        $customer->save();
        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function filterByCity(Request $request){
        $idCity = $request->city_id;
        $cityFilter = City::findOrFail($idCity);
        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $citys = City::all();
        return view('customers.list', compact('customers', 'citys', 'totalCustomerFilter', 'cityFilter'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $citys = City::all();
        return view('customers.list', compact('customers', 'citys'));
    }
}
