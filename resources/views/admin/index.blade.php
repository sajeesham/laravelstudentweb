@extends('admin.layouts.app')

@section('content')

    <div class="page animsition">
        <div class="page-content padding-30 container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-lg-4 col-sm-6">
                    <!-- Widget Linearea One-->

                       <div class="widget widget-shadow users catcards" id="widgetLineareaOne">
                                         <a href="{{ route('admin.teacher.index') }}">
                        <div class="widget-content">
                            <div class="padding-20 padding-top-10">
                                <div class="clearfix">
                                    <div class="pull-left padding-vertical-10 boxheading">
                                         Teachers
                                         <span class="rightarrow"><img src="{{ asset('assets/remark/assets/images/right_back.png') }}" style="width: 33px;"></span>

                                        </div>

                                            <div class="f1_container">
                                            <div class="f1_card shadow">
                                            <div class="front face">
                                            <p class="usericon"><i class="icon fa-hospital-o "></i></p>
                                            <p class="usercount"><?=$teachercount?>  </p>
                                            <span class="date-span"><i class="fa fa-clock-o"></i> As on {{ date('d-M-Y') }} </span>
                                            </div>
                                            <div class="back face center">
                                            <p class="usericon"><i class="icon fa-hospital-o "></i></p>
                                            <p class="usercount"><?=$teachercount?> </p>
                                            <span class="date-span"><i class="fa fa-clock-o"></i> As on {{ date('d-M-Y') }} </span>
                                            <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo</p>-->
                                            </div>
                                            </div>
                                            </div>

                                </div>


                            </div>
                        </div>
                        </a>
                    </div>

                    <!-- End Widget Linearea One -->
                </div>

                <div class="col-lg-4 col-sm-6">
                    <!-- Widget Linearea One-->

                       <div class="widget widget-shadow users catcards" id="widgetLineareaOne" style="    background: #dc3545;">
                                         <a href="{{ route('admin.student.index') }}">
                        <div class="widget-content">
                            <div class="padding-20 padding-top-10">
                                <div class="clearfix">
                                    <div class="pull-left padding-vertical-10 boxheading">
                                         Students
                                         <span class="rightarrow"><img src="{{ asset('assets/remark/assets/images/right_back.png') }}" style="width: 33px;"></span>

                                        </div>

                                            <div class="f1_container">
                                            <div class="f1_card shadow">
                                            <div class="front face">
                                            <p class="usericon"><i class="icon fa-hospital-o "></i></p>
                                            <p class="usercount"><?=$studentcount?>  </p>
                                            <span class="date-span"><i class="fa fa-clock-o"></i> As on {{ date('d-M-Y') }} </span>
                                            </div>
                                            <div class="back face center">
                                            <p class="usericon"><i class="icon fa-hospital-o "></i></p>
                                            <p class="usercount"><?=$studentcount?> </p>
                                            <span class="date-span"><i class="fa fa-clock-o"></i> As on {{ date('d-M-Y') }} </span>
                                            <!--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo</p>-->
                                            </div>
                                            </div>
                                            </div>

                                </div>


                            </div>
                        </div>
                        </a>
                    </div>

                    <!-- End Widget Linearea One -->
                </div>
                
                
                
                <div class="clearfix"></div>
                
      

            </div>
        </div>
    </div>
@endsection

@section('style')

    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/chartist-js/chartist.css') }}">
    <script src="{{ asset('assets/remark/global/vendor/raphael/raphael-min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/morris-js/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/remark/assets/examples/css/dashboard/v1.css') }}">



@endsection

@section('scripts')
    <script src="{{ asset('assets/remark/global/vendor/morris-js/morris.min.js') }}"></script>

    <script src="{{ asset('assets/remark/global/vendor/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/remark/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
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
        (function() {
            Morris.Line({
                element: 'exampleMorrisLine',
                data: [ {
                    "y": "2021 Q4",
                    "a": 260,
                    "b": 300
                }, {
                    "y": "2020 Q4",
                    "a": 20,
                    "b": 225
                }, {
                    "y": "2019 Q4",
                    "a": 295,
                    "b": 110
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Hospital ', 'Medicine'],
                resize: true,
                pointSize: 3,
                smooth: true,
                gridTextColor: '#474e54',
                gridLineColor: '#eef0f2',
                goalLineColors: '#e3e6ea',
                gridTextFamily: $.configs.get('site', 'fontFamily'),
                gridTextWeight: '300',
                numLines: 7,
                gridtextSize: 14,
                lineWidth: 1,
                lineColors: [$.colors("green", 600), $.colors("primary", 600)]
            });
        })();
        (function() {
            Morris.Donut({
                element: 'exampleMorrisDonut',
                data: [{
                    label: "Course Dropped Patients",
                    value: 2
                }, {
                    label: "Active Patients",
                    value: 48
                }, {
                    label: "Course Completed Patients",
                    value: 22
                }, ],
                // barSizeRatio: 0.35,
                resize: true,
                colors: [$.colors("red", 500), $.colors("green", 500), $.colors("primary", 400)]
            });
        })();
    </script>

@endsection


