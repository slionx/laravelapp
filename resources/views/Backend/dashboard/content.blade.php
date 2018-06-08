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
        <div class="m-portlet">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
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
                            <div class="m-widget14__chart" style="height:120px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="m_chart_daily_sales" style="display: block; width: 471px; height: 120px;" width="471" height="120" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                        <!--end:: Widgets/Daily Sales-->			</div>
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
                                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;"><g class="ct-series custom"><path d="M170.46,108.314A66.5,66.5,0,0,0,110.289,13.5" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#716aca&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="133.70704650878906px 133.70704650878906px" stroke-dashoffset="-133.70704650878906px" stroke="#716aca"><animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-133.70704650878906px" to="0px" fill="freeze" stroke="#716aca" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M59.05,122.389A66.5,66.5,0,0,0,170.559,108.104" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#00c5dc&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="133.94058227539062px 133.94058227539062px" stroke-dashoffset="-133.94058227539062px" stroke="#00c5dc"><animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-133.94058227539062px" to="0px" fill="freeze" stroke="#00c5dc" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g><g class="ct-series custom"><path d="M110.289,13.5A66.5,66.5,0,0,0,59.198,122.567" class="ct-slice-donut" ct:value="36" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#ffb822&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="150.65414428710938px 150.65414428710938px" stroke-dashoffset="-150.65414428710938px" stroke="#ffb822"><animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-150.65414428710938px" to="0px" fill="freeze" stroke="#ffb822" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate></path></g></svg></div>
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
                        <!--end:: Widgets/Profit Share-->			</div>
                    <div class="col-xl-4">
                        <!--begin:: Widgets/Revenue Change-->
                        <div class="m-widget14">
                            <div class="m-widget14__header">
                                <h3 class="m-widget14__title">
                                    Revenue Change
                                </h3>
                                <span class="m-widget14__desc">
			Revenue change breakdown by cities
		</span>
                            </div>
                            <div class="row  align-items-center">
                                <div class="col">
                                    <div id="m_chart_revenue_change" class="m-widget14__chart1" style="height: 180px"><svg height="180" version="1.1" width="221" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.25px; top: -0.28125px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#00c5dc" d="M110.539,143.33333333333334A53.333333333333336,53.333333333333336,0,0,0,163.31254471381442,82.29302765130979" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#00c5dc" stroke="#ffffff" d="M110.539,146.33333333333334A56.333333333333336,56.333333333333336,0,0,0,166.28105660396648,81.85951045669596L184.7517972538015,79.16207013465439A75,75,0,0,1,110.539,165Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f4516c" d="M163.31254471381442,82.29302765130979A53.333333333333336,53.333333333333336,0,0,0,120.95644960680708,37.693966044689645" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#f4516c" stroke="#ffffff" d="M166.28105660396648,81.85951045669596A56.333333333333336,56.333333333333336,0,0,0,121.54243114718997,34.75175163470344L125.18853850957245,16.44463975034482A75,75,0,0,1,184.7517972538015,79.16207013465439Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#716aca" d="M120.95644960680708,37.693966044689645A53.333333333333336,53.333333333333336,0,1,0,110.52224483945652,143.33333070143885" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#716aca" stroke="#ffffff" d="M121.54243114718997,34.75175163470344A56.333333333333336,56.333333333333336,0,1,0,110.52130236167595,146.33333055339477L110.51386725918478,169.99999605215828A80,80,0,1,1,126.16517441021062,11.540949067034475Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="110.539" y="80" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.2121,0,0,1.2121,-23.4444,-19.303)" stroke-width="0.825"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="6">Paris</tspan></text><text x="110.539" y="100" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.1111,0,0,1.1111,-12.2934,-10.2222)" stroke-width="0.8999999999999999"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="5">20</tspan></text></svg>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="m-widget14__legends">
                                        <div class="m-widget14__legend">
                                            <span class="m-widget14__legend-bullet m--bg-accent"></span>
                                            <span class="m-widget14__legend-text">+10% New York</span>
                                        </div>
                                        <div class="m-widget14__legend">
                                            <span class="m-widget14__legend-bullet m--bg-warning"></span>
                                            <span class="m-widget14__legend-text">-7% London</span>
                                        </div>
                                        <div class="m-widget14__legend">
                                            <span class="m-widget14__legend-bullet m--bg-brand"></span>
                                            <span class="m-widget14__legend-text">+20% California</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:: Widgets/Revenue Change-->			</div>
                </div>
            </div>
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