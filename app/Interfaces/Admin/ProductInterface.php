<?php

namespace App\Interfaces\Admin;

use App\Models\Product;

interface ProductInterface
{
    public function createProduct(array $data): bool;
    public function updateProduct(int $productId, array $data): bool;
    public function softDeleteProduct(Product $product): bool;
    public function forceDeleteProduct(Product $product): bool;

    // public function updateProduct(int $productId, array $data): bool;

    // public function deleteProduct(int $productId): bool;

    // public function getProduct(int $productId): ?array;

    // public function getAllProducts(): array;
}
