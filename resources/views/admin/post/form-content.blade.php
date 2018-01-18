<div class="row">
    <div class="col-md-12">
    @include('UEditor::head')
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">撰写新文章</span>
                </div>
                <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>

            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form action="{{ route('post.store') }}"  method="post" enctype="multipart/form-data">

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
                        <div class="note note-danger note-bordered">
                        </div>
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
                        <input type="text" class="form-control" value="{{ old('post_title') }}" maxlength="255" name="post_title" id="maxlength_post_title">
                        <label for="post_title">文章标题</label>
                        <span class="help-block">{{ $errors->has('post_title') ? ' 文章标题为必填项，文章标题应小于255字节。' : '' }}</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('post_slug') ? ' has-error' : '' }}">
                        <input type="text" class="form-control" value="{{ old('post_slug') }}" name="post_slug" maxlength="255" id="maxlength_post_slug">
                        <label for="post_slug">文章slug</label>
                        <span class="help-block">{{ $errors->has('post_slug') ? ' 文章slug为必填项，文章标题应小于255字节。' : '' }}</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <select class="form-control" name="category">
                            @if(isset($categories)&&count($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                                @else
                                <option value=""></option>
                            @endif
                        </select>
                        <label for="category">选择分类</label>
                        <span class="help-block">选择文章分类</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <label for="allow_comment">开启评论</label>
                        <input type="checkbox" name="allow_comment" class="make-switch" checked data-on-color="success" data-off-color="default">
                        <span class="help-block">是否开启文章评论</span>
                    </div>

                    <div class="form-group">
                        <label for="post_tag">文章标签</label>
                        <select class="form-control" name="post_tag[]" id="post_tags" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        <span class="help-block"><strong>{{ $errors->has('post_tag[]') ? ' 文章标签必填项。' : '' }}</strong></span>

                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <label for="form_control_1">文章内容</label>


                                <!-- 加载编辑器的容器 -->
                        <script id="container" name="post_content" type="text/plain">{!! old('post_content') !!}</script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">

                            var ue = UE.getEditor('container');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                            });
                        </script>
                    </div>
            </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right">发布</button>
                        <button type="reset" class="btn btn-default pull-right">重置</button>
                    </div>
                </div>
            </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
    <!-- END VALIDATION STATES-->
</div>
</div>



