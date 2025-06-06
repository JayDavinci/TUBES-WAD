@extends('layouts.auth')

@section('title', 'Login - ASRI')

@section('content')
<div class="card">
  <div class="card-header bg-danger text-white">Login</div>
  <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" required autofocus>
      </div>
      <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-danger">Login</button>
      <a href="{{ route('register') }}" class="ms-3">Belum punya akun? Register</a>
    </form>
  </div>
</div>
@endsection
