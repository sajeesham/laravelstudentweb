@extends('auth.layouts.app')

@section('bodyClass') page-forgot-password layout-full  @endsection

@section('content')
    <div class="brand">
        <img class="brand-img" style="width: 50px;" src="{{ Setting::get('site_logo') }}" alt="...">
        <h2 class="brand-text">{{ Setting::get('site_title') }}</h2>
    </div>
    <h2>Reset Password</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group form-material floating @error('email') has-error @enderror">
            <input type="email" class="form-control" id="email" name="email" value="{{ $email ?? old('email') }}" required>
            <label class="floating-label" for="email">Email</label>
            @error('email')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating @error('password') has-error @enderror">
            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
            <label class="floating-label" for="password">Password</label>
            @error('password')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating">
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            <label class="floating-label" for="password-confirm">Confirm Password</label>
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
