<?php

namespace App\Interfaces\Admin;

use App\Models\Product;
use Illuminate\Http\Response;

interface ProductInterface
{
    public function createProduct(array $data): bool;
    public function updateProduct(int $productId, array $data): bool;
    public function softDeleteProduct(Product $product): Response;
    public function forceDeleteProduct(Product $product): Response;

    // public function updateProduct(int $productId, array $data): bool;

    // public function deleteProduct(int $productId): bool;

    // public function getProduct(int $productId): ?array;

    // public function getAllProducts(): array;
}
