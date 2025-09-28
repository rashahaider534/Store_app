@extends('layouts.master')
@section('content')

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Add</span> Product</h3>

                </div>
            </div>
        </div>
        {{-- <div class="row"> --}}
            <div class="contact-from-section mt-150 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="form-title">

                            </div>
                             <div id="form_status"></div>
                            <div class="contact-form">
                                <form method="POST" enctype="multipart/form-data" action="/storeupdate/{{$product->id}}" id="fruitkha-contact" onsubmit="return valid_datas( this );">
                                   @csrf
                                    <p>
                                        <input type="text" style="width: 100%" placeholder="Name" name="name" id="name" value="{{$product->name}}">

                                        <span class="text-danger">
                                            @error('name')
                                            {{$message}}
                                            @enderror
                                        </span>
                                    </p>
                                    <p>
                                        <input type="number" placeholder="price" name="price" id="price" value="{{$product->price}}" required>
                                        <input type="number" placeholder="quantity" name="quantity" id="quantity" value="{{$product->quantity}}" required>
                                    </p>
                                    <p> <textarea name="discription" id="discription" cols="30" rows="10" placeholder="discription" required>{{ $product->discription }}</textarea>
                                    <p>
                                        <select class="form-control" name="shop_id" id="shop_id">
                                            @foreach ($allshops as $item)
                                            @if ($item->id==$product->shop_id)
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @endif
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </p>
                                    <div>
                                        <label>الصورة الحالية:</label>
                                        <img src="{{ asset($product ->image) }}" width="100">
                                    </div>
                                        <input type="file"  class="form-control" name="image" id="image">

                                    <p><input type="submit" value="Submit"></p>
                                </form>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
{{-- </div> --}}



@endsection
