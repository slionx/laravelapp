<div class="form-group">
    <label for="title" class="control-label">文章标题*</label>
    <input id="title" type="text" class="form-control" name="title"
           value=""
           autofocus>

</div>
<div class="form-group">
    <label for="description" class="control-label">文章描述*</label>

    <textarea id="post-description-textarea" style="resize: vertical;" rows="3" spellcheck="false"
              id="description" class="form-control autosize-target" placeholder="请使用 Markdown 格式书写"
              name="description"></textarea>


</div>

<div class="form-group">
    <label for="slug" class="control-label">文章slug*</label>
    <input id="slug" type="text" class="form-control" name="slug"
           value="">


</div>

<div class="form-group">
    <label for="categories" class="control-label">文章分类*</label>
    <select name="category_id" class="form-control">

    </select>


</div>
<div class="form-group">
    <label for="tags[]" class="control-label">文章标签</label>
    <select id="post-tags" name="tags[]" class="form-control" multiple>

    </select>


</div>
<div class="form-group">
    <label for="post-content-textarea" class="control-label">文章内容*</label>
    <textarea spellcheck="false" id="post-content-textarea" class="form-control" name="content"
              rows="36"
              placeholder="请使用 Markdown 格式书写"
              style="resize: vertical"></textarea>

</div>

<div class="form-group">
    <label for="comment_info" class="control-label">评论信息</label>
    <select style="margin-top: 5px" id="comment_info" name="comment_info" class="form-control">

        <option value="default" >默认</option>
        <option value="force_disable" >强制关闭显示评论</option>
        <option value="force_enable" >强制开启显示评论</option>
    </select>
</div>
<div class="form-group">
    <label for="comment_type" class="control-label">评论类型</label>
    <select id="comment_type" name="comment_type" class="form-control">

        <option value="default" >默认</option>
        <option value="raw" >自带评论</option>
        <option value="disqus" >Disqus</option>
        <option value="duoshuo" >多说</option>
    </select>
</div>

<div class="form-group">
    <label for="allow_resource_comment" class="control-label">是否允许评论</label>
    <select id="allow_resource_comment" name="allow_resource_comment" class="form-control">

        <option value="default" >默认</option>
        <option value="false" >禁止评论</option>
        <option value="true" >允许评论</option>
    </select>
</div>

<div class="form-group">
    <div class="radio radio-inline">
        <label>
            <input type="radio"

                   name="status"
                   value="1">发布
        </label>
    </div>
    <div class="radio radio-inline">
        <label>
            <input type="radio"

                   name="status"
                   value="0">草稿
        </label>
    </div>
</div>
{{ csrf_field() }}