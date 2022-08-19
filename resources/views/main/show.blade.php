@extends('layouts.main')

@section('container')
    <div class="container my-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://source.unsplash.com/random/500x500?pen" alt="..." class="img-fluid rounded-3 shadow-md">
                            </div>
                            <div class="col-md-8">
                                <h3 class="w-50">{{ $product->product_name }}</h5>
                                <p class="w-50">{{ $product->product_description }}</p>
                                <p class="text-muted">Stok: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5>Review</h5>
                            <ul class="list-group">
                                @foreach ($product->reviews as $review)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="https://source.unsplash.com/random/500x500?pen" alt="..." class="img-fluid rounded-circle">
                                            <p style="font-size: 10px">{{ $review->user->name }}</p>
                                        </div>
                                        <div class="col-sm-10">
                                            <h6 class="text-muted">Rating: {{ $product->rating }}</h6>
                                            <p>
                                                {{ $review->review_detail }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <h5>Set amount and note</h5>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <button name="subtract" onclick="subtract()" class="btn btn-danger">-</button>
                                        <input class="form-control text-center" value="1" name="amount" min="1" max="{{ $product->stock }}">
                                        <button name="add" onclick="add()" class="btn btn-danger">+</button>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <button name="order" class="btn btn-danger">
                                        <a href="/{{ $product->slug }}/confirm" class="text-decoration-none text-light">Order</a>
                                    </button>
                                    @if (request('amount') <= $product->stock)
                                        {{ Session::put('amount', request('amount')) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const counter = document.getElementsByName('amount')[0]
        const adder = document.getElementsByName('add')[0]
        const subtractor = document.getElementsByName('subtract')[0]
        
        function add(){
            var value = parseInt(counter.value) + 1
            counter.value = +value
            handleButton(counter.value)
        }
        
        function subtract(){
            var value = parseInt(counter.value) - 1
            counter.value = +value
            handleButton(counter.value)
        }
        
        const orderButton = document.getElementsByName('order')[0]
        
        function handleButton(amount){
            if({{ $product->stock }} < amount){
                console.log(amount)
                orderButton.disabled = true
            }else{
                orderButton.disabled = false
            }
        }
    </script>
@endsection