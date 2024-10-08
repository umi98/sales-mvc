<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function index() {
        $sales = Sales::all();
        return view('sales.index', compact('sales'));
    }

    public function create() {
        return view('sales.insert');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_sale' => 'required'
        ]);
        Sales::create($request->all());
        return redirect()->route('sales.index')->with('success','Sales added');
    }

    public function edit($id) {
        $sales = Sales::find($id);
        return view('sales.edit', compact('sales'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_sale' => 'required'
        ]);
        $sales = Sales::findOrFail($id);
        $sales->update($request->all());
        return redirect()->route('sales.index')->with('success','Sales updated');
    }

    public function destroy($id) {
        $sales = Sales::findOrFail($id);
        $sales->delete();
        return redirect()->route('sales.index')->with('success','Sales deleted');
    }
}
