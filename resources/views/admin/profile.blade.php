@extends('admin.layouts.app')
@section('bodyClass') page-profile @endsection

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Profile</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Page Widget -->
                    <div class="widget widget-shadow text-center">
                        <div class="widget-header">
                            <div class="widget-header-content">
                                <a class="avatar avatar-lg" href="javascript:void(0)">
                                    <img src="{{ asset('assets/remark/global/portraits/5.png') }}" alt="...">
                                </a>
                                <h4 class="profile-user">{{ Auth::user()->name }}</h4>
                                <p class="profile-job">{{ Auth::user()->email }}</p>
                                <p class="profile-job">{{ Auth::user()->phone }}</p>
                                <p></p>

                            </div>
                        </div>
                    </div>
                    <!-- End Page Widget -->
                </div>
                <div class="col-md-9">
                    <!-- Panel -->
                    <div class="panel">
                        <div class="panel-body nav-tabs-animate">
                            <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                <li class="@if(!($errors->has('oldpassword') || $errors->has('password') || $errors->has('password_confirmation'))) active @endif" role="presentation"><a data-toggle="tab" href="#hospitaldetails" aria-controls="activities" role="tab">Profile</a></li>
                                <li  class="@if(($errors->has('oldpassword') || $errors->has('password') || $errors->has('password_confirmation'))) active @endif" role="presentation"><a data-toggle="tab" href="#hospitallocation" aria-controls="profile" role="tab">Change Password</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane @if(!($errors->has('oldpassword') || $errors->has('password'))) active @endif animation-slide-left" id="hospitaldetails" role="tabpanel">
                                    <!-- Panel Floating Lables -->
                                    <form action="{{ route('admin.saveprofile') }}" method="post" id="profileForm" autocomplete="off">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group form-material floating">
                                                <input type="text" class="form-control" name="firstname" value="{{ Auth::user()->name }}">
                                                <label class="floating-label">First Name<span class="required">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-material floating">
                                                <input type="text" class="form-control" name="lastname" @if($admin) value="{{ $admin->lastname }}" @endif>
                                                <label class="floating-label">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating">
                                                <input type="number" class="form-control" name="phone"  @if($admin->phone != '0') value="{{ $admin->phone }}" @endif>
                                                <label class="floating-label">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating">
                                                <input type="email" class="form-control" name="email" disabled  value="{{ Auth::user()->email }}">
                                                <label class="floating-label">Email<span class="required">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating">
                                                <textarea class="form-control" rows="3" name="address">@if($admin->address != 'NULL'){{ $admin->address }}@endif</textarea>
                                                <label class="floating-label">Address</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating">
                                                <input type="number" step="any" class="form-control" @if($admin->pin != '0') value="{{ $admin->pin }}" @endif name="pin">
                                                <label class="floating-label">PIN</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a href="{{ route('admin.hospital.index') }}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                                <button type="submit" class="btn btn-success waves-effect waves-light" id="validateButton3">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Panel Floating Lables -->
                                </div>
                                <div class="tab-pane @if(($errors->has('oldpassword') || $errors->has('password'))) active @endif animation-slide-left" id="hospitallocation" role="tabpanel">
                                    <form action="{{ route('admin.updatePassword') }}" method="post" id="profileForm" autocomplete="off">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating @error('oldpassword') has-error @enderror">
                                                <input type="password" class="form-control" name="oldpassword" id="oldpassword" data-toggle="password">
                                                <label class="floating-label">Password<span class="required">*</span></label>
												<div class="input-group-append">
												<span class="input-group-text"><i class="fa fa-eye"></i></span>
												</div>
												@error('oldpassword')
                                                <small class="help-block">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating @error('password') has-error @enderror">
                                                <input type="password" class="form-control" name="password" id="password" data-toggle="password">
                                                <div class="input-group-append">
												<span class="input-group-text"><i class="fa fa-eye"></i></span>
												</div>
												<label class="floating-label">New Password<span class="required">*</span></label>
                                                @error('password')
                                                <small class="help-block">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-material floating">
                                                <input type="password" class="form-control" name="password_confirmation" data-toggle="password">
                                                <div class="input-group-append">
												<span class="input-group-text"><i class="fa fa-eye"></i></span>
												</div>                                               
											   <label class="floating-label">Confirm Password<span class="required">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success waves-effect waves-light" id="validateButton3">Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Panel -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/examples/css/pages/profile.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/remark/global/js/components/jquery-placeholder.js') }}"></script>
    <script src="{{ asset('assets/remark/global/js/components/material.js') }}"></script>
    <script>
        (function(document, window, $) {
            'use strict';
            var Site = window.Site;
            $(document).ready(function() {
                Site.run();
            });
        })(document, window, jQuery);
    </script>
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
@endsection
