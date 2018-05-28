@extends('Backend.layouts.app')
@section('Web_font')
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700" media="all">
@endsection
@section('css')
    <!--begin::Page Vendors -->
    <link href="http://keenthemes.com/metronic/preview/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css">
    <!--end::Page Vendors -->
    <style type="text/css">
        span.im-caret {
            -webkit-animation: 1s blink step-end infinite;
            animation: 1s blink step-end infinite;
        }

        @keyframes blink {
            from, to {
                border-right-color: black;
            }
            50% {
                border-right-color: transparent;
            }
        }

        @-webkit-keyframes blink {
            from, to {
                border-right-color: black;
            }
            50% {
                border-right-color: transparent;
            }
        }

        span.im-static {
            color: grey;
        }

        div.im-colormask {
            display: inline-block;
            border-style: inset;
            border-width: 2px;
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        div.im-colormask > input {
            position: absolute;
            display: inline-block;
            background-color: transparent;
            color: transparent;
            -webkit-appearance: caret;
            -moz-appearance: caret;
            appearance: caret;
            border-style: none;
            left: 0; /*calculated*/
        }

        div.im-colormask > input:focus {
            outline: none;
        }

        div.im-colormask > input::-moz-selection {
            background: none;
        }

        div.im-colormask > input::selection {
            background: none;
        }

        div.im-colormask > input::-moz-selection {
            background: none;
        }

        div.im-colormask > div {
            color: black;
            display: inline-block;
            width: 100px; /*calculated*/
        }</style>
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }</style>
@endsection
@section('header_script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script charset="utf-8" src="chrome-extension://jgphnjokjhjlcnnajmfjlacjnjkhleah/js/btype.js"></script>
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
            <!--begin:: Widgets/Top Products-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Trends
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                    All
                                </a>
                                <div class="m-dropdown__wrapper" style="z-index: 101;">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 37.5px;"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Activity</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">Support</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Widget5-->
                    <div class="m-widget4">
                        <div class="m-widget4__chart m-portlet-fit--sides m--margin-top-10 m--margin-top-20" style="height:260px;">
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="m_chart_trends_stats" width="404" height="260" class="chartjs-render-monitor" style="display: block; width: 404px; height: 260px;"></canvas>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo3.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					Phyton
					</span><br>
                                <span class="m-widget4__sub">
					A Programming Language
					</span>
                            </div>
                            <span class="m-widget4__ext">
					<span class="m-widget4__number m--font-danger">+$17</span>
				</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo1.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					FlyThemes
					</span><br>
                                <span class="m-widget4__sub">
					A Let's Fly Fast Again Language
					</span>
                            </div>
                            <span class="m-widget4__ext">
					<span class="m-widget4__number m--font-danger">+$300</span>
				</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo2.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					AirApp
					</span><br>
                                <span class="m-widget4__sub">
					Awesome App For Project Management
					</span>
                            </div>
                            <span class="m-widget4__ext">
					<span class="m-widget4__number m--font-danger">+$6700</span>
				</span>
                        </div>
                    </div>
                    <!--end::Widget 5-->
                </div>
            </div>
            <!--end:: Widgets/Top Products-->    </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Activity-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text m--font-light">
                                Activity
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                                    <i class="fa fa-genderless m--font-light"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
                                                        <span class="m-nav__section-text">Quick Actions</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Activity</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">Support</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget17">
                        <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                            <div class="m-widget17__chart" style="height:320px;">
                                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="m_chart_activities" width="403" height="208" class="chartjs-render-monitor" style="display: block; width: 403px; height: 208px;"></canvas>
                            </div>
                        </div>
                        <div class="m-widget17__stats">
                            <div class="m-widget17__items m-widget17__items-col1">
                                <div class="m-widget17__item">
						<span class="m-widget17__icon">
							<i class="flaticon-truck m--font-brand"></i>
						</span>
                                    <span class="m-widget17__subtitle">
							Delivered
						</span>
                                    <span class="m-widget17__desc">
							15 New Paskages
						</span>
                                </div>
                                <div class="m-widget17__item">
						<span class="m-widget17__icon">
							<i class="flaticon-paper-plane m--font-info"></i>
						</span>
                                    <span class="m-widget17__subtitle">
							Reporeted
						</span>
                                    <span class="m-widget17__desc">
							72 Support Cases
						</span>
                                </div>
                            </div>
                            <div class="m-widget17__items m-widget17__items-col2">
                                <div class="m-widget17__item">
						<span class="m-widget17__icon">
							<i class="flaticon-pie-chart m--font-success"></i>
						</span>
                                    <span class="m-widget17__subtitle">
							Ordered
						</span>
                                    <span class="m-widget17__desc">
							72 New Items
						</span>
                                </div>
                                <div class="m-widget17__item">
						<span class="m-widget17__icon">
							<i class="flaticon-time m--font-danger"></i>
						</span>
                                    <span class="m-widget17__subtitle">
							Arrived
						</span>
                                    <span class="m-widget17__desc">
							34 Upgraded Boxes
						</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Activity-->
        </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">Blog</button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="../Backend/images/blog1.jpg" alt="">
                            <h3 class="m-widget19__title m--font-light">
                                Introducing New Feature
                            </h3>
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__user-img">
                                    <img class="m-widget19__img" src="../Backend/images/user1.jpg" alt="">
                                </div>
                                <div class="m-widget19__info">
						<span class="m-widget19__username">
						Anna Krox
						</span><br>
                                    <span class="m-widget19__time">
						UX/UI Designer, Google
						</span>
                                </div>
                                <div class="m-widget19__stats">
						<span class="m-widget19__number m--font-brand">
						18
						</span>
                                    <span class="m-widget19__comment">
						Comments
						</span>
                                </div>
                            </div>
                            <div class="m-widget19__body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                scrambled it to make text of the printing and typesetting industry scrambled
                                a type specimen book text of the dummy text of the printing printing and
                                typesetting industry scrambled dummy text of the printing.
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Blog-->    </div>
    </div>
    <!--End::Section-->

    <!--Begin::Section-->
    <div class="m-portlet">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-xl-4">
                    <!--begin:: Widgets/Stats2-1 -->
                    <div class="m-widget1">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Member Profit</h3>
                                    <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-brand">+$17,800</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Orders</h3>
                                    <span class="m-widget1__desc">Weekly Customer Orders</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-danger">+1,800</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Issue Reports</h3>
                                    <span class="m-widget1__desc">System bugs and issues</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-success">-27,49%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Stats2-1 -->            </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Daily Sales-->
                    <div class="m-widget14">
                        <div class="m-widget14__header m--margin-bottom-30">
                            <h3 class="m-widget14__title">
                                Daily Sales
                            </h3>
                            <span class="m-widget14__desc">
		Check out each collumn for more details
		</span>
                        </div>
                        <div class="m-widget14__chart" style="height:120px;">
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="m_chart_daily_sales" width="361" height="120" class="chartjs-render-monitor" style="display: block; width: 361px; height: 120px;"></canvas>
                        </div>
                    </div>
                    <!--end:: Widgets/Daily Sales-->            </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Profit Share-->
                    <div class="m-widget14">
                        <div class="m-widget14__header">
                            <h3 class="m-widget14__title">
                                Profit Share
                            </h3>
                            <span class="m-widget14__desc">
		Profit Share between customers
		</span>
                        </div>
                        <div class="row  align-items-center">
                            <div class="col">
                                <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                                    <div class="m-widget14__stat">45</div>
                                    <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;">
                                        <g class="ct-series custom">
                                            <path d="M143.101,108.314A66.5,66.5,0,0,0,82.93,13.5" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#716aca&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="133.70704650878906px 133.70704650878906px" stroke-dashoffset="-133.70704650878906px" stroke="#716aca">
                                                <animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-133.70704650878906px" to="0px" fill="freeze" stroke="#716aca" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
                                            </path>
                                        </g>
                                        <g class="ct-series custom">
                                            <path d="M31.691,122.389A66.5,66.5,0,0,0,143.199,108.104" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#00c5dc&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="133.938720703125px 133.938720703125px" stroke-dashoffset="-133.938720703125px" stroke="#00c5dc">
                                                <animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-133.938720703125px" to="0px" fill="freeze" stroke="#00c5dc" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
                                            </path>
                                        </g>
                                        <g class="ct-series custom">
                                            <path d="M82.93,13.5A66.5,66.5,0,0,0,31.839,122.567" class="ct-slice-donut" ct:value="36" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#ffb822&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="150.6540985107422px 150.6540985107422px" stroke-dashoffset="-150.6540985107422px" stroke="#ffb822">
                                                <animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-150.6540985107422px" to="0px" fill="freeze" stroke="#ffb822" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="col">
                                <div class="m-widget14__legends">
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                        <span class="m-widget14__legend-text">37% Sport Tickets</span>
                                    </div>
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                        <span class="m-widget14__legend-text">47% Business Events</span>
                                    </div>
                                    <div class="m-widget14__legend">
                                        <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                        <span class="m-widget14__legend-text">19% Others</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Profit Share-->            </div>
            </div>
        </div>
    </div>
    <!--End::Section-->


    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-8">
            <!--begin:: Widgets/Best Sellers-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Best Sellers
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
                                    Last Month
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
                                    last Year
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content" role="tab">
                                    All time
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Content-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-label">
								author:
								</span>
                                            <span class="m-widget5__info-author-name">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1046</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product10.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">24,583</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">3809</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product11.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">10,054</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1103</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product11.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">24,583</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">3809</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1046</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product10.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">10,054</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1103</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product10.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">10.054</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1103</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product11.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">24,583</span><br>
                                        <span class="m-widget5__sales">sales</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">3809</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="../Backend/images/product6.jpg" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
							Make Metronic Great  Again.Lorem Ipsum Amet
							</span>
                                        <div class="m-widget5__info">
								<span class="m-widget5__author">
								Author:
								</span>
                                            <span class="m-widget5__info-author m--font-info">
								Fly themes
								</span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales">1046</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1046</span><br>
                                        <span class="m-widget5__votes">votes</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
            <!--end:: Widgets/Best Sellers-->  </div>
        <div class="col-xl-4">
            <!--begin:: Widgets/Authors Profit-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Authors Profit
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                    All
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
                                                        <span class="m-nav__section-text">Quick Actions</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">Activity</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">FAQ</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">Support</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="m-portlet__body">
                    <div class="m-widget4">
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo5.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					Trump Themes
					</span><br>
                                <span class="m-widget4__sub">
					Make Metronic Great Again
					</span>
                            </div>
                            <span class="m-widget4__ext">
					<span class="m-widget4__number m--font-brand">+$2500</span>
				</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo4.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					StarBucks
					</span><br>
                                <span class="m-widget4__sub">
					Good Coffee &amp; Snacks
					</span>
                            </div>
                            <span class="m-widget4__ext">
				    <span class="m-widget4__number m--font-brand">-$290</span>
				</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo3.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					Phyton
					</span><br>
                                <span class="m-widget4__sub">
					A Programming Language
					</span>
                            </div>
                            <span class="m-widget4__ext">
					<span class="m-widget4__number m--font-brand">+$17</span>
				</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo2.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					GreenMakers
					</span><br>
                                <span class="m-widget4__sub">
					Make Green Great Again
					</span>
                            </div>
                            <span class="m-widget4__ext">
				    <span class="m-widget4__number m--font-brand">-$2.50</span>
				</span>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--logo">
                                <img src="../Backend/images/logo1.png" alt="">
                            </div>
                            <div class="m-widget4__info">
					<span class="m-widget4__title">
					FlyThemes
					</span><br>
                                <span class="m-widget4__sub">
					A Let's Fly Fast Again Language
					</span>
                            </div>
                            <span class="m-widget4__ext">
				    <span class="m-widget4__number m--font-brand">+$200</span>
				</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end:: Widgets/Authors Profit-->  </div>
    </div>
    <!--End::Section-->

</div>
@endsection
@section('footer_script')
    <!--begin::Page Vendors -->
    <script src="http://keenthemes.com/metronic/preview/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->


    <!--begin::Page Snippets -->
    <script src="http://keenthemes.com/metronic/preview/assets/app/js/dashboard.js" type="text/javascript"></script>
    <!--end::Page Snippets -->
@endsection