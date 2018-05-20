
<!-- Header
============================================= -->
<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo
            ============================================= -->
           {{-- <div id="logo">
                <a href="index.html" class="standard-logo" data-dark-logo="{{ asset('welcome/images/logo-dark.png') }}"><img src="{{ asset('welcome/images/logo.png') }}" alt="Canvas Logo"></a>
                <a href="index.html" class="retina-logo" data-dark-logo="{{ asset('welcome/images/logo@2x.png') }}"><img src="{{ asset('welcome/images/') }}" alt="Canvas Logo"></a>
            </div>--}}
            <!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="dark">

                <ul>
                    <li @if (Request::is('/')) class="current" @endif><a href="/"><div>welcole</div></a></li>
                    <li @if (Request::is('post*')) class="current" @endif ><a href="{{ route('post.list') }}"><div>post</div></a></li>
                    <li @if (Request::is('post*')) class="current" @endif ><a href="{{ route('post.list') }}"><div>归档</div></a></li>
                    <li><a href="#"><div><i class="icon-user"></i>{{ isset(auth()->user()->name) ? auth()->user()->name : 'User profile'  }} </div></a>
                        <ul>
                            @guest
                                <li ><a href="{{ url('/login') }}"><div>login</div></a></li>
                                <li ><a href="{{ url('/register') }}"><div>register</div></a></li>
                            @else
                                    @if(auth()->user()->isadmin())
                                        <li>
                                            <a href="{{ route('dashboard.index') }}"><div>
                                                    {{ trans('common.manageAdmin') }}</div>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                @endguest

                        </ul>
                    </li>
                </ul>
                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="{{ route('post.list.search',['search']) }}" method="get">
                        <input type="text" name="keyword" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->
