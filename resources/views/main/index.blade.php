@extends('layouts.main')

@section('container')
    <div class="container my-5">
        <div class="row" style="height: 400px;">
          <div class="card rounded-5 p-2">
            <div id="mainCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                  <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner rounded-5">
                  <div class="carousel-item active img-fluid" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/random/1600x500?nature" class="d-block w-100 img-fluid shadow-md" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/random/1600x500?nature" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/random/1600x500?nature" class="d-block w-10phw0 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/random/1600x500?nature" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/random/1600x500?nature" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://source.unsplash.com/random/1600x500?nature" class="d-block w-100 img-fluid" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </div>
        </div>
        <div class="row my-5" style="height: 400px;">
          <div class="col-sm-3">
            <div class="card shadow-md" style="width: 18rem;">
              <div class="card-header">Kategori</div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  @foreach ($categories as $category)
                  <li class="list-group-item">
                    <h5><a class="text-decoration-none text-dark" href="?category={{ $category->slug }}">{{ $category->name }}</a></h5>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <form method="GET" action="/">
                      <div class="input-group">
                        @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="text" name="search" class="form-control">
                        <button class="btn btn-danger" type="submit">Search</button>
                      </div>
                    </form>
                  </div>
                  <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-4">
                      <a href="/{{ $product->slug }}" class="card my-3 mx-1 text-decoration-none text-dark" style="width: 18rem;">
                        <img class="card-img-top img-fluid" src="https://source.unsplash.com/random/1600x500?{{ $product->product_name }}" alt="Card image cap">
                        <div class="card-body">
                          <p class="card-text">{{ $product->product_name }}</p>
                          <p>Rating: {{ $product->rating }}</p>
                          <h6>Category: {{ $product->category->name }}</h6>
                          <div class="row">
                            <h6 class="col-sm-8">Rp {{ number_format($product->price,2,',','.') }}</h6>
                            <p class="col-sm-4 text-muted">{{ $product->product_sold }} terjual</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    @endforeach
                  </div>
                  <div class="row justify-content-center text-decoration-none text-dark">
                    <div class="col-md-auto my-4">
                      {{ $products->links() }}
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>    
    </div>
@endsection