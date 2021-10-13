@extends('admin.layouts.app')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Edit Student</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li><a href="javascript:void(0)">Student </a></li>
                <li class="active">Edit Student </li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-primary btn-round" href="{{ route('admin.student.index') }}">
                    <i class="icon md-arrow-left" aria-hidden="true"></i>
                    <span class="hidden-xs">Back</span>
                </a>
            </div>
        </div>

        <div class="page-content">
            <!-- Panel Form Elements -->
            <form method="post" action="{{ route('admin.student.update',$student->id) }}" id="teacher_create_form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student Details</h3>
                    </div>
                    <div class="panel-body container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 padding-left-0">
                                <div class="form-group">
                                    <div class="example-wrap @error('name') has-error @enderror">
                                        <h4 class="example-title">Name<span class="required">*</span></h4>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="First Name" value="{{ $student->name }}">
                                        @error('name')
                                        <small class="help-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6 col-md-6 padding-right-0">
                                <div class="form-group">
                                <div class="example-wrap @error('gender') has-error @enderror">
                                        <h4 class="example-title">Gender<span class="required">*</span></h4>
                                        <select type="text" class="form-control" name="gender" id="gender">
                                            <option value="">-Select</option>
                                            <option @if($student->gender == "Male") selected @endif value="Male">Male</option>
                                            <option @if($student->gender == "Female") selected @endif value="Female">Female</option>
                                            <option @if($student->gender == "Others") selected @endif value="Others">Others</option>
                                            </select>
                                        @error('gender')
                                        <small class="help-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-12 col-md-12 padding-0 margin-0">
                                    <div class="col-sm-6 col-md-6 padding-left-0">
                                    <div class="form-group">
                                    <div class="example-wrap @error('dob') has-error @enderror">
                                    <h4 class="example-title">Date of Birth</h4>
                                    <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="{{ $student->dob }}">
                                    @error('dob')
                                    <small class="help-block">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    </div>
                                    </div>
                                    

                                    <div class="col-sm-6 col-md-6 padding-right-0">
                                    <div class="form-group">
                                    <div class="example-wrap @error('teacher') has-error @enderror">
                                    <h4 class="example-title">Teacher</h4
                                    >
                                    <select type="text" class="form-control" name="teacher" id="teacher">
                                    <option value="">-Select</option>
                                            @forelse($teachers as $teach)
                                                <option @if($student->teacher_id == $teach->id) selected @endif value="{{ $teach->id }}">{{ $teach->name }}</option>
                                            @empty
                                            @endforelse
                                            </select>
                                            @error('teacher')
                                    <small class="help-block">{{ $message }}</small>
                                    @enderror
                                    </div>
                                    </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="example-wrap @error('description') has-error @enderror">
                                        <h4 class="example-title">Description</h4>
                                        <textarea type="text" class="form-control" name="description" id="description" placeholder="Description">{{ $student->description }}</textarea>
                                        @error('description')
                                        <small class="help-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="text-right">
                                    <a href="{{ route('admin.student.index') }}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light" id="validateButton3">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </form>
            <!-- End Panel Form Elements -->
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/remark/plugins/jquery-validation-1.19.3/dist/css/validation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/dropify/dropify.css') }}">
    <style>
        .new_owner_info{
            display: none;
        }
        .new_owner_info.show{
            display: block;
        }
        .panel {
            margin-bottom: 10px;
        }
        .dropify-wrapper{
            overflow: visible;
        }
        .dropify-wrapper .help-block{
            position: absolute;
            width: 100%;
            bottom: -36px;
            text-align: left;
        }
        .dropify-wrapper input.help-block + small.help-block + button.dropify-clear + .dropify-preview,.dropify-wrapper input.help-block + small.help-block + .dropify-preview {
            border: 2px solid rgb(255 0 0);
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('assets/remark/global/js/components/jquery-placeholder.js') }}"></script>
    <script src="{{ asset('assets/remark/global/js/components/input-group-file.js') }}"></script>
    <script src="{{ asset('assets/remark/plugins/jquery-validation-1.19.3/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/remark/plugins/jquery-validation-1.19.3/dist/additional-methods.js') }}"></script>

    <script>
        (function(document, window, $) {
            'use strict';
            var Site = window.Site;
            $(document).ready(function() {
                Site.run();
            });
        })(document, window, jQuery);

        $(document).ready(function (){
            jQuery.validator.addMethod("dateLessThan",
                function(value, element, params) {
                    if(value)
                        return (new Date(value) < params)
                    else
                        return true
                },'Must be less than than {0}.');
            $("#teacher_create_form").validate({
                rules: {
                    name: "required",
                    gender: "required",
                    teacher: "required",
                    dob: {     
                        required:true,  
                        date : true,
                        dateLessThan : new Date()
                    },
                },
            });
        });
    </script>

@endsection
