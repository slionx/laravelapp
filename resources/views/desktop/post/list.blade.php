@extends('desktop.layouts.app')
@section('content')

<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin clearfix">

                <!-- Posts
                ============================================= -->
                <div id="posts" class="small-thumbs">
                    @forelse ($post as $item)

                    <div class="entry clearfix">
                        <div class="entry-image">
                            <a href="http://image.3001.net/images/20180428/15248831748970.png" data-lightbox="image"><img class="image_fade" src="http://image.3001.net/images/20180428/15248831748970.png" alt="Standard Post with Image"></a>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h2><a href="{{ route('post.show',$item->id) }}">{{ $item->post_title }}</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{ $item->created_at }}</li>
                                <li><a href="#"><i class="icon-user"></i> {{ $item->user->name }}</a></li>
                                <li><a href="{{ route('post.list.category',['category',$item->category]) }}"><i class="icon-folder-open"></i> {{ $item->category->name }}</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> {{ $item->comments_count }}</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul>
                            @if($item->post_password && $item->post_author != auth()->user()->id)
                                <div class="entry-content">
                                    <h5>私密文章</h5>
                                </div>
                            @else
                                <div class="entry-content">
                                    <p>{{ $item->post_slug }}</p>
                                    <a href="{{ route('post.show',$item->id) }}"class="more-link">Read More</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @empty
                        <div class="center-block caption-subject font-red bold uppercase">
                            <h2>暂无文章</h2>
                        </div>
                    @endforelse




{{--


                    <div class="entry clearfix">
                        <div class="entry-image">
                            <iframe src="http://player.vimeo.com/video/87701971" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h2><a href="blog-single-full.html">This is a Standard post with an Embedded Video</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 16th Feb 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Videos</a>, <a href="#">News</a></li>
                                <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 19</a></li>
                                <li><a href="#"><i class="icon-film"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt soluta iste repellendus officia in neque veniam debitis placeat quo unde reprehenderit eum facilis vitae.</p>
                                <a href="blog-single-full.html"class="more-link">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-image">
                            <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div class="slide"><a href="images/blog/full/10.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/10.jpg" alt="Standard Post with Gallery"></a></div>
                                        <div class="slide"><a href="images/blog/full/20.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/20.jpg" alt="Standard Post with Gallery"></a></div>
                                        <div class="slide"><a href="images/blog/full/21.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/21.jpg" alt="Standard Post with Gallery"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h2><a href="blog-single-small.html">This is a Standard post with a Slider Gallery</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 24th Feb 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Gallery</a>, <a href="#">Media</a></li>
                                <li><a href="blog-single-small.html#comments"><i class="icon-comments"></i> 21</a></li>
                                <li><a href="#"><i class="icon-picture"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga. Maiores, sunt eveniet doloremque porro hic exercitationem distinctio sequi adipisci.</p>
                                <a href="blog-single-small.html"class="more-link">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-c">
                            <div class="entry-image">
                                <blockquote>
                                    <p>"When you are courting a nice girl an hour seems like a second. When you sit on a red-hot cinder a second seems like an hour. That's relativity."</p>
                                    <footer>Albert Einstein</footer>
                                </blockquote>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Quotes</a>, <a href="#">People</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 23</a></li>
                                <li><a href="#"><i class="icon-quote-left"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-image clearfix">
                            <div class="portfolio-single-image masonry-thumbs col-4" data-big="3" data-lightbox="gallery">
                                <a href="images/blog/full/2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/2.jpg" alt=""></a>
                                <a href="images/blog/full/3.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/3.jpg" alt=""></a>
                                <a href="images/blog/full/6-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/6-1.jpg" alt=""></a>
                                <a href="images/blog/full/6-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/6-2.jpg" alt=""></a>
                                <a href="images/blog/full/12.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/12.jpg" alt=""></a>
                                <a href="images/blog/full/12-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/12-1.jpg" alt=""></a>
                                <a href="images/blog/full/13.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/13.jpg" alt=""></a>
                                <a href="images/blog/full/18.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/18.jpg" alt=""></a>
                                <a href="images/blog/full/19.jpg" data-lightbox="gallery-item"><img class="image_fade" src="images/blog/small/19.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h2><a href="blog-single-thumbs.html">This is a Standard post with Masonry Thumbs Gallery</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 3rd Mar 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Gallery</a>, <a href="#">Media</a></li>
                                <li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 21</a></li>
                                <li><a href="#"><i class="icon-picture"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p>
                                <a href="blog-single-thumbs.html"class="more-link">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-c">
                            <div class="entry-image">
                                <a href="http://themeforest.net" class="entry-link" target="_blank">
                                    Themeforest.net
                                    <span>- http://themeforest.net</span>
                                </a>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 17th Mar 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Links</a>, <a href="#">Suggestions</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 26</a></li>
                                <li><a href="#"><i class="icon-link"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-c">
                            <div class="entry-image">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, fuga optio voluptatibus saepe tenetur aliquam debitis eos accusantium! Vitae, hic, atque aliquid repellendus accusantium laudantium minus eaque quibusdam ratione sapiente.
                                    </div>
                                </div>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 21st Mar 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Status</a>, <a href="#">News</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 11</a></li>
                                <li><a href="#"><i class="icon-align-justify2"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="entry clearfix">
                        <div class="entry-image clearfix">
                            <iframe width="100%" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/115823769&amp;auto_play=false&amp;hide_related=true&amp;visual=true"></iframe>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h2><a href="blog-single.html">This is an Embedded Audio Post</a></h2>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> 28th Apr 2014</li>
                                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                                <li><i class="icon-folder-open"></i> <a href="#">Audio</a>, <a href="#">General</a></li>
                                <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 16</a></li>
                                <li><a href="#"><i class="icon-music2"></i></a></li>
                            </ul>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga.</p>
                                <a href="blog-single.html"class="more-link">Read More</a>
                            </div>
                        </div>
                    </div>--}}

                </div><!-- #posts end -->

                <!-- Pagination
                ============================================= -->

               {{ $post->links() }}
                <!-- .pager end -->

            </div><!-- .postcontent end -->

            @include('desktop.post.sidebar')

        </div>
    </div>
    <div class="container clearfix plans-bg">
    </div>

</section><!-- #content end -->
@stop