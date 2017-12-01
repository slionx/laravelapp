
@extends('layouts.app')

@section('content')
{{--    <div class="container">
        <div class="row">
            <div class="col-md-1 pull-left">
                <div class="panel panel-default">
                    left
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
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
    </div>--}}

    <div class="site-content">
        <div class="content-area">
            <main>
                    <article class="article-post">
                        <header class="entry-title">
                            <h2 class="blog-post-title">
                                    {{ $post->post_title }}
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
        <div class="widget-area">
            <aside id="" class="widget">
                <h1 class="widget-title">近期文章</h1>		<ul>
                    <li>
                        <a href="http://s.me/?p=646">CVE-2017-8464: 快捷方式远程代码执行漏洞</a>
                    </li>
                    <li>
                        <a href="http://s.me/?p=644">浅谈Session机制及CSRF攻防</a>
                    </li>
                    <li>
                        <a href="http://s.me/?p=642">Windows提权系列中篇</a>
                    </li>
                    <li>
                        <a href="http://s.me/?p=639">phpcms漏洞</a>
                    </li>
                    <li>
                        <a href="http://s.me/?p=637">浅谈跨站脚本攻击与防御</a>
                    </li>
                </ul>
                <div class="widget-bottom">
                    <div class="l"></div>
                    <div class="r"></div>
                </div>
            </aside>
            <aside id="" class="widget"><h1 class="widget-title">文章归档</h1>
                <ul>
                    <li><a href="http://s.me/?m=201708">2017年八月</a>&nbsp;(27)</li>
                    <li><a href="http://s.me/?m=201707">2017年七月</a>&nbsp;(1)</li>
                    <li><a href="http://s.me/?m=201706">2017年六月</a>&nbsp;(7)</li>
                    <li><a href="http://s.me/?m=201705">2017年五月</a>&nbsp;(2)</li>
                    <li><a href="http://s.me/?m=201704">2017年四月</a>&nbsp;(5)</li>
                    <li><a href="http://s.me/?m=201703">2017年三月</a>&nbsp;(6)</li>
                </ul>
                <div class="widget-bottom">
                    <div class="l"></div>
                    <div class="r"></div>
                </div>
            </aside>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
