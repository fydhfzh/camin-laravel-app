@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 bg-danger">
                <h5><a class="text-decoration-none text-dark" href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h5>
            </div>
        @endforeach
    </div>
</div>
@endsection