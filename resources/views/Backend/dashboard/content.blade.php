@extends('Backend.layouts.app')
@section('Web_font')
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    {{--    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700" media="all">--}}
@endsection
@section('css')
    <!--begin::Page Vendors -->
    <link href="{{ asset('Backend/css/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css">
    <!--end::Page Vendors -->
@endsection
@section('header_script')
    {{--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>--}}

    {{--    <script charset="utf-8" src="chrome-extension://jgphnjokjhjlcnnajmfjlacjnjkhleah/js/btype.js"></script>--}}
@endsection
@section('content')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">Dashboard</h3>
            </div>
            <div>
  							<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					<span class="m-subheader__daterange-label">
						<span class="m-subheader__daterange-title">Today:</span>
						<span class="m-subheader__daterange-date m--font-brand">May 24</span>
					</span>
					<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
						<i class="la la-angle-down"></i>
					</a>
				</span>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--Begin::Section-->
        <div class="row">

            <div class="col-xl-4">
                <!--begin:: Widgets/Last Updates-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Environment 环境
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin::widget 12-->
                        <div class="m-widget4">
                            @foreach($envs as $env)
                                <div class="m-widget4__item">
                                    <div class="m-widget4__ext">
					<span class="m-widget4__icon m--font-brand">
						<i class="flaticon-interface-3"></i>
					</span>
                                    </div>
                                    <div class="m-widget4__info" style="width: 0%">
					<span class="m-widget4__text">
					{{ $env['name'] }}
					</span>
                                    </div>
                                    <div class="m-widget4__ext">
					<span class="m-widget4__number m--font-info">
					{{ $env['value'] }}
					</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end::Widget 12-->
                    </div>
                </div>
                <!--end:: Widgets/Last Updates-->  </div>
            {{--            <div class="col-xl-4">
                            <!--begin:: Widgets/Last Updates-->
                            <div class="m-portlet m-portlet--full-height ">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                Environment 环境
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <!--begin::widget 12-->
                                    <div class="m-widget4">
                                        <div class="m-widget4__item">
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                    <i class="flaticon-interface-3"></i>
                                </span>
                                            </div>
                                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Make Metronic Great Again
                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__number m--font-info">
                                +500
                                </span>
                                            </div>
                                        </div>
                                        <div class="m-widget4__item">
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                <i class="flaticon-folder-4"></i>
                                </span>
                                            </div>
                                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Green Maker Team
                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__number m--font-info">
                                -64
                                </span>
                                            </div>
                                        </div>
                                        <div class="m-widget4__item">
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                <i class="flaticon-line-graph"></i>
                                </span>
                                            </div>
                                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Make Apex Great Again
                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__number m--font-info">
                                +1080
                                </span>
                                            </div>
                                        </div>
                                        <div class="m-widget4__item">
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                <i class="flaticon-diagram"></i>
                                </span>
                                            </div>
                                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                A Programming Language
                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__number m--font-info">
                                +19
                                </span>
                                            </div>
                                        </div>
                                        <div class="m-widget4__item m-widget4__item-border">
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                <i class="flaticon-music"></i>
                                </span>
                                            </div>
                                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Red Painted Truck
                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__number m--font-info">
                                +134
                                </span>
                                            </div>
                                        </div>
                                        <div class="m-widget4__item m-widget4__item-border">
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__icon m--font-brand">
                                <i class="flaticon-user"></i>
                                </span>
                                            </div>
                                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                New Customer
                                </span>
                                            </div>
                                            <div class="m-widget4__ext">
                                <span class="m-widget4__number m--font-info">
                                +13%
                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Widget 12-->
                                </div>
                            </div>
                            <!--end:: Widgets/Last Updates-->  </div>--}}


        </div>
        <!--End::Section-->
    </div>
@endsection
@section('footer_script')
    <!--begin::Page Vendors -->
    <script src="{{ asset('Backend/js/fullcalendar.bundle.js') }}" type="text/javascript"></script>
    <!--end::Page Vendors -->


    <!--begin::Page Snippets -->
    <script src="{{ asset('Backend/js/dashboard.js') }}" type="text/javascript"></script>
    <!--end::Page Snippets -->
@endsection