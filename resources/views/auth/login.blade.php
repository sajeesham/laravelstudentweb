@extends('auth.layouts.app')

@section('bodyClass') page-login layout-full page-dark  @endsection

@section('content')
<link rel="stylesheet" href="{{ asset('assets/remark/custom/css/custom.css') }}">
    <!--     Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/remark/global/fonts/font-awesome/font-awesome.css') }}">

    <div class="brand">

        <h2 class="brand-text">Student Web</h2>
    </div>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group form-material floating @error('email') has-error @enderror">
            <input type="email" class="form-control @if(!$errors->email) empty @endif" id="inputEmail" name="email" value="{{ old('email') }}">
            <label class="floating-label" for="inputEmail">Email</label>
            @error('email')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating @error('password') has-error @enderror">
            <input type="password" data-toggle="password" class="form-control   @if(!$errors->password) empty @endif" id="inputPassword" name="password">
				
			<div class="input-group-append">
			<span class="input-group-text"><i class="fa fa-eye"></i></span>
			</div>
				
			<label class="floating-label" for="inputPassword">Password</label>
            @error('password')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
                <input type="checkbox" id="inputCheckbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="inputCheckbox">Remember me</label>
            </div>
            <a class="pull-right" href="{{ route('password.request') }}">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
	<script src="{{ asset('assets/remark/global/vendor/jquery/jquery.js') }}"></script>
@endsection

@section('style')
@endsection

@section('scripts')
@endsection
