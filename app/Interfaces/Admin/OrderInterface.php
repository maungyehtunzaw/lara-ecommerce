<?php
namespace App\Interfaces\Admin;

use App\Models\Order;

interface OrderInterface
{
    public function getOrderDetail(Order $order): ?array;
    // public function createOrder(array $data): bool;

    // public function updateOrder(int $orderId, array $data): bool;

    // public function deleteOrder(int $orderId): bool;



    // public function getAllOrders(): array;
}
