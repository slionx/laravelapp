@extends('desktop.layouts.app')
@section('title')
{{ $post->post_title }} -
@stop
@section('content')

    <!-- Content
		============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <!-- Post Content
                        ============================================= -->
                <div class="postcontent nobottommargin overflow clearfix">
                    <div class="single-post nobottommargin">
                        <!-- Single Post
                        ============================================= -->
                        <div class="entry clearfix">
                            <!-- Entry Title
                            ============================================= -->
                            <div class="entry-title">
                                <h2>{{ $post->post_title }}</h2>
                            </div><!-- .entry-title end -->
                            <!-- Entry Meta
                            ============================================= -->
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{ $post->created_at }}</li>
                                <li><a href="#"><i class="icon-user"></i> {{ $post->user->name }}</a></li>
                                <li><a href="{{ route('post.list.category',['category',$post->post_category]) }}"><i class="icon-folder-open"></i> {{ $post->category->name }}</a></li>
                                <li><a href="#"><i class="icon-comments"></i> {{ $post->comments_count }} Comments</a></li>
                                <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                            </ul><!-- .entry-meta end -->
                            <!-- Entry Image
                            ============================================= -->
                            <div class="entry-image">
                                {{--<a href="#"><img src="images/blog/full/1.jpg" alt="Blog Single"></a>--}}
                            </div><!-- .entry-image end -->
                            <!-- Entry Content
                            ============================================= -->
                            <div class="entry-content notopmargin">
                            {!! $post->post_content !!}
                            <!-- Tag Cloud
                                ============================================= -->
                                @if(count($post->tag))
                                    <div class="tagcloud clearfix bottommargin">
                                        @foreach ($post->tag as $tag)
                                            <a href="{{ route('post.list.tag',['tag',$tag->id]) }}">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                    @endif
                                <!-- .tagcloud end -->

                                <div class="clear"></div>

                                <!-- Post Single - Share
                                ============================================= -->
                                <div class="si-share noborder clearfix">
                                    <span>分享这篇文章:</span>
                                    <div>
                                        <a href="#" class="social-icon si-borderless si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus">
                                            <i class="icon-gplus"></i>
                                            <i class="icon-gplus"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-email3">
                                            <i class="icon-email3"></i>
                                            <i class="icon-email3"></i>
                                        </a>
                                    </div>
                                </div><!-- Post Single - Share End -->

                            </div>

                        </div><!-- .entry end -->
                        <!-- Post Navigation
                        ============================================= -->
                        <div class="post-navigation clearfix">
                            <div class="col_half nobottommargin">
                                @if($prev_post)
                                    <a href="{{ route('post.show',$prev_post->id) }}">&lArr; {{ $prev_post->post_title }}</a>
                                    @else
                                    &lArr;没有上一篇文章了
                                    @endif
                            </div>
                            <div class="col_half col_last tright nobottommargin">
                                @if($next_post)
                                    <a href="{{ route('post.show',$next_post->id) }}">{{ $next_post->post_title }} &rArr;</a>
                                    @else
                                    本篇已是最新文章&rArr;
                                @endif
                            </div>
                        </div><!-- .post-navigation end -->
                        {{--@include('desktop.post.related_posts')--}}
                        {{--@include('desktop.post.comments')--}}

                    </div><!-- .postcontent end -->
                </div>


                @include('desktop.post.sidebar')
            </div>
        </div>

        <div class=" plans-bg clearfix">
        </div>
    </section><!-- #content end -->
@stop