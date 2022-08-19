@extends('dashboard.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <a href="/dashboard/products/create" class="btn btn-primary">Add New Product</a>
        </div>
        <div class="col-sm-10">
            @if (session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
        </div>
    </div>
    <div class="row my-4">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->rating }}</td>
                        <td>
                            <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-info text-decoration-none"><i data-feather="eye"></i></a>
                            <a href="/dashboard/products/{{ $product->slug }}/edit" class="badge bg-warning text-decoration-none"><i data-feather="edit"></i></a>
                            <a href="/dashboard/products/{{ $product->slug }}" class="badge bg-danger text-decoration-none"><i data-feather="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection