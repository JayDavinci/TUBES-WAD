@extends('layouts.auth')

@section('title', 'Register - ASRI')

@section('content')
<div class="card">
  <div class="card-header bg-danger text-white">Register</div>
  <div class="card-body">
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <label for="name">Nama</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>
      <div class="mb-3">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" class="form-control" name="password_confirmation" required>
      </div>
      <button type="submit" class="btn btn-danger">Register</button>
      <a href="{{ route('login') }}" class="ms-3">Sudah punya akun? Login</a>
    </form>
  </div>
</div>
@endsection
