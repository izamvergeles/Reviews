@extends('layouts.app')

@section('content')
<div class="container py-5" style="height: 1000px">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your email and password!</p>

                <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-outline form-white mb-4">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              
                <!-- <div class="row mb-3 mt-5">-->
                <!--    <div class="col-md-6 offset-md-3">-->
                <!--        <div class="form-check">-->
                <!--            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>-->
    
                <!--            <label class="form-check-label" for="remember">-->
                <!--                {{ __('Remember Me') }}-->
                <!--            </label>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div>
                  <p class="mb-0">Don't have an account? <a href="{{ url('register')}}" class="text-white-50 fw-bold">Sign Up</a>
                  </p>
                </div>
            </div>
            
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
