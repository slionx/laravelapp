<div class="m-portlet__body">
    <div class="m-form__content">

        @if (session('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="m-alert m-alert--icon alert alert-danger" role="alert" id="m_form_1_msg">
                <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                </div>
                <div class="m-alert__text">
                    {{ session('error') }}
                </div>
                <div class="m-alert__close">
                    <button type="button" class="close" data-close="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="m-alert m-alert--icon alert alert-danger" role="alert" id="m_form_1_msg">
                <div class="m-alert__icon">
                    <i class="la la-warning"></i>
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="m-alert__close">
                    <button type="button" class="close" data-close="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        @endif
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
                    @if(isset($post->post_tag))
                        <option value="{{ $post->post_category }}">{{ $post->post_tag- }}</option>


                        @else
                        @if($tags && count($tags))
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
                    @if(isset($post->post_category))
                        <option value="{{ $post->post_category }}">{{ $category->name }}</option>
                        @if(isset($categories)&& count($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
            <div class="form-control-feedback">This field is required.</div>
        </div>
    </div>

    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space"></div>

    <div class="form-group m-form__group row {{ $errors->has('post_category') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="post_content">文章内容 *</label>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="md-editor">
                <textarea placeholder="键入Markdown内容" class="form-control md-input" id="post_content" name="post_content" data-provide="markdown" rows="10" style="resize: none;" aria-describedby="markdown-error">{!! isset($post) ? $post->post_content : old('post_content') !!}</textarea>
                <div class="md-fullscreen-controls">
                    <a href="#" class="exit-fullscreen" title="Exit fullscreen"><span class="fa fa-compress"></span></a>
                </div>
            </div>

            <div id="markdown-error" class="form-control-feedback">This field is required.</div>
        </div>
    </div>
</div>