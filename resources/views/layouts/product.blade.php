@extends('layouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li><a href="/product">All Products in shops</a></li>
                            {{-- فلاتر إضافية ممكن تضاف هنا --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html">
                                    <img src="{{ url($product->image) }}"
                                        style="max-height: 250px !important; min-height: 250px !important" alt="">
                                </a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>quantity: {{ $product->quantity }}</span> {{ $product->price }}$
                            </p>
                            <h5>{{ $product->discription }}</h5>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>

                            <div>
                                <form action="{{ url('/removeproduct', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" style="background:none; border:none; cursor:pointer;">
                                        <i class="fas fa-trash" style="color:red"></i>
                                    </button>
                                </form>
                            </div>
                            <div>
                                <a href="/editproduct/{{ $product->id }}" style="color: rgb(255, 153, 0);">
                                    Edit product
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- نهاية row المنتجات -->

            <!-- Laravel Pagination -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- CSS لتصغير حجم الروابط وتوسيطها -->
    <style>
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination li a,
        .pagination li span {
            font-size: 14px;
            padding: 5px 10px;
        }
    </style>
@endsection
