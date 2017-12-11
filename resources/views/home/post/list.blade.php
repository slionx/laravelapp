@extends('layouts.app')

@section('content')

    <div class="site-content">
        <div class="content-area">
            <main>
                @foreach ($post as $item)
                    <article class="article-post">
                        <header class="entry-title">
                            <h2 class="blog-post-title">
                                <a href="{{ url('/post',$item->id) }}">
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

                        </div>
                        <div class="blog-post-content">
                            {!! $item->post_content !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class=" text-muted blog-quote">
                            <a href="{{ url('/post',$item->id) }}"><div class="pull-right btn btn-success"><i class="fa fa-link"></i>阅读全文</div></a>
                            <div class="pull-left "><i class="fa fa-folder"></i> {{ $item->post_category }}&nbsp;</div>
                            <div class="pull-left blog-comments"><i class="fa fa-comments"></i> {{ $item->comments_count }}&nbsp;</div>
                            <div class="pull-left blog-post-tags"><i class="fa fa-tags"></i> {{ $item->post_tag }} </div>
                        </div>
                    </article>
                @endforeach
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
                    <li><a href="http://s.me/?m=201708">2017年八月</a>&nbsp;<span class="badge badge-primary badge-pill">2</span></li>
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
            <aside class="widget">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cras justo odio
                            <span class="badge badge-primary badge-pill"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dapibus ac facilisis
                            <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Morbi leo risus
                            </font></font><span class="badge badge-primary badge-pill"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></span>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="clearfix"></div>
        <div class="pagination-div">
            {!! $post->links() !!}
        </div>
    </div>
@endsection
