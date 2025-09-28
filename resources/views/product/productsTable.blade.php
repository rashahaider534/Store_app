@extends('layouts.master')
<!-- jQuery (مطلوب لـ DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
@section('content')
    <div class="container">
        <h2>قائمة المنتجات</h2>

        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->quantity }}</td>
                        <td>{{ $p->price }}</td>
                        <td>
                            @if ($p->image)
                                <img src="{{ asset($p->image) }}" alt="image" width="60" height="60">
                            @else
                                لا توجد صورة
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/editproduct', $p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ url('/removeproduct', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                               
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable', {
            responsive: true,
            columnDefs: [{
                    targets: [2],
                    visible: true
                }, // مثال للتحكم بالأعمدة
            ]
        });
    });
</script>
