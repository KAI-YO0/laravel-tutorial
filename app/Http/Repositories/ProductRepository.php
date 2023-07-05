<?php 

namespace App\Http\Repositories;

use App\Models\Product;
use Exception;
use DB;
use Log;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    protected Product $model;

    public function getProduct(): Collection
    {
        $products = Product::all();
    
        return $products;
    }

    public function getProductById(int $id): Product
    {
        $products = Product::findOrFail($id);
        
        return $products;
    }

    public function createProduct(array $formBody): Product
    {
        try{
            DB::transaction(function () use ($formBody){
                $this->model = new Product;
                $this->model->name = $formBody['name'];
                $this->model->description = isset($formBody['description']) ? $formBody['description']: null;
                $this->model->price = $formBody['price'];
                $this->model->save();
            });

        }   catch(Exception $e){
            Log::error('failed to create new product', ['exception' => $e , 'formbody' => $formBody]);
            abort(500);
        }

        return $this->model;
    }

    public function updateProductById(int $id , array $formBody): Product
    {
        try{
            DB::transaction(function () use ($id , $formBody){
                $this->model = Product::findOrFail($id);
                $this->model->name = $formBody['name'];
                $this->model->description = isset($formBody['description']) ? $formBody['description']: null;
                $this->model->price = $formBody['price'];
                $this->model->save();
            });

        }   catch(Exception $e){
            Log::error('failed to update product', ['exception' => $e , 'formbody' => $formBody]);
            abort(500);
        }

        return $this->model;
    }

    public function deleteProductById(int $id): bool
    {
        return Product::destroy($id);
    }
}