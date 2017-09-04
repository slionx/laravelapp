<div class="row">
    <div class="col-md-12">

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
                <form action="store" id="form_sample_3" method="post" enctype="multipart/form-data">

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="note note-danger note-bordered">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    {{ csrf_field() }}
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="text" class="form-control" maxlength="255" name="post_title" id="maxlength_alloptions">
                        <label for="form_control_1">标题</label>
                        <span class="help-block">Some help goes here...</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="text" class="form-control" name="slug" maxlength="255" id="maxlength_alloptions">
                        <label for="form_control_1">文章slug</label>
                        <span class="help-block">Some help goes here...</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <select class="form-control" name="category">
                            <option value=""></option>
                            <option value="php">php</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label for="form_control_1">文章分类</label>
                        <span class="help-block">Some help goes here...</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <label for="form_control_1">开启评论</label>
                        <input type="checkbox" class="make-switch" checked data-on-color="success" data-off-color="default">

                        <span class="help-block">Some help goes here...</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <textarea class="form-control" name="memo" rows="3"></textarea>
                        <label for="form_control_1">标签</label>
                        <span class="help-block">Some help goes here...</span>
                    </div>
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <label for="form_control_1">文章内容</label>

                        @include('UEditor::head')
                                <!-- 加载编辑器的容器 -->
                        <script id="container" name="post_content" type="text/plain">文章内容</script>
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
                        <button type="submit" class="btn dark">发布</button>
                        <button type="reset" class="btn default">草稿</button>
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


