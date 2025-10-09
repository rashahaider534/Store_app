@extends('layouts.master')

@section('content')
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <!-- ✅ ضع الفورم هنا ليشمل كل البيانات -->
                                            <form action="{{ url('/store_order') }}" method="POST">
                                                @csrf

                                                <p><input type="text" id="name" name="name" placeholder="Name" required></p>
                                                <p><input type="email" id="email" name="email" placeholder="Email" required></p>
                                                <p><input type="text" id="address" name="address" placeholder="Address" required></p>
                                                <p><input type="tel" id="phone" name="phone" placeholder="Phone" required></p>
                                                <p>
                                                    <textarea name="note" id="note" cols="30" rows="10" placeholder="Say Something"></textarea>
                                                </p>

                                                <!-- ✅ Card Details -->
                                                <div class="card-details mt-5">
                                                    <h5>Card Details</h5>
                                                    <div class="cart-section mt-4 mb-150">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-12">
                                                                    <div class="cart-table-wrap">
                                                                        <table class="cart-table">
                                                                            <thead class="cart-table-head">
                                                                                <tr class="table-head-row">
                                                                                    <th class="product-image">Image</th>
                                                                                    <th class="product-name">Name</th>
                                                                                    <th class="product-price">Price</th>
                                                                                    <th class="product-quantity">Quantity</th>
                                                                                    <th class="product-total">Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php $total = 0; @endphp
                                                                                @foreach ($Productscart as $product)
                                                                                    @php
                                                                                        $subtotal = $product->product->price * $product->quantity;
                                                                                        $total += $subtotal;
                                                                                    @endphp
                                                                                    <tr class="table-body-row">
                                                                                        <td class="product-image">
                                                                                            <img src="{{ asset($product->product->image) }}" alt="">
                                                                                        </td>
                                                                                        <td class="product-name">{{ $product->product->name }}</td>
                                                                                        <td class="product-price">{{ $product->product->price }}</td>
                                                                                        <td class="product-quantity">{{ $product->quantity }}</td>
                                                                                        <td class="product-total">{{ $subtotal }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="total-section">
                                                                        <table class="total-table">
                                                                            <thead class="total-table-head">
                                                                                <tr class="table-total-row">
                                                                                    <th>Total</th>
                                                                                    <th>Price</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="total-data">
                                                                                    <td><strong>Total: </strong></td>
                                                                                    <td>${{ $total }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ✅ زر الإرسال -->
                                                <div class="cart-buttons text-center mt-4">
                                                    <button type="submit" class="boxed-btn black">Place Order</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card -->
                        </div> <!-- end accordion -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
