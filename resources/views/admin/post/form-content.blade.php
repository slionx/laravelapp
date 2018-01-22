@if (session('success'))
    <div class="note note-success note-bordered">
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="note note-danger note-bordered">
        <div class="alert alert-error">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ session('error') }}
        </div>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif
{{ csrf_field() }}
<div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('post_title') ? ' has-error' : '' }}">
    <input type="text" class="form-control" value="{{ isset($post) ? $post->post_title : old('post_title') }}" maxlength="255" name="post_title" id="maxlength_post_title" autofocus>
    <label for="post_title">文章标题</label>
    <span class="help-block">{{ $errors->has('post_title') ? $errors->first('post_title', ':message') : '文章标题为必填项，文章标题应小于255字节。' }}</span>
</div>
<div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('post_slug') ? ' has-error' : '' }}">
    <input type="text" class="form-control" value="{{ isset($post) ? $post->post_slug : old('post_slug') }}" name="post_slug" maxlength="255" id="maxlength_post_slug">
    <label for="post_slug">文章slug</label>
    <span class="help-block">{{ $errors->has('post_slug') ? $errors->first('post_slug', ':message') : '文章slug为必填项，文章标题应小于255字节。' }}</span>
</div>
<div class="form-group form-md-line-input form-md-floating-label">
    <select class="form-control" name="category">
        @if(isset($post->post_category))
            <option value="{{ $post->post_category }}">{{ $post->post_category }}</option>
        @else
            @if(isset($categories)&& count($categories))
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            @endif
        @endif
    </select>
    <label for="category">选择分类</label>
    <span class="help-block">选择文章分类</span>
</div>
<div class="form-group form-md-line-input form-md-floating-label">
    <label for="allow_comment">开启评论</label>
    <input type="checkbox" name="comments_status" class="make-switch" {{ isset($post->comments_status) ? 'checked' : '' }} data-on-color="success" data-off-color="default">
    <span class="help-block">是否开启文章评论</span>
</div>

<div class="form-group">
    <label for="post_tag">文章标签</label>
    <select class="form-control" name="post_tag[]" id="post_tags" multiple>
        @if(isset($post->post_tag))
            <?php
            $tags = explode(',',$post->post_tag);
            ?>
                <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="60" style="width: 100%;">
                    <span class="selection">
                        <span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                            <ul class="select2-selection__rendered">
                                 @foreach($tags as $tag)
                                <li class="select2-selection__choice" title="{{$tag}}" data-select2-id="0">
                                    <span class="select2-selection__choice__remove" role="presentation">×</span>{{$tag}}</li>
                                <li class="select2-selection__choice" title="California" data-select2-id="0">
                                    <span class="select2-selection__choice__remove" role="presentation">×</span>{{$tag}}</li>
                                @endforeach
                                <li class="select2-search select2-search--inline">
                                    <input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                            </ul>
                        </span>
                    </span>
                    <span class="dropdown-wrapper" aria-hidden="true"></span></span>
        @else
            @if(isset($tags)&&count($tags))
            @foreach($tags as $tag)
                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
            @endforeach
            @endif

        @endif
    </select>
    <span class="help-block"><strong>{{ $errors->has('post_tag[]') ? ' 文章标签必填项。' : '' }}</strong></span>

</div>
<div class="form-group form-md-line-input form-md-floating-label">
    <label for="form_control_1">文章内容</label>


    <!-- 加载编辑器的容器 -->
    <script id="container" name="post_content" type="text/plain">{{ isset($post) ? $post->post_content : old('post_content') }}</script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">

        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>
</div>
</div>






