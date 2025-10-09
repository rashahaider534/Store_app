@extends('layouts.master')

@section('content')
<div class="container">
    <h3>إضافة صور للمنتج: {{ $product->name }}</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/upload-image/'.$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="images" class="form-label">اختر الصور:</label>
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">رفع الصور</button>
    </form>

    <hr>

    <h4>الصور الحالية:</h4>
    <div class="row">
        @foreach ($images as $img)
            <div class="col-md-3 mb-3">
                <img src="{{ asset($img->image_path) }}" alt="image" width="100" height="100">
                 <form action="{{url('/destroy_img/'.$img->id)}}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                    @csrf
                    {{-- @method('DELETE') --}}
                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection


