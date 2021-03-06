<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8">

    <title>Slionx</title>
    <meta name="description" content="Latest updates and statistic charts">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}"/>


    <!--begin::Web font -->
    @yield('Web_font')

    <script src="{{ asset('Backend/js/jquery.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->

    <!--begin::Base Styles -->

    @yield('css')


    <link href="{{ asset('Backend/css/vendors.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css">
    <!--end::Base Styles -->

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-37564768-1', 'auto');
        ga('send', 'pageview');

    </script>
    @yield('header_script')

</head>
<!-- end::Head -->


<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" style="">


<!-- begin::Page loader -->
<div class="m-page-loader m-page-loader--base">
    <div class="m-spinner m-spinner--brand"></div>
</div>

<!-- end::Page Loader -->
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

@include('Backend.layouts.header')
<!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        @include('Backend.layouts.left_aside')

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            @yield('content')
        </div>


    </div>
    <!-- end:: Body -->


    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					2017 © Metronic theme by <a href="https://keenthemes.com" class="m-link">Keenthemes</a>
				</span>
                </div>
                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">About</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">Privacy</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">T&amp;C</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="#" class="m-nav__link">
                                <span class="m-nav__link-text">Purchase</span>
                            </a>
                        </li>
                        <li class="m-nav__item m-nav__item">
                            <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="" data-placement="left" data-original-title="Support Center">
                                <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- end::Footer -->
</div>
<!-- end:: Page -->


@include('Backend.layouts.quick_sidebar')



@yield('footer_script')
<!--begin::Base Scripts -->
<script src="{{ asset('Backend/js/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('Backend/js/scripts.bundle.js') }}" type="text/javascript"></script>
<!--end::Base Scripts -->
<script src="{{ asset('Backend/js/notify.js') }}"></script>
<script type="text/javascript">
    function UpdateSet(name) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        var status = "off";
        if ($("input[name=" + name + "]").prop("checked") == true) {
            status = "on";
        }

        $.ajax({
            type: "POST",
            url: "settings",
            async: false,
            dataType: "json",
            data: "name="+ name +"&status=" + status,
            success: function (data) {
                var notify_type;
                var message;
                if(data.status == true){
                    notify_type = 1;
                }else{
                    notify_type = 0;
                }
                if(data.result == "on"){
                    message = "已开启";
                }else {
                    message = "已关闭";
                }
                show_notify(notify_type,message,notify_type);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                show_notify(0,'Ajax调用错误，请刷新后重试,错误: '+errorThrown,0);
            },
            complete: function () {

            },
        });

    }

    //begin notifications
    var global_notifications_total = 0;
    function ajax_load_notifications_data(callback){
        var data = []
        data.total = 0
        data.notifications = []
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
        //var limit = 5;
        $.get('/notifications',{async:false}) .then((response) => {

            data.total = response.total
            data.notifications = response.notifications.map(({ id, data, created }) => {
                return {
                    id: id,
                    text: data.text,
                    badge: data.badge,
                    action_url: data.action_url,
                    created: created
                }
            })
            callback(data);
        })
    }

    ajax_load_notifications_data(function(rs){
        global_notifications_total = rs.total;
        $(".m-dropdown__header-title").html(rs.total + " new")
        if(rs.total > 0){
            $("#m-nav__link-badge").addClass("m-badge m-badge--dot m-badge--dot-small m-badge--danger m-animate-blink");
            $("#m-nav__link-icon").addClass("m-animate-shake");

            var html ='';
            rs.notifications.map(function(element){
                html += '<div class="m-list-timeline__item" id="'+ element.id +'">'
                html += '<span class="m-list-timeline__badge"></span>'
                html += '<span class="m-list-timeline__text">' + element.text
                if(element.badge){
                    html +='<span class="m-badge m-badge--' + element.badge + ' m-badge--wide">' + element.badge + '</span>'
                }
                if(element.action_url){
                    html +='<a href="' + element.action_url + '" class="m-link">Check</a>'
                }
                html += '</span>'
                html += '<span class="m-list-timeline__time">'+ element.created +'</span>'
                html += '<span class="m-list-timeline__icon">'
                html += "<a class=\"close\" data-close=\"alert\" onclick=\"event.preventDefault();makeAsRead('" + element.id + "');\" aria-label=\"Close\">x"
                html += '</a>\n'
                html += '</span>'
                html += '</div>'
            })
            $('#m-list-timeline__items').append(html);
        }else {
            html += '<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">'
            html += '<div class="m-stack__item m-stack__item--center m-stack__item--middle">'
            html += '<span class="">All caught up!<br>No new logs.</span>'
            html += '</div>'
            html += '</div>'
            $('#topbar_notifications_events').html(html);
        }

    });

    function  makeAsRead( id ){
        var code = 0;
        $.post("/notifications/" + id + "/read",function(result){
            if(result.status === true){
                code = 1;
                $("#"+id).remove();
                global_notifications_total = global_notifications_total-1;
                $(".m-dropdown__header-title").html(global_notifications_total + " new")
            }
            show_notify(code,result.result,code);
        });
    }

    function markAllRead() {
        var url = "/notifications/mark-all-read";
        var code = 0;
        $.post(url,function(result){
            if(result.status == true){
                global_notifications_total = 0;
                code = 1;
                $(".m-dropdown__header-title").html("0 new")
                $("#m-nav__link-badge").removeClass("m-badge m-badge--dot m-badge--dot-small m-badge--danger m-animate-blink");
                $("#m-nav__link-icon").removeClass("m-animate-shake");

                $('#topbar_notifications_events').html("");
                var html ='';
                html += '<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">'
                html += '<div class="m-stack__item m-stack__item--center m-stack__item--middle">'
                html += '<span class="">All caught up!<br>No new logs.</span>'
                html += '</div>'
                html += '</div>'
                $('#topbar_notifications_events').append(html);
            }
            show_notify(code,result.result,code);
        });
    }

    //end notifications
