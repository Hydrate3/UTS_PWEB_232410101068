@extends('layouts.app')

@section('content')
<div class="login-container">
    <h2>Login Kasir</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="username">Username:</label>
            <input 
                type="text" 
                id="username" 
                name="username" 
                required
                placeholder="Masukkan username"
            >
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
                placeholder="Masukkan password"
            >
        </div>
        
        <button type="submit" class="btn-login">Masuk</button>
    </form>
</div>
@endsection