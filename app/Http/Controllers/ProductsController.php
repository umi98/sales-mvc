<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index() {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.insert');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_produk' => 'required'
        ]);
        Products::create($request->all());
        return redirect()->route('products.index')->with('success','Products added');
    }

    public function edit($id) {
        $product = Products::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_produk' => 'required'
        ]);
        $products = Products::findOrFail($id);
        $products->update($request->all());
        return redirect()->route('products.index')->with('success','Products updated');
    }

    public function destroy($id) {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('products.index')->with('success','Products deleted');
    }
}
