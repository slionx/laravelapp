
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 pull-left">
                <div class="panel panel-default">
                    left
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    {{--<div class="panel-heading lead">{{ $post->post_title }}</div>
--}}
                    <div class="panel-body ">
                        <article>
                            <header class="page-header">
                                <h2 class="blog-post-title">
                                    <a>
                                        {{ $post->post_title }}
                                    </a>
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
                            <div class="pull-left blog-img-thumb hidden-md">
                                <img width="256" height="128" src="http://static.laravelacademy.org/wp-content/uploads/2017/11/15111690554957-256x128.png" class="img-rounded wp-post-image" alt="">
                            </div>
                            <div class="blog-post-desc">
                                {!! $post->post_content !!}
                            </div>

                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pull-right">
                <div class="panel panel-default">
                    right
                </div>
            </div>





        </div>
    </div>
@endsection
