<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Invoice;
use App\Product;
use App\Invoice_detail;
use PDF;

class InvoiceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:invoice-list|invoice-create|invoice-edit|invoice-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices  = Invoice::with(['customer', 'detail'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function indexlist()
    {
        $invoices  = Invoice::with(['customer', 'detail'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoices.indexlist', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->get();
        return view('invoices.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id'
        ]);

        try {
            $invoices = Invoice::create([
                'customer_id' => $request->customer_id,
                'total' => 0
            ]);

            return redirect(route('invoices.edit', ['id' => $invoices->id]));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
    public function edit($id)
    {
        $invoices = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        $products = Product::orderBy('name', 'ASC')->get();
        return view('invoices.edit', compact('invoices', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        try {
            $invoices = Invoice::find($id);
            $products = Product::find($request->product_id);

            $invoice_details = $invoices->detail()->where('product_id', $products->id)->first();
            if ($invoice_details) {
                $invoice_details->update([
                    'qty' => $invoice_details->qty + $request->qty
                ]);
                //di if nya
            } else {
                Invoice_detail::create([
                    'invoice_id' => $invoices->id,
                    'product_id' => $request->product_id,
                    'price_detail' => $products->price,
                    'qty' => $request->qty
                ]);
            }

            return redirect()->back()->with(['success' => 'Product Has Been Added!!']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function deleteProduct($id)
    {
        $detail = Invoice_detail::find($id);
        $detail->delete();
        return redirect()->back()->with(['success' => 'Product Has Been Deleted!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoices = Invoice::find($id);
        $invoices->delete();
        return redirect()->back()->with(['success' => 'Invoice Has Been Deleted']);
    }

    public function generateInvoice($id)
    {
        $invoices = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        $pdf = PDF::loadView('invoices.print', compact('invoices'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function viewprint($id)
    {
        $invoices = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        return view('invoices.invoice-view', compact('invoices'));
        $pdf = PDF::loadView('invoices.invoice-print', compact('invoices'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function printpdf($id)
    {
        $invoices = Invoice::with(['customer', 'detail', 'detail.product'])->find($id);
        $pdf = PDF::loadView('invoices.invoice-print', compact('invoices'))->setPaper('a4', 'potraite');
        return $pdf->stream();
    }
}
