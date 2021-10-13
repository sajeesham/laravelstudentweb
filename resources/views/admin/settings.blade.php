@extends('admin.layouts.app')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Settings</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="active">Settings</li>
            </ol>
        </div>
        <div class="page-content">
            <!-- Panel Collapse -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Settings</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-lg-12">
                            <!-- Example Accordion Example -->
                            <form action="{{ route('admin.savesettings') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="example-wrap">
                                <div class="example">
                                    <div class="panel-group panel-group-simple margin-bottom-0" id="settingsSite" aria-multiselectable="true" role="tablist">
                                        <div class="panel">
                                            <div class="panel-heading" id="settingSite-1" role="tab">
                                                <a class="panel-title" data-parent="#settingsSite" data-toggle="collapse" href="#settingSite-1-body"
                                                   aria-controls="exampleCollapseOne" aria-expanded="true">
                                                    <strong>Site Settings</strong>
                                                </a>
                                            </div>
                                            <div class="panel-collapse collapse in" id="settingSite-1-body" aria-labelledby="settingSite-1" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="example-wrap">
                                                                <h4 class="example-title">Site Title</h4>
                                                                <input type="text" class="form-control" name="site_title" placeholder="Enter Site Title" value="{{ Setting::get('site_title') }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="example-wrap">
                                                                <h4 class="example-title">Fav Icon</h4>
                                                                <div class="example">
                                                                    <input type="file" name="site_fav_icon" id="site_fav_icon" data-plugin="dropify" data-show-errors="true" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{Setting::get('site_fav_icon')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="example-wrap">
                                                                <h4 class="example-title">Site Logo</h4>
                                                                <div class="example">
                                                                    <input type="file" name="site_logo" id="site_logo" data-plugin="dropify" data-show-errors="true" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{Setting::get('site_logo')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="example-wrap">
                                                                <h4 class="example-title">Medicine Import Image</h4>
                                                                <div class="example">
                                                                    <input type="file" name="medicine_import_image" id="medicine_import_image" data-plugin="dropify" data-show-errors="true" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{Setting::get('medicine_import_image')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="example-wrap">
                                                                <h4 class="example-title">Genders</h4>
                                                                <small>Add 1 or more Genders, separated by a comma.</small>
                                                                <div class="example">
                                                                    <input type="text" name="gender" id="gender" class="form-control" PLACEHOLDER="" @if(Setting::get('gender')) value="{{ implode(',',Setting::get('gender')) }}" @endif/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading" id="settingSite-2" role="tab">
                                                <a class="panel-title" data-parent="#settingsSite" data-toggle="collapse" href="#settingSite-2-body">
                                                    <strong>App Settings</strong>
                                                </a>
                                            </div>
                                            <div class="panel-collapse collapse" id="settingSite-2-body" aria-labelledby="settingSite-2" role="tabpanel">
                                                <div class="panel-body">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="example-wrap">
                                                                    <h4 class="example-title">Google Map Key</h4>
                                                                    <input type="text" class="form-control" name="GOOGLE_MAP_KEY" placeholder="Enter Site Title" value="{{Setting::get('GOOGLE_MAP_KEY')}}">
                                                                </div>
                                                            </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <a href="{{ route('admin.hospital.index') }}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                            <button type="submit" class="btn btn-success waves-effect waves-light" id="validateButton3">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <!-- End Example Accordion Example -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel Collapse -->
        </div>
    </div>
@endsection

@section('style')

    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/datatables-bootstrap/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/datatables-fixedheader/dataTables.fixedHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/datatables-responsive/dataTables.responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/examples/css/tables/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/dropify/dropify.css') }}">
    <style>
        .panel-group-simple .panel{
            background: #f3f4f5;
            padding-left: 15px;
            padding-right: 15px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('scripts')

    <script src="{{ asset('assets/remark/global/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-fixedheader/dataTables.fixedHeader.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-bootstrap/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/js/components/dropify.js') }}"></script>

    <script src="{{ asset('assets/remark/global/js/components/tabs.js') }}"></script>
    <script>
        (function(document, window, $) {
            'use strict';
            var Site = window.Site;
            $(document).ready(function() {
                Site.run();
            });
        })(document, window, jQuery);

        $(document).ready(function(){
            $('#hospitals_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url:"{{ route('admin.hospital.ajaxHospitals') }}",
                    type: "POST",
                    data:{
                        "_token":"{{ csrf_token() }}"
                    }
                },
                columns: [
                    { "data": "index" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "phone" },
                    { "data": "hospital_number" },
                    { "data": "action" }
                ],
                order: [
                    [1, 'asc']
                ],
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 5 },
                ]
            });
        });
    </script>
@endsection
