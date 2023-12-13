<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ORDER DETAIL #') }} {{$order->saleno}}
            </h2>
            <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary">
                Order List
            </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <div class="font-bold">Customer Name</div>
                            <div>{{ $order->customer->name }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Customer Phone</div>
                            <div>{{ $order->customer->phone }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Deliver Address</div>
                            <div>{{ $order->customer->address }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Customer Email</div>
                            <div>{{ $order->customer->email }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Order Date</div>
                            <div>{{ $order->order_date }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Total Amount</div>
                            <div>{{ $order->total_amount }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Payment Method</div>
                            <div>{{ $order->payment_method }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Payment Status</div>
                            <div>{{ $order->payment_status }}</div>
                        </div>
                        <div>
                            <div class="font-bold">Order Status</div>
                            <div>{{ $order->order_status }}</div>
                        </div>
                </div>
                <div class="">
                    <h3 class="font-bold text-xl">Order Items</h3>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Product Name</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Unit Price</th>
                                <th class="px-4 py-2">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $item->product->name }}</td>
                                <td class="border px-4 py-2">{{ $item->qty }}</td>
                                <td class="border px-4 py-2">{{ $item->unit_price }}</td>
                                <td class="border px-4 py-2">{{ $item->total_price }}</td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
