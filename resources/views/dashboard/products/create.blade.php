@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add New Product</h1>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <form action="/dashboard/products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                      <label for="product_name" class="form-label">Product Name</label>
                      <input name="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" placeholder="Enter product name" value="{{ old('product_name') }}">
                      @error('product_name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="my-3">
                      <label for="product_description" class="form-label">Product Description</label>
                      <input name="product_description" type="text" class="form-control @error('product_description')
                          is-invalid
                      @enderror" id="product_description" placeholder="Enter product description" value="{{ old('product_description') }}">
                      @error('product_description')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group my-3">
                      <label for="category_id" class="form-label">Category</label>
                      <select id="category_id" name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            @if (old('category_id') === $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group my-3">
                      <label for="price" class="form-label">Price</label>
                      <input name="price" id="price" type="number" class="form-control @error('price')
                          is-invalid
                      @enderror" id="price" placeholder="Enter price" value="{{ old('price') }}">
                      @error('price')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group my-3">
                      <label for="stock" class="form-label">Stock</label>
                      <input name="stock" id="stock" type="number" class="form-control @error('stock')
                          is-invalid
                      @enderror" id="stock" placeholder="Enter stock" value="{{ old('stock') }}">
                      @error('stock')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group my-3">
                      <label for="image" class="form-label">Image</label>
                      <input name="image" type="file" class="form-control" id="image" placeholder="Select image" onchange="getImage(event)">
                    </div>
                    <div class="form-group my-3">
                      <input type="hidden" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <img id="img-preview" class="img-fluid">
                    </div>
                    <button type="submit" class="btn btn-primary">Add New Product</button>
                  </form>
            </div>
        </div>
    </div>
    <script>
        function getImage(event){
            const imgPreview = document.getElementById('img-preview')
            imgPreview.src = URL.createObjectURL(event.target.files[0])
            imgPreview.onload = () => {
                URL.revokeObjectURL(imgPreview.src);
            }
        }

        const productName = document.querySelector('#product_name')
        const productSlug = document.querySelector('#slug')

        productName.addEventListener('change', function(){            
          fetch('/dashboard/checkSlug?product_name=' + productName.value)
          .then(response => response.json())
          .then(data => productSlug.value = data.slug)
        })
    </script>
@endsection