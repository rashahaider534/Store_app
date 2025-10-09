@extends('layouts.master')

@section('content')
    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset($product->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span>Per one pice</span> ${{ $product->price }}</p>
                        <p>{{ $product->discription }}</p>
                        <div class="single-product-form">
                            <form action="{{ url('/add-to-cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="quantity" id="quantity" min="1" value="1"
                                        class="form-control" style="width:100px; display:inline-block;">
                                </div>

                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-shopping-cart"></i>   Add to cart
                                </button>
                            </form>
                            <p><strong>Categorie: </strong>{{ $product->shop->name }}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->
	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row text-center">
    @foreach ($Related_products as $rp)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="{{ url('/show_product/'.$rp->id) }}">
                        <img src="{{ asset($rp->image) }}" alt="{{ $rp->name }}">
                    </a>
                </div>
                <h3>{{ $rp->name }}</h3>
                <p class="product-price"><span>Per Kg</span> {{ $rp->price }}$</p>
            </div>
        </div>
    @endforeach
</div>


			</div>
		</div>
	</div>
	<!-- end more products -->
<!-- testimonail-section -->
<div class="testimonail-section mt-80 mb-150">
    <div class="container">
        <div class="row">
            @if($product->Image->count()>1)
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    @foreach ($product->Image as $img)
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                    <img src="{{ asset($img->image_path) }}" alt="{{ $product->name }}" width="150" height="150">
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- end testimonail-section -->

@endsection
