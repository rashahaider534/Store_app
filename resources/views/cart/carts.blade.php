@extends('layouts.master')

@section('content')
<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($Productscart as $product )
								<tr class="table-body-row">
									<td class="product-remove"><a href="{{ route('cartproduct_remove', $product->product->id) }}"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src={{ asset($product->product->image) }} alt=""></td>
									<td class="product-name">{{$product->product->name}}</td>
									<td class="product-price">{{$product->product->price}}</td>
									<td class="product-quantity"><input type="number" placeholder="0" value={{$product->quantity}}></td>
									<td class="product-total">{{$product->product->price*$product->quantity}}</td>
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
                                    
									<td>$</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">

							<a href="{{url('/checkout')}}" class="boxed-btn black">Check Out</a>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

 @endsection
