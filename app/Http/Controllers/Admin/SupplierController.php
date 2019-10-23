<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('back-end.admin.suppliers.index', [
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.admin.suppliers.create');
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
            'name' => 'required',
            'company' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'status' => 'required',
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->company = $request->company;
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->status = $request->status;
        $supplier->save();
        Toastr::success('Supplier info saved successfully', 'Success');
        return redirect()->back();
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
        $supplier = Supplier::find($id);
        return view('back-end.admin.suppliers.edit', compact('supplier'));
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
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->company = $request->company;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->status = $request->status;
        $supplier->save();
        
        Toastr::success('Supplier info updated successfully', ':) Success');
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        Toastr::success('Supplier info deleted successfully', ':) Success');
        return redirect()->back();
    }
}
