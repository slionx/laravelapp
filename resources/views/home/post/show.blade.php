
@extends('layouts.app')

@section('content')
    <div class="site-content">
        <div class="content-area">
            <main>
                    <article class="article-post">
                        <header class="entry-title">
                            <h2 class="blog-post-title">
                                    {{ $post->post_title }}
                                {{--@can('edit.form')
                                    <a href="#">edit.form</a>
                                @endcan--}}
                            </h2>
                            <div class="text-muted">
                                        <span class="timeline">
                                            <i class="fa fa-calendar"></i>
                                            Posted on {{ $post->created_at }} </span>
                                <span class="blog-quote-author">
                                            <i class="fa fa-user"></i>
                                            by {{ $post->post_author }}</span>
                            </div>
                        </header>
                        <div class="clearfix"></div>
                        <div class="blog-post-content">
                            {!! $post->post_content !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class=" text-muted blog-quote">
                            <div class="pull-left "><i class="fa fa-folder"></i> {{ $post->post_category }}&nbsp;</div>
                            <div class="pull-left blog-comments"><i class="fa fa-comments"></i> {{ $post->comments_count }}&nbsp;</div>
                            <div class="pull-left blog-post-tags"><i class="fa fa-tags"></i> {{ $post->post_tag }} </div>
                        </div>
                    </article>
            </main>
        </div>
            @include('home.post.widget-area')
        <div class="clearfix"></div>
    </div>
@endsection
