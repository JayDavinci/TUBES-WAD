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

      <div class="form-group mb-3 position-relative">
        <label for="password">Password</label>
        <div style="position: relative;">
          <input type="password" id="password" name="password" class="form-control" required>
          <span id="togglePassword" style="position: absolute; right: 10px; top: 8px; cursor: pointer;">
            👁️
          </span>
        </div>
      </div>

      <button type="submit" class="btn btn-danger">Login</button>
      <a href="{{ route('register') }}" class="ms-3">Belum punya akun? Register</a>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.textContent = type === 'password' ? '👁️' : '🙈';
    });
  });
</script>
@endsection