</script>
<!-- begin::Page Loader -->
<script>
    $(window).on('load', function () {
        $('body').removeClass('m-page--loading');
    });
</script>
<!-- end::Page Loader -->

<!-- end::Body -->
<div class="daterangepicker dropdown-menu ltr opensleft">
    <div class="calendar left">
        <div class="daterangepicker_input">
            <input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
            <div class="calendar-time" style="display: none;">
                <div></div>
                <i class="fa fa-clock-o glyphicon glyphicon-time"></i></div>
        </div>
        <div class="calendar-table"></div>
    </div>
    <div class="calendar right">
        <div class="daterangepicker_input">
            <input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
            <div class="calendar-time" style="display: none;">
                <div></div>
                <i class="fa fa-clock-o glyphicon glyphicon-time"></i></div>
        </div>
        <div class="calendar-table"></div>
    </div>
    <div class="ranges">
        <ul>
            <li data-range-key="Today">Today</li>
            <li data-range-key="Yesterday">Yesterday</li>
            <li data-range-key="Last 7 Days">Last 7 Days</li>
            <li data-range-key="Last 30 Days">Last 30 Days</li>
            <li data-range-key="This Month">This Month</li>
            <li data-range-key="Last Month">Last Month</li>
            <li data-range-key="Custom Range">Custom Range</li>
        </ul>
        <div class="range_inputs">
            <button class="applyBtn btn btn-sm btn-success" disabled="disabled" type="button">Apply</button>
            <button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
        </div>
    </div>
</div>

{{--<script src="{{ asset('Backend/js/socket.io.js') }}"></script>
<script>

    var socket = io("http://l.cn:6001");
    socket.on('connection', function(socket){
        console.log('socket.io client a user connected'+socket);
    });
    socket.on('private-user-channel-2:App\\Events\\SendNotification', function(response){
        console.log(response);
        console.log(response.message.text);

        if(response.message.text){
            if(global_notifications_total === 0 ){
                $("#m-nav__link-badge").addClass("m-badge m-badge--dot m-badge--dot-small m-badge--danger m-animate-blink");
                $("#m-nav__link-icon").addClass("m-animate-shake");

                $("#topbar_notifications_events").html('');
                var header = '';
                header += '<div class="m-scrollable m-scroller ps" data-scrollable="true" data-height="250" data-mobile-height="200" style="height: 250px; overflow: hidden;">'
                header += '<div class="m-list-timeline m-list-timeline--skin-light">'
                header += '<div class="m-list-timeline__items" id="m-list-timeline__items"></div></div></div>';
                $("#topbar_notifications_events").html(header);
            }
            global_notifications_total = global_notifications_total+1;
            $(".m-dropdown__header-title").html(global_notifications_total + " new")





            var html = '';
            html += '<div class="m-list-timeline__item" id="">'
            html += '<span class="m-list-timeline__badge"></span>'
            html += '<span class="m-list-timeline__text">' + response.message.text
            if(response.message.badge){
                html +='<span class="m-badge m-badge--' + response.message.badge + ' m-badge--wide">' + response.message.badge + '</span>'
            }
            if(response.message.action_url){
                html +='<a href="' + response.message.action_url + '" class="m-link">Check</a>'
            }
            html += '</span>'
            html += '<span class="m-list-timeline__time">'+ 11 +'</span>'
            html += '<span class="m-list-timeline__icon">'
            html += "<a class=\"close\" data-close=\"alert\" onclick=\"event.preventDefault();\" aria-label=\"Close\">x"
            html += '</a>\n'
            html += '</span>'
            html += '</div>'


            $('#m-list-timeline__items').append(html);

        }

    });
    /*    setTimeout(function () {
            socket.on('disconnect', function(socket){
                console.log('socket.io client disconnect'+socket);
            });
        },10000);*/
</script>--}}

</body>
</html>