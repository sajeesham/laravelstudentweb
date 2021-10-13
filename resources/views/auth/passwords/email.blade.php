@extends('auth.layouts.app')

@section('bodyClass') page-forgot-password layout-full  @endsection

@section('content')
    <div class="brand">
        <img class="brand-img" style="width: 50px;" src="{{ Setting::get('site_logo') }}" alt="...">
        <h2 class="brand-text">{{ Setting::get('site_title') }}</h2>
    </div>
    <h2>Forgot Your Password ?</h2>
    <p>Input your registered email to reset your password</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group form-material floating @error('email') has-error @enderror">
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email') }}">
            <label class="floating-label" for="inputEmail">Your Email</label>
            @error('email')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Reset Your Password</button>
        </div>
    </form>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/examples/css/pages/forgot-password.css') }}">
@endsection

@section('scripts')
@endsection
