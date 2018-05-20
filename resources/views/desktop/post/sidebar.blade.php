<!-- Sidebar
            ============================================= -->
<div class="sidebar nobottommargin col_last clearfix">
    <div class="sidebar-widgets-wrap">

        <div class="widget clearfix">

            <h4>Portfolio Carousel</h4>
            <div id="oc-portfolio-sidebar" class="owl-carousel carousel-widget" data-items="1" data-margin="10"
                 data-loop="true" data-nav="false" data-autoplay="5000">

                <div class="oc-item">
                    <div class="iportfolio">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="http://image.3001.net/images/20171018/15083107666673.png" alt="Mac Sunglasses">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="http://vimeo.com/89396394" class="center-icon" data-lightbox="iframe"><i
                                            class="icon-line-play"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc center nobottompadding">
                            <h3><a href="portfolio-single-video.html">RSA 2018 | 网络安全没有银弹，最好的应对方式是抓住当下、脚踏实地</a></h3>
                            <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
                        </div>
                    </div>
                </div>

                <div class="oc-item">
                    <div class="iportfolio">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="http://image.3001.net/images/20170920/15059049228661.png" alt="Open Imagination">
                            </a>
                            <div class="portfolio-overlay">
                                <a href="http://image.3001.net/images/20170920/15059049228661.png" class="center-icon" data-lightbox="image"><i
                                            class="icon-line-plus"></i></a>
                            </div>
                        </div>
                        <div class="portfolio-desc center nobottompadding">
                            <h3><a href="portfolio-single.html">HITB 2018 | 黑客利器HackCUBE全球首秀，360鲲鹏安全团队采访实录</a></h3>
                            <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="widget clearfix">

            <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                <ul class="tab-nav clearfix">
                    <li><a href="#tabs-1">热门推荐</a></li>
                    <li><a href="#tabs-2">热门浏览</a></li>
                    <li><a href="#tabs-3"><i class="icon-comments-alt norightmargin"></i></a></li>
                </ul>

                <div class="tab-container">

                    <div class="tab-content clearfix" id="tabs-1">
                        <div id="popular-post-list-sidebar">

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img class="img-circle" src="images/magazine/small/3.jpg"
                                                                  alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li><i class="icon-comments-alt"></i> 35 Comments</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img class="img-circle" src="images/magazine/small/2.jpg"
                                                                  alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li><i class="icon-comments-alt"></i> 24 Comments</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img class="img-circle" src="images/magazine/small/1.jpg"
                                                                  alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li><i class="icon-comments-alt"></i> 19 Comments</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-content clearfix" id="tabs-2">
                        <div id="recent-post-list-sidebar">
                            @forelse($hot as $item)
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#" class="nobg"><img class="img-circle" src="images/magazine/small/2.jpg" alt=""></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{ route('post.show',$item->id) }}">{{ $item->post_title }}</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li><i class="icon-comments-alt"></i> {{ $item->followers_count }} 次浏览</li>
                                        </ul>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="tab-content clearfix" id="tabs-3">
                        <div id="recent-post-list-sidebar">
                            @forelse($reply as $item)
                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img class="img-circle" src="images/icons/avatar.jpg" alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="{{ route('post.show',$item->post->id) }}">{{ $item->post->post_title }}</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li><strong><i class="icon-comments-alt"></i> {{ $item->count }} 条回复</strong></li>
                                    </ul>
                                    {{--Mary Jane: {{ $item->post->post_title }}--}}
                                </div>
                            </div>
                            @empty
                            @endforelse

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="widget clearfix">
            <h4>分类</h4>
            <ul class="nav nav-pills nav-stacked">
                @forelse ($categories as $category)
                    <li>
                        <a href="{{ route('post.list.category',['category',$category->id]) }}">
                            <span class="badge pull-right">{{ $category->count }}</span>
                            {{ $category->name }}
                        </a>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
        <div class="widget clearfix">
            <h4>标签云</h4>
            <div class="tagcloud">
                @forelse ($tags as $tag)
                    <a href="{{ route('post.list.tag',['tag',$tag->id]) }}">{{ $tag->name }} <span
                                class="badge"> {{ $tag->count }} </span></a>
                @empty
                @endforelse
            </div>
        </div>

    </div>

</div><!-- .sidebar end -->