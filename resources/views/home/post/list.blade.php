@extends('layouts.app')
<style>
    .blog-post-content img{ width: 100%}
</style>
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
                            {!!  substr($item->post_content,50) !!}
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
            <div class="card mb-3"> <div class="card-header bg-white"><i class="fa fa-tags fa-fw"></i><a class="text-dark" href="https://lufficc.com/tag">标签</a></div> <ul class="card-body"> <div class="tag-list">   <a title="Jcenter" href="https://lufficc.com/tag/Jcenter" class="tag"> Jcenter <span class="badge badge-pill">1</span> </a>    <a title="资源" href="https://lufficc.com/tag/%E8%B5%84%E6%BA%90" class="tag"> 资源 <span class="badge badge-pill">5</span> </a>    <a title="Laravel" href="https://lufficc.com/tag/Laravel" class="tag"> Laravel <span class="badge badge-pill">5</span> </a>    <a title="LEMP" href="https://lufficc.com/tag/LEMP" class="tag"> LEMP <span class="badge badge-pill">1</span> </a>    <a title="Git" href="https://lufficc.com/tag/Git" class="tag"> Git <span class="badge badge-pill">1</span> </a>    <a title="概念" href="https://lufficc.com/tag/%E6%A6%82%E5%BF%B5" class="tag"> 概念 <span class="badge badge-pill">3</span> </a>    <a title="算法" href="https://lufficc.com/tag/%E7%AE%97%E6%B3%95" class="tag"> 算法 <span class="badge badge-pill">2</span> </a>    <a title="树" href="https://lufficc.com/tag/%E6%A0%91" class="tag"> 树 <span class="badge badge-pill">2</span> </a>    <a title="Nginx" href="https://lufficc.com/tag/Nginx" class="tag"> Nginx <span class="badge badge-pill">5</span> </a>    <a title="服务器" href="https://lufficc.com/tag/%E6%9C%8D%E5%8A%A1%E5%99%A8" class="tag"> 服务器 <span class="badge badge-pill">3</span> </a>    <a title="Shadowsocks" href="https://lufficc.com/tag/Shadowsocks" class="tag"> Shadowsocks <span class="badge badge-pill">1</span> </a>    <a title="科学上网" href="https://lufficc.com/tag/%E7%A7%91%E5%AD%A6%E4%B8%8A%E7%BD%91" class="tag"> 科学上网 <span class="badge badge-pill">1</span> </a>    <a title="VPN" href="https://lufficc.com/tag/VPN" class="tag"> VPN <span class="badge badge-pill">1</span> </a>    <a title="Java" href="https://lufficc.com/tag/Java" class="tag"> Java <span class="badge badge-pill">2</span> </a>    <a title="Spring Boot" href="https://lufficc.com/tag/Spring%20Boot" class="tag"> Spring Boot <span class="badge badge-pill">2</span> </a>    <a title="JPA" href="https://lufficc.com/tag/JPA" class="tag"> JPA <span class="badge badge-pill">2</span> </a>    <a title="Querydsl" href="https://lufficc.com/tag/Querydsl" class="tag"> Querydsl <span class="badge badge-pill">1</span> </a>    <a title="Neural Network" href="https://lufficc.com/tag/Neural%20Network" class="tag"> Neural Network <span class="badge badge-pill">4</span> </a>    <a title="Python" href="https://lufficc.com/tag/Python" class="tag"> Python <span class="badge badge-pill">3</span> </a>    <a title="Machine Learning" href="https://lufficc.com/tag/Machine%20Learning" class="tag"> Machine Learning <span class="badge badge-pill">8</span> </a>    <a title="Https" href="https://lufficc.com/tag/Https" class="tag"> Https <span class="badge badge-pill">1</span> </a>    <a title="Flask" href="https://lufficc.com/tag/Flask" class="tag"> Flask <span class="badge badge-pill">2</span> </a>    <a title="Linux" href="https://lufficc.com/tag/Linux" class="tag"> Linux <span class="badge badge-pill">1</span> </a>    <a title="RNN" href="https://lufficc.com/tag/RNN" class="tag"> RNN <span class="badge badge-pill">2</span> </a>    <a title="LSTM" href="https://lufficc.com/tag/LSTM" class="tag"> LSTM <span class="badge badge-pill">3</span> </a>    <a title="TensorFlow" href="https://lufficc.com/tag/TensorFlow" class="tag"> TensorFlow <span class="badge badge-pill">5</span> </a>   </div> </ul> </div>
        </div>
        <div class="clearfix"></div>
        <div class="pagination-div">
            {!! $post->links() !!}
        </div>
    </div>
@endsection
