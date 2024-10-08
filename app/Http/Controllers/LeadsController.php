<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\Products;
use App\Models\Sales;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    //
    public function index(Request $request) {
        if ($request) {
            $query = $request->input('query');

            $leads = Leads::with('products', 'sales')
                ->where('tanggal', 'LIKE', '%' . $query . '%')
                ->orWhere('no_wa', 'LIKE', '%' . $query . '%')
                ->orWhere('nama_lead', 'LIKE', '%' . $query . '%')
                ->orWhere('kota', 'LIKE', '%' . $query . '%')
                ->orWhereHas('sales', function($q) use ($query) {
                    $q->where('nama_sale', 'LIKE', '%' . $query . '%');
                })
                ->orWhereHas('products', function($q) use ($query) {
                    $q->where('nama_produk', 'LIKE', '%' . $query . '%');
                })
                ->get();

            return view('leads.index', compact('leads'));
        } else {
            $leads = Leads::with('products', 'sales')
                    ->orderBy('tanggal','desc')->get();
            return view('leads.index', compact('leads'));
        }
    }

    public function create() {
        $products = Products::all();
        $sales = Sales::all();
        return view('leads.insert', compact('sales', 'products'));
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal' => 'required',
            'id_sales' => 'required',
            'id_produk' => 'required',
            'no_wa' => 'required',
            'nama_lead' => 'required',
            'kota' => 'required'
        ]);
        Leads::create($request->all());
        return redirect()->route('leads.index')->with('success','Leads added');
    }

    public function search(Request $request) {
        
    }

    public function edit($id) {
        $lead = Leads::find($id);
        $products = Products::all();
        $sales = Sales::all();
        return view('leads.edit', compact('lead', 'sales', 'products'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'tanggal' => 'required',
            'id_sales' => 'required',
            'id_produk' => 'required',
            'no_wa' => 'required',
            'nama_lead' => 'required',
            'kota' => 'required'
        ]);
        $leads = Leads::findOrFail($id);
        $leads->update($request->all());
        return redirect()->route('leads.index')->with('success','Leads updated');
    }

    public function destroy($id) {
        $leads = Leads::findOrFail($id);
        $leads->delete();
        return redirect()->route('leads.index')->with('success','Leads deleted');
    }
}
