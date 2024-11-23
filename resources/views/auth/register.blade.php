@extends('frontend.layouts.app')
@section('title', 'Register')
@section('content')


<div class="container bg-light-green py-5">
    <h2 class="text-center">User Registration</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('user.register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="{{ route('login.form') }}" class="btn btn-link">Already have an account? Login</a>
            </form>
        </div>
    </div>
</div>

@endsection