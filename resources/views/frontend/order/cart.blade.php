@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            @if (empty($orderItems))
                <div class="card  px-xl-5" style="width: 100%">
                    <div class="card-body text-center">
                        <h3>Your Cart is Empty, Add to the cart and check again</h3>
                        <a href="{{ route('front.product') }}" class="btn btn-primary">Continue Shopping</a>
                    </div>
                </div>
            @else
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0 " id="cartTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($orderItems as $key => $cartItem)
                                <tr id="cartRow_{{ $cartItem['product']['id'] }}">
                                    <td class="align-middle text-left pl-3">
                                        <a href="{{ route('front.product.show', $cartItem['product']['id']) }}">
                                            {{ $cartItem['product']['name'] }}</a>
                                    </td>
                                    <td class="align-middle">{{ $cartItem['product']['unit_rate'] }}MMK</td>
                                    <td class="align-middle">
                                        {{-- {{$cartItem['qty']}} --}}
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus"
                                                    data-id="{{ $cartItem['product']['id'] }}"
                                                    data-amt-id="{{ $cartItem['product']['unit_rate'] }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text"
                                                class="form-control form-control-sm bg-secondary border-0 text-center"
                                                value="{{ $cartItem['qty'] }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus"
                                                    data-id="{{ $cartItem['product']['id'] }}"
                                                    data-amt-id="{{ $cartItem['product']['unit_rate'] }}">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle totalAmtAll" id="totalAmt_{{ $cartItem['product']['id'] }}">
                                        {{ $cartItem['qty'] * $cartItem['product']['unit_rate'] }}</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-danger" id="removeFromCartBtn"
                                            data-id="{{ $cartItem['product']['id'] }}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">

                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                            Summary</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6 id="cartTotalAmount"></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium"> 0</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            {{-- <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>$160</h5>
                            </div> --}}
                            <a class="btn btn-block btn-primary font-weight-bold my-3 py-3"
                                href="{{ route('front.payment') }}">Proceed To
                                Checkout</a>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
    <!-- Cart End -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            setTotalAmount();

            function setTotalAmount() {
                var total = 0;
                $("td.totalAmtAll").each(function() {
                    console.log($(this).text());
                    total += parseInt($(this).text());
                });
                $("#cartTotalAmount").text(total);
            }

            $('.quantity button').on('click', function() {
                var button = $(this);
                var product_id = $(this).data('id');
                var rate = $(this).data('amt-id');
                var newVal = 0;
                // console.log(product_id);
                // console.log(rate);
                var oldValue = button.parent().parent().find('input').val();
                if (button.hasClass('btn-plus')) {
                    newVal = parseFloat(oldValue) + 1;
                    // console.log(newVal+"Plusss");
                } else {
                    if (oldValue > 1) {
                        newVal = parseFloat(oldValue) - 1;
                        // console.log(newVal+"Minusss");
                    } else {
                        newVal = 0;
                        // console.log(newVal+"remove now");
                    }
                }
                onQtyChangeData(product_id, rate, newVal);
                button.parent().parent().find('input').val(newVal);
            });

            function onQtyChangeData(product_id, rate, qty) {
                var url = "";
                if (qty == 0) {
                    url = '/removefromcart'
                } else {
                    url = '/addtocart'
                }
                console.log(url);
                console.log(product_id + " rate" + rate + " qty" + qty);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: product_id,
                        qty: qty,
                        override: true
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success == true) {
                            if (qty == 0) {
                                $("#cartRow_" + product_id).remove();

                            } else {
                                $("#totalAmt_" + product_id).text(rate * qty);

                            }
                            setTotalAmount();
                            Toastify({
                                text: response.message,
                                className: "info",
                                // style: {
                                //     background: "linear-gradient(to right, #00b09b, #96c93d)",
                                // }
                            }).showToast();
                        }


                    }
                });
            }

        });
    </script>
@endpush
