@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #1e1e2f, #3b3b58); border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0" style="overflow: hidden; background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        {{ __('Login') }}
                    </div>

                    <div class="card-body p-5 position-relative">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label text-light">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label text-light">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="border-color: rgba(255, 255, 255, 0.4);">
                                <label class="form-check-label text-light" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="d-flex flex-column">
                                <button type="submit" class="btn w-100 mb-3" style="background: linear-gradient(to right, #8e44ad, #3498db); color: #fff; font-weight: bold; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); transition: transform 0.3s, box-shadow 0.3s;">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
