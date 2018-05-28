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
    <select class="form-control" name="post_category">
        @if(isset($post->post_category))
            <option value="{{ $post->post_category }}">{{ $category->name }}</option>
            @if(isset($categories)&& count($categories))
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @endif
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
    <input type="checkbox" name="comments_status" class="make-switch" @isset($post->comments_status) @if($post->comments_status == "on") checked @endif @endisset data-on-color="success" data-off-color="default">
    <span class="help-block">是否开启文章评论</span>
</div>
<div class="form-group form-md-line-input {{ $errors->has('post_tag') ? ' has-error' : '' }}">
    <label for="post_tags">文章标签</label>
    <select class="form-control" name="post_tag[]" id="post_tags" multiple="multiple">
            @if($tags)
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            @endif
    </select>
    <span class="help-block"><strong>{{ $errors->has('post_tag') ? ' 文章标签必填项' : '' }}</strong></span>
</div>
<div class="form-group form-md-line-input form-md-floating-label">
    <label for="form_control_1">文章内容</label>
    <div class="editor container">
        <textarea id='myEditor'>{!! isset($post) ? $post->post_content : old('post_content') !!}</textarea>
    </div>
</div>
</div>






