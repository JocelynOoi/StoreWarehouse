<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockEntry;
use App\Models\Product;

class StockController extends Controller
{
    //
    public function index(){
        $stockEntries = StockEntry::with('product')->get();
        return view('stocks.index', compact('stockEntries'));
    }

    //
    public function create(){
        $products = Product::all();
        return view('stocks.create', compact('products'));
    }

    //
    public function store(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'action_type' => 'required|in:add,remove',
        ]);

        //
        StockEntry::create($request->all());

        //
        $product = Product::find($request->product_id);
        $newQuantity = ($request->action_type === 'add') ? $product->quantity + $request->quantity : $product->quantity - $request->quantity;
        $product->update(['quantity' => $newQuantity]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry created successfully.');
    }

    //
    public function show(StockEntry $stockEntry){
        return view('stocks.show', compact('stockEntry'));
    }

    //
    public function edit(StockEntry $stockEntry){
        $product = Product::all();
        return view('stocks.edit', compact('stockEntry', 'products'));
    }

    //
    public function update(Request $request, StockEntry $stockEntry){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'action_type' => 'required|in:add,remove',
        ]);

        //
        $stockEntry->update($request->all());

        //
        $product = Product::find($request->product_id);
        $newQuantity = ($request->action_type === 'add') ? $product->quantity + $request->quantity : $product->quantity - $request->quantity;
        $product->update(['quantity' => $newQuantity]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry updated successfully.');
    }

    //
    public function destroy(StockEntry $stockEntry){
        //
        $product = Product::find($stockEntry->product_id);

        //
        $stockEntry->delete();

        //
        //
        $product->update(['quantity' => $product->quantity - $stockEntry->quantity]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry deleted successfully.');
    }
}
