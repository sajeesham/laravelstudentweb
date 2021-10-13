@extends('auth.layouts.app')

@section('content')
    <div class="brand">
        <img class="brand-img" style="width: 50px;" src="{{ Setting::get('site_logo') }}" alt="...">
        <h2 class="brand-text">{{ Setting::get('site_title') }}</h2>
    </div>
    <form method="post" action="{{ route('register') }}">
        @csrf
        <div class="form-group form-material floating @error('name') has-error @enderror">
            <input type="text" class="form-control @if(!$errors->name) empty @endif" id="inputEmail" name="name" value="{{ old('name') }}">
            <label class="floating-label" for="inputEmail">Name</label>
            @error('name')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating @error('email') has-error @enderror">
            <input type="email" class="form-control @if(!$errors->email) empty @endif" id="inputEmail" name="email" value="{{ old('email') }}">
            <label class="floating-label" for="inputEmail">Email</label>
            @error('email')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating @error('phone') has-error @enderror">
            <input type="number" step="any" class="form-control @if(!$errors->phone) empty @endif" id="inputEmail" name="phone" value="{{ old('phone') }}">
            <label class="floating-label" for="inputEmail">Phone</label>
            @error('phone')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating @error('password') has-error @enderror">
            <input type="password" class="form-control  @if(!$errors->password) empty @endif" id="inputPassword" name="password">
            <label class="floating-label" for="inputPassword">Password</label>
						<div class="input-group-append">
												<span class="input-group-text"><i class="fa fa-eye"></i></span>
												</div>
            @error('password')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group form-material floating @error('password_confirmation') has-error @enderror">
            <input type="password" class="form-control  @if(!$errors->password_confirmation) empty @endif" id="inputPasswordCheck" name="password_confirmation">
            <label class="floating-label" for="inputPasswordCheck">Retype Password</label>
						<div class="input-group-append">
												<span class="input-group-text"><i class="fa fa-eye"></i></span>
												</div>
            @error('password_confirmation')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
    <p>Have account already? Please go to <a href="{{ route('login') }}">Login</a></p>
@endsection

@section('style')
@endsection

@section('scripts')
@endsection
		<script>
!function ($) {
//eyeOpenClass: 'fa-eye',
//eyeCloseClass: 'fa-eye-slash',
    'use strict';

    $(function () {
        $('[data-toggle="password"]').each(function () {
            var input = $(this);
            var eye_btn = $(this).parent().find('.input-group-text');
            eye_btn.css('cursor', 'pointer').addClass('input-password-hide');
            eye_btn.on('click', function () {
                if (eye_btn.hasClass('input-password-hide')) {
                    eye_btn.removeClass('input-password-hide').addClass('input-password-show');
                    eye_btn.find('.fa').removeClass('fa-eye').addClass('fa-eye-slash')
                    input.attr('type', 'text');
                } else {
                    eye_btn.removeClass('input-password-show').addClass('input-password-hide');
                    eye_btn.find('.fa').removeClass('fa-eye-slash').addClass('fa-eye')
                    input.attr('type', 'password');
                }
            });
        });
    });

}(window.jQuery);

</script>