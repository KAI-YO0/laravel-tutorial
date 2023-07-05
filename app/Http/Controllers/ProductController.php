<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Repositories\ProductRepositoryInterface;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;



class ProductController extends Controller
{   
    protected ProductRepository $productRepo;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository; 
    }

    public function index()
    {
        $products = $this->productRepo->getProduct();

        return response()->json($products);
    }

    public function show(int $id)
    {
        $products = $this->productRepo->getProductById($id);

        return response()->json($products);
    }

    public function store(StoreRequest $request)
    {
        $form = $request ->only(['name','description','price']);


        $product = $this->productRepo->createProduct($form);

        return response()->json($product);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $form = $request ->only(['name','description','price']);

        // $product = Product::findOrFail($id);
        // $product = Product::find(1);

        // 1 update v 1 (คิมทำ)
        // $product->name = $form['name'];
        // $product->description = $form['description'];
        // $product->price = $form['price'];

        // 2 update v 2 (พี่ทิวทำ)
        // $product->update($form);

        $product = $this->productRepo->updateProductById($id,$form);

        return response()->json($product);
    }

    public function destroy(int $id)
    {
        // delete v 1 (คิมทำ) ทำงานช้าเพราะเรียก server ดึงข้อมูลแล้วลบ (2 รอบ)
        // $product = Product::findOrFail($id);
        // $product->delete();

        // delete v2 (พี่ทิวทำ)
        // Product::destroy($id);

        $this->productRepo->deleteProductById($id);

        return response()->noContent();
    }
}
