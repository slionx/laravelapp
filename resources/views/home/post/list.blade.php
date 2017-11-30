@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading lead"></div>

                    <div class="panel-body ">
                        @foreach ($post as $item)
                            <article>
                                <header class="page-header">
                                    <h2 class="blog-post-title">
                                        <a>
                                            {{ $item->post_title }}
                                        </a>
                                    </h2>
                                    <div class="text-muted">
                                        <span class="timeline">
                                            <i class="fa fa-calendar"></i>
                                            Posted on {{ $item->created_at }} </span>
                                        <span class="blog-quote-author">
                                            <i class="fa fa-user"></i>
                                            by {{ $item->post_author }}</span>
                                    </div>
                                </header>
                                <div class="clearfix"></div>
                                <div class="pull-left blog-img-thumb">
                                    <img width="256" height="128" src="https://assets.servedby-buysellads.com/p/manage/asset/id/28536">
                                </div>

                                <div class="blog-post-content">
                                    {!! $item->post_content !!}
                                </div>
                                <div class="clearfix"></div>
                                <div class=" text-muted blog-quote">
                                    <div class="pull-right btn btn-success"><a href="{{ url('/post',$item->id) }}"><i class="fa fa-link"></i>阅读全文</a></div>
                                    <div class="pull-left "><i class="fa fa-folder"></i> {{ $item->post_category }}&nbsp;</div>
                                    <div class="pull-left blog-comments"><i class="fa fa-comments"></i> {{ $item->comments_count }}&nbsp;</div>
                                    <div class="pull-left blog-post-tags"><i class="fa fa-tags"></i> {{ $item->post_tag }} </div>
                                </div>
                            </article>
                        @endforeach

                    </div>
                    <div class="wp-content-pager">
                        <div class="wp-pagenavi center-block">
                            {!! $post->links() !!}
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
