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
                                <li><i class="icon-calendar3"></i> {{ $item->created_at->diffForHumans() }}</li>
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