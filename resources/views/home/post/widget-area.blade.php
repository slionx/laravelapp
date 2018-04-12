<div class="widget-area">
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                <span class="caption-subject font-red bold uppercase">近期文章 </span>
                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
            </div>
        </div>
        <div class="portlet-body todo-project-list-content todo-project-list-content-tags" style="height: auto;">
            <div class="todo-project-list">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-danger"> 6 </span> CVE-2017-8464: 快捷方式远程代码执行漏洞 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-info"> 2 </span> 浅谈Session机制及CSRF攻防 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-success"> 14 </span> Windows提权系列中篇 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-warning"> 6 </span> phpcms漏洞 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-info"> 2 </span> 浅谈跨站脚本攻击与防御 </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="portlet-bottom">
            <div class="l"></div>
            <div class="r"></div>
        </div>
    </div>
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                <span class="caption-subject font-green-sharp bold uppercase">文章归档 </span>
                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
            </div>
        </div>
        <div class="portlet-body todo-project-list-content todo-project-list-content-tags" style="height: auto;">
            <div class="todo-project-list">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-danger"> 6 </span> 2017年八月 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-info"> 2 </span> 2017年八月 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-success"> 14 </span> 2017年八月 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-warning"> 6 </span> 2017年八月 </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge badge-info"> 2 </span> 2017年八月 </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="portlet-bottom">
            <div class="l"></div>
            <div class="r"></div>
        </div>
    </div>
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                <span class="caption-subject font-red bold uppercase">分类 </span>
                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
            </div>
        </div>
        <div class="portlet-body todo-project-list-content todo-project-list-content-tags" style="height: auto;">
            <div class="todo-project-list">
                <ul class="nav nav-pills nav-stacked">
                    @forelse ($categories as $category)
                        <li>
                            <a href="{{ route('post.list.category',['category',$category->id]) }}">
                                @if(($category->id % 4) == 0)
                                    <span class="badge badge-danger"> {{ $category->count }} </span> {{ $category->name }} </a>
                            @elseif(($category->id % 4) == 1)
                                <span class="badge badge-info"> {{ $category->count }} </span> {{ $category->name }} </a>
                            @elseif(($category->id % 4) == 2)
                                <span class="badge badge-success"> {{ $category->count }} </span> {{ $category->name }} </a>
                            @elseif(($category->id % 4) == 3)
                                <span class="badge badge-warning"> {{ $category->count }} </span> {{ $category->name }} </a>
                            @else
                            @endif
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="portlet-bottom">
            <div class="l"></div>
            <div class="r"></div>
        </div>
    </div>

    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                <span class="caption-subject font-red bold uppercase">标签 </span>
                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
            </div>
        </div>
        <div class="portlet-body todo-project-list-content todo-project-list-content-tags" style="height: auto;">
            <div class="todo-project-list">
                <ul class="nav nav-pills nav-stacked">
                    @forelse ($tags as $tag)
                        <li>
                            <a href="{{ route('post.list.tag',['tag',$tag->id]) }}">
                            @if(($tag->id % 4) == 0)
                                    <span class="badge badge-danger"> {{ $tag->count }} </span> {{ $tag->name }} </a>
                            @elseif(($tag->id % 4) == 1)
                                <span class="badge badge-info"> {{ $tag->count }} </span> {{ $tag->name }} </a>
                            @elseif(($tag->id % 4) == 2)
                                <span class="badge badge-success"> {{ $tag->count }} </span> {{ $tag->name }} </a>
                            @elseif(($tag->id % 4) == 3)
                                <span class="badge badge-warning"> {{ $tag->count }} </span> {{ $tag->name }} </a>
                            @else
                            @endif
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="portlet-bottom">
            <div class="l"></div>
            <div class="r"></div>
        </div>
    </div>

</div>