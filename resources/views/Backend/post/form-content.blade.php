{!! editor_css() !!}
<div class="m-portlet__body">
    <div class="m-form__content">
        @include('Backend.layouts.alert')
    </div>
    <div class="form-group m-form__group row {{ $errors->has('post_title') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="post_title">文章标题 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input autofocus type="text" class="form-control m-input" id="post_title" name="post_title" maxlength="255" placeholder="文章标题" value="{{ isset($post) ? $post->post_title : old('post_title') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('post_title') ? $errors->first('post_title', ':message') : '文章标题为必填项，文章标题应小于255字节。' }}</div>
        </div>
    </div>
    <div class="form-group m-form__group row {{ $errors->has('post_tag') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="post_tag">文章标签 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group date ">
                <select class="form-control m-bootstrap-select m_selectpicker" multiple data-actions-box="true" name="post_tag[]" id="post_tag">
                    @if(isset($sel_tag_arr) && count($sel_tag_arr))
                        @if(isset($tags) && count($tags))
                            @foreach($tags as $tag)
                                <option @if(in_array($tag->id,$sel_tag_arr))  selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        @endif
                    @elseif(old('post_tag') && count(old('post_tag')))
                        <?php
                        foreach (old('post_tag') as $item) {
                            $sel_tag_arr[] = $item;
                        }
                        ?>
                        @if(isset($sel_tag_arr) && count($sel_tag_arr))
                            @if(isset($tags) && count($tags))
                                @foreach($tags as $tag)
                                    <option @if(in_array($tag->id,$sel_tag_arr))  selected @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            @endif
                        @endif
                    @else
                        @if(isset($tags) && count($tags))
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="la la-tag"></i></span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('post_tag') ? $errors->first('post_tag', ':message') : '文章标签为必选项' }}</div>
        </div>
    </div>
    <div class="form-group m-form__group row {{ $errors->has('post_category') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="post_category">文章分类 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group">
                <select class="form-control m-bootstrap-select m_selectpicker" name="post_category" id="post_category">
                    <option value="">未选择文章分类</option>
                    @if(isset($post->post_category))
                        <option value="{{ $post->post_category }}">{{ $category->name }}</option>
                        @if(isset($categories)&& count($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    @elseif(old('post_category'))
                        @if(isset($categories)&& count($categories))
                            @foreach($categories as $category)
                                <option @if(intval(old('post_category')[0]) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    @else
                        @if(isset($categories) && count($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
                <div class="input-group-append"><span class="input-group-text"><i class="la la-pencil"></i></span></div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('post_category') ? $errors->first('post_category', ':message') : '文章分类为必选项' }}</div>
        </div>
    </div>

    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space"></div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="comments_status">是否开启文章评论 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="switch">
                <input data-switch="true" type="checkbox" checked="checked" data-on-color="success" data-off-color="danger" @isset($post->comments_status) @if($post->comments_status == "on") checked @endif @endisset name="comments_status" id="comments_status">
            </div>
            <div class="form-control-feedback"></div>
        </div>
    </div>

    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space"></div>

    <div class="form-group m-form__group row {{ $errors->has('post_content') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="editormd_id">文章内容 *</label>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="md-editor" id="editormd_id">
                <textarea style="display:none;" name="post_content">{!! isset($post) ? $post->post_content : old('post_content') !!}</textarea>
            </div>
            <div class="form-control-feedback">{{ $errors->has('post_content') ? $errors->first('post_content', ':message') : '文章内容为必选项' }}</div>
        </div>
    </div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions">
        <div class="row">
            <div class="col-lg-9 ml-lg-auto">
                <button type="submit" class="btn btn-success">发布</button>
                <button type="reset" class="btn btn-secondary">重置</button>
            </div>
        </div>
    </div>
</div>

{!! editor_js() !!}
<script>
    var BootstrapSwitch = {
        init: function () {
            $("input[name='comments_status']").bootstrapSwitch()
        }
    };
    var BootstrapMaxlength = {
        init: function () {
            $("input[name='post_title']").maxlength({
                alwaysShow: !0,
                threshold: 5,
                warningClass: "m-badge m-badge--success m-badge--rounded m-badge--wide",
                limitReachedClass: "m-badge m-badge--danger m-badge--rounded m-badge--wide"
            })
        }
    };
    var BootstrapSelect = {
        init: function () {
            $("#post_tag").selectpicker({
                noneSelectedText: '未选择文章标签',
            }),
                $("#post_category").selectpicker()
        }
    };
    jQuery(document).ready(function () {
        BootstrapSwitch.init()
        BootstrapMaxlength.init()
        BootstrapSelect.init()
    });
</script>