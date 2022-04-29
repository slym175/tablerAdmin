@extends('layouts.admin', ['isAuthView' => true])

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
                <h1 class="m-0">Admin Panel</h1>
            </a>
        </div>
        <form class="card card-md" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Reset Password') }}</h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input id="email" type="text" placeholder="Enter Email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="off" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Send Password Reset Link') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
