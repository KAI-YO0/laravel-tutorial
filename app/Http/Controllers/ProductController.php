<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function show(int $id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function store(StoreRequest $request)
    {
        $form = $request ->only(['name','description','price']);

        $product = new Product;
        $product->name = $form['name'];
        $product->description = $form['description'];
        $product->price = $form['price'];

        $product->save();

        return response()->json($product);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $form = $request ->only(['name','description','price']);

        $product = Product::findOrFail($id);
        // $product = Product::find(1);

        // 1 update v 1 (คิมทำ)
        // $product->name = $form['name'];
        // $product->description = $form['description'];
        // $product->price = $form['price'];

        // 2 update v 2 (พี่ทิวทำ)
        $product->update($form);

        return response()->json($product);
    }

    public function destroy(int $id)
    {
        // delete v 1 (คิมทำ) ทำงานช้าเพราะเรียก server ดึงข้อมูลแล้วลบ (2 รอบ)
        // $product = Product::findOrFail($id);
        // $product->delete();

        // delete v2 (พี่ทิวทำ)
        Product::destroy($id);

        return response()->noContent();
    }
}
