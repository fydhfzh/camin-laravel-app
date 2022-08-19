@extends('layouts.main')

@section('container')
<main class="form-signin w-25 m-auto my-5 ">
    <form action="/login" method="POST">
      @csrf
      <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
      @if (session('failed'))
          <div class="alert alert-danger">
            {{ session('failed') }}
          </div>
      @endif
      <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        <label for="email">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
      <div class="w-100 justify-content-center">
        <button class="w-25 btn btn-lg btn-primary align-self-center" type="submit">Sign in</button>
      </div>
    </form>
</main>
@endsection