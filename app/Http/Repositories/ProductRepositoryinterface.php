<?php

namespace App\Http\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

interface ProductRepositoryInterface
{
    public function getProduct(): Collection; 
    public function getProductById(int $id): Product; 
    public function createProduct(array $formBody): Product; 
    public function updateProductById(int $id , array $formBody): Product; 
    public function deleteProductById(int $id): bool; 
}