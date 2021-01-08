@extends('admin.admin_master')

@section('admin_content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
   <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin Login</div>
    <hr>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-info btn-block">Sign In</button>

    </form>
    </div>
</div
@endsection
