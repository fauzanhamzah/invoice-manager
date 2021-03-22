<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('customers.index', compact('customers'));
    }

    public function indexlist()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('customers.indexlist', compact('customers'));
    }

    public function view(Customer $customer)
    {
        return view('customers.view', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'addressline1' => 'required|string',
            'town' => 'required|string',
            'zipcode' => 'required|integer',
            'phone' => 'required|string',
            'email' => 'required|string'

        ]);

        if (Customer::create($request->all())) {
            $request->session()->flash('success', ' Customer has been Added!');
        } else {
            $request->session()->flash('error', ' There was an error adding the customer!');
        }

        // Customer::create($request->all());
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string',
            'addressline1' => 'required|string',
            'town' => 'required|string',
            'zipcode' => 'required|integer',
            'phone' => 'required|string',
            'email' => 'required|string'

        ]);

        if (Customer::where('id', $customer->id)
            ->update([
                'name' => $request->name,
                'addressline1' => $request->addressline1,
                'addressline2' => $request->addressline2,
                'town' => $request->town,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email

            ])
        ) {
            $request->session()->flash('success', $customer->name . ' has been Updated!');
        } else {
            $request->session()->flash('error', ' There was an error updating! ' . $customer->name);
        }

        // Customer::where('id', $customer->id)
        //     ->update([
        //         'name' => $request->name,
        //         'addressline1' => $request->addressline1,
        //         'addressline2' => $request->addressline2,
        //         'town' => $request->town,
        //         'zipcode' => $request->zipcode,
        //         'phone' => $request->phone,
        //         'fax' => $request->fax,
        //         'email' => $request->email

        //     ]);
        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Request $request)
    {

        if (Customer::destroy($customer->id)) {
            $request->session()->flash('success', $customer->name . ' has been deleted!');
        } else {
            $request->session()->flash('error', ' There was an error deleting! ' . $customer->name);
        }
        // Customer::destroy($customer->id);
        return redirect('/customers');
    }
}
