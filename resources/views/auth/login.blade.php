@extends('layouts.admin', ['isAuthView' => true])

@section('content')
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
                <h1 class="m-0">Admin Panel</h1>
            </a>
        </div>
        <form class="card card-md" method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ __('Login') }}</h2>
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
                <div class="mb-2">
                    <label class="form-label">
                        Password
                        <span class="form-label-description">
                            <a href="{{ route('password.request') }}">I forgot password</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                </svg>
                          </a>
                        </span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input name="remember_me" type="checkbox" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Don't have account yet? <a href="{{ route('login') }}" tabindex="-1">Sign up</a>
        </div>
    </div>
@endsection
