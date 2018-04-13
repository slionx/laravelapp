@extends('layouts.app')
@section('content')

    <div class="site-content">
        @yield('slide')
        <div class="content-area">
            <main>
                @forelse ($post as $item)
                    <article class="article-post">
                        <header class="entry-title">
                            <h2 class="blog-post-title">
                                <a href="{{ url('/post',$item->id) }}">
                                    {{ $item->post_title }}
                                </a>
                            </h2>
                            <div class="text-muted">
                                        <span>
                                            <i class="fa fa-calendar"></i>
                                            编辑于 {{ $item->created_at }} </span>
                                <span class="blog-quote-author">
                                            <i class="fa fa-user"></i>
                                            by {{ $item->post_author }}</span>
                            </div>
                        </header>
                        <div class="clearfix"></div>
                        <div class="pull-left blog-img-thumb">

                        </div>
                        <div class="blog-post-content">
                            {{--{!!  mb_substr($item->post_content,0,1000) !!}--}}
                        </div>
                        <div class="clearfix"></div>
                        <div class=" text-muted blog-quote">
                            <a href="{{ url('/post',$item->id) }}"><div class="pull-right btn btn-success"><i class="fa fa-link"></i> 阅读全文</div></a>
                            <div class="pull-left "><i class="fa fa-folder"></i> {{ $item->category_name }}&nbsp;</div>
                            <div class="pull-left blog-comments"><i class="fa fa-comments"></i> {{ $item->comments_count }}&nbsp;</div>
                            <div class="pull-left blog-post-tags"><i class="fa fa-tags"></i> {{ $item->tag_count }} </div>
                        </div>
                    </article>
                @empty
                    <div class="center-block caption-subject font-red bold uppercase">
                        <h2>暂无文章</h2>
                    </div>
                @endforelse
            </main>


        </div>
        @include('home.post.widget-area')

        <div class="clearfix"></div>
        <div class="pagination-div">
            {!! $post->links() !!}
        </div>
    </div>
@endsection
