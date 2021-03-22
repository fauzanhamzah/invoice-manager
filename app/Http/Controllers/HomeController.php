<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Product;
use App\Invoice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counts = Product::all()->count();
        $c_customers = Customer::all()->count();
        $c_users = User::all()->count();
        $c_invoice = Invoice::all()->count();
        return view('home', compact('counts', 'c_customers', 'c_users', 'c_invoice'));
    }
}
