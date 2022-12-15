@extends('layouts.app')

@section('content')



<div class="container py-5" style="height: 900px">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body pt-5 pb-5 text-center">

            <div class="mb-md-5 mt-md-4">

              <h2 class="fw-bold mb-2 text-uppercase">Forgot Password</h2>
              <p class="text-white-50 mb-5">Please enter your email for change password!</p>

               <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
