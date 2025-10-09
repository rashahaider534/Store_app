@extends('layouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            {{-- رسالة نجاح/خطأ بالمنتصف --}}
            @if (session('success') || session('error'))
                <div id="alertMessage" class="custom-alert">
                    {{ session('success') ?? session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li><a href="/product">All Products in shops</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{url('/show_product/'.$product->id)}}">
                                    <img src="{{ url($product->image) }}"
                                        style="max-height: 250px !important; min-height: 250px !important" alt="">
                                </a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price">
                                <span>quantity: {{ $product->quantity }}</span> {{ $product->price }}$
                            </p>
                            <h5>{{ $product->discription }}</h5>

                            <!-- زر إضافة للسلة -->
                            <button type="button" class="cart-btn" data-toggle="modal"
                                data-target="#cartModal{{ $product->id }}">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>

                            <!-- زر حذف -->
                            <div>
                                <form action="{{ url('/removeproduct', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" style="background:none; border:none; cursor:pointer;">
                                        <i class="fas fa-trash" style="color:red"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- زر تعديل -->
                            <div>
                                <a href="/editproduct/{{ $product->id }}" style="color: rgb(255, 153, 0);">
                                    Edit product
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal لكل منتج -->
                    <div class="modal fade" id="cartModal{{ $product->id }}" tabindex="-1"
                        aria-labelledby="cartModalLabel{{ $product->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ url('/add-to-cart', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="cartModalLabel{{ $product->id }}">
                                            Add {{ $product->name }} to Cart
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <label for="quantity{{ $product->id }}">Quantity:</label>
                                        <input type="number" name="quantity" id="quantity{{ $product->id }}"
                                            value="1" min="1" max="{{ $product->quantity }}" class="form-control" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
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

    <!-- CSS مخصص للرسالة -->
    <style>
        .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ff4d4d;
            color: white;
            padding: 20px 40px;
            border-radius: 10px;
            z-index: 9999;
            text-align: center;
            font-size: 18px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
    </style>

    <!-- JavaScript لإخفاء الرسالة بعد 3 ثواني -->
    <script>
        setTimeout(() => {
            let alertBox = document.getElementById('alertMessage');
            if (alertBox) {
                alertBox.style.display = 'none';
            }
        }, 3000);
    </script>
@endsection
