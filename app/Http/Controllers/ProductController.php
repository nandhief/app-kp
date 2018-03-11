<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Warehouse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'kode', 'name')->get();
        $jenis = [
            '' => '-- Pilih --',
            '1' => 'Milik',
            '2' => 'Titipan',
        ];
        return view('products.create', compact('categories', 'jenis'));
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
            'kode' => 'unique:products,kode',
            'name' => 'required',
            'price' => 'required|numeric',
            'jenis' => 'required',
            'category' => 'required',
        ]);
        $nokode = is_null(Product::orderBy('id', 'desc')->first()) ? '1' : Product::orderBy('id', 'desc')->first()->id+1;
        $kode = empty($request->kode) ? substr('000000000000' . $nokode, -6) : $request->kode;
        $product = new Product;
        $product->kode = $kode;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->type = intval($request->jenis);
        $product->category_id = $request->category;
        $product->save();
        Warehouse::create(['product_id' => $product->id]);
        return redirect()->route('products.index')->with('message', "Produk $kode : $request->name berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'kode', 'name')->get();
        $jenis = [
            '' => '-- Pilih --',
            '1' => 'Milik',
            '2' => 'Titipan',
        ];
        return view('products.edit', compact('product', 'jenis', 'categories'));
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
            'kode' => 'unique:products,kode,'.$id,
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->kode = $request->kode;
        $product->name = $request->name;
        $product->price = $request->price;
        if (!empty($request->jenis)) {
            $product->type = $request->jenis;
        }
        $product->category_id = $request->category;
        $product->save();
        return redirect()->route('products.index')->with('message', "Produk $request->kode : $request->name berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $kode = $product->kode;
        $name = $product->name;
        $product->delete();
        return redirect()->route('products.index')->with('message', "Produk $kode : $name berhasil dihapus");
    }

    /**
     * Delete all selected Product at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Product::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
