{!! editor_css() !!}
<style>
    .wall-item {
        display: block;
        margin: 0 0 30px 0;
        padding: 12px;
        background: white;
        border-radius: 3px;
        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.05);
        transition: all 220ms;
    }
    .wall-item:hover {
        box-shadow: 0px 2px 3px 1px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
        transition: all 220ms;
    }
    .wall-item > img {
        display: block;
        width: 100%;
    }

    .wall-image {
        display: block;
        position: relative;
    }
    .wall-column {
        display: block;
        position: relative;
        width: 25%;
        float: left;
        padding: 0 12px;
        box-sizing: border-box;
    }
    @media (max-width: 640px) {
        .wall-column {
            width: 50%;
        }
    }
    @media (max-width: 480px) {
        .wall-column {
            width: auto;
            float: none;
        }
    }
</style>

<div class="m-portlet__body">
    <div class="m-form__content">
        @include('Backend.layouts.alert')
    </div>
    <div class="form-group m-form__group row {{ $errors->has('post_title') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="post_title">文章标题 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input autofocus type="text" class="form-control m-input" id="post_title" name="post_title"
                       maxlength="255" placeholder="文章标题"
                       value="{{ isset($post) ? $post->post_title : old('post_title') }}"
                       aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('post_title') ? $errors->first('post_title', ':message') : '文章标题为必填项，文章标题应小于255字节。' }}</div>
        </div>
    </div>
    <div class="form-group m-form__group row {{ $errors->has('file') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="file">文章主图</label>
        <div class="col-lg-4 col-md-9 col-sm-12" data-toggle="modal" data-target="#dropzone_modal">
            <div class="input-group data">
                <input type="text" class="custom-file-input" id="file" readonly="readonly">
                <label class="custom-file-label" for="file">选择图片</label>
            </div>
            <div class="form-control-feedback" id="mydropzone-error"></div>
        </div>
    </div>
    <div class="form-group m-form__group row {{ $errors->has('post_tag') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="post_tag">文章标签 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group date ">
                <select class="form-control m-bootstrap-select m_selectpicker" multiple data-actions-box="true"
                        name="post_tag[]" id="post_tag">
                    @if(isset($sel_tag_arr) && count($sel_tag_arr))
                        @if(isset($tags) && count($tags))
                            @foreach($tags as $tag)
                                <option @if(in_array($tag->id,$sel_tag_arr))  selected
                                        @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                    <option @if(in_array($tag->id,$sel_tag_arr))  selected
                                            @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                <option @if(intval(old('post_category')[0]) == $category->id) selected
                                        @endif value="{{ $category->id }}">{{ $category->name }}</option>
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
                <input data-switch="true" type="checkbox" checked="checked" data-on-color="success"
                       data-off-color="danger"
                       @isset($post->comments_status) @if($post->comments_status == "on") checked
                       @endif @endisset name="comments_status" id="comments_status">
            </div>
            <div class="form-control-feedback"></div>
        </div>
    </div>

    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space"></div>

    <div class="form-group m-form__group row {{ $errors->has('post_content') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="editormd_id">文章内容 *</label>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="md-editor" id="editormd_id">
                <textarea style="display:none;"
                          name="post_content">{!! isset($post) ? $post->post_content : old('post_content') !!}</textarea>
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


<!--begin::Modal-->
<div class="modal fade" id="dropzone_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">图床</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <ul class="nav nav-pills nav-pills--success" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#dropzone_tab_1">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">上传图片
                                        </font>
                                    </font>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#dropzone_tab_2"><font
                                            style="vertical-align: inherit;"><font
                                                style="vertical-align: inherit;">提取网络图片</font></font></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#dropzone_tab_3" id="get_images"><font style="vertical-align: inherit;"><font
                                                style="vertical-align: inherit;">浏览图片</font></font></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="dropzone_tab_1" role="tabpanel">
                                <div id="mydropzone" class="m-dropzone dropzone m-dropzone--success dz-clickable"></div>
                            </div>
                            <div class="tab-pane" id="dropzone_tab_2" role="tabpanel">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="input-group date">
                                            <input type="text" class="form-control m-input" placeholder="输入网络图片地址" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="dropzone_tab_3" role="tabpanel">
                                <div class="wall-image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

@section('footer_script')

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
    <script src="{{ asset('Backend/js/jaliswall.js') }}"></script>
    <script src="{{ asset('Backend/js/dropzone.js') }}"></script>
    <script>



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        var get_image_button = false;
        $("#get_images").click(function(){
            if(get_image_button === false){
                $.get("{{ route('image.select') }}",function (response) {
                    console.log(response.result.data);
                    if(response.result.data){
                        console.log(1);
                        var html = '';
                        response.result.data.map(function(element){
                            html += '<a class="wall-item" data-image-id="'+ element.id +'" ><img src="'+ element.path +'" />1<a href="javascript:" class="" title="关闭">2<i class="flaticon-search-1"></i></a></a>';

                            /*html += '<div class="grid-item" data-image-id="'+ element.id +'"><img src="'+ element.path +'"></div>';*/
                        })
                        $(".wall-image").html(html);
                        get_image_button = true;
                        $('.wall-image').jaliswall({ item: '.wall-item' });
                    }
                })
            }
            console.log(get_image_button);
        });



        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#mydropzone", {
            url: "{{ route('image.store') }}",//文件提交地址
            method: "post",  //也可用put
            paramName: "file", //默认为file
            maxFiles: 30,//一次性上传的文件数量上限
            maxFilesize: 2, //文件大小，单位：MB
            acceptedFiles: ".jpg,.gif,.png,.jpeg,.gif", //上传的类型
            addRemoveLinks: true,
            parallelUploads: 1,//一次上传的文件数量
            //previewsContainer:"#preview",//上传图片的预览窗口
            dictDefaultMessage: '拖动文件至此或者点击上传',
            dictMaxFilesExceeded: "您最多只能上传1个文件！",
            dictResponseError: '文件上传失败!',
            dictInvalidFileType: "文件类型只能是*.jpg,*.gif,*.png,*.jpeg,*.gif。",
            dictFallbackMessage: "浏览器不受支持",
            dictFileTooBig: "上传文件过大.",
            dictRemoveLinks: "删除",
            dictCancelUpload: "取消",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function () {
                this.on("addedfile", function (file) {
                    //上传文件时触发的事件
                });
                this.on("success", function (file, response) {
                    //上传成功触发的事件
                    console.log(response);
                    if (response.status == true) {
                        var input = '<div class="dropzone_image"><input type="hidden" name="dropzone_image" data-id="' + response.id + '" value="' + response.result + '" /></div>';
                        $('#mydropzone').after(input);
                    } else {
                        alert('上传失败');
                    }

                });
                this.on("error", function (file, data) {
                    $("#mydropzone-error").text(data);
                    //上传失败触发的事件

                    console.log(file);
                    console.log('fail');
                    console.log(data);
                    /*                var message = '';
                                    //lavarel框架有一个表单验证，
                                    //对于ajax请求，JSON 响应会发送一个 422 HTTP 状态码，
                                    //对应file.accepted的值是false，在这里捕捉表单验证的错误提示
                                    if (file.accepted){
                                        $.each(data,function (key,val) {
                                            message = message + val[0] + ';';
                                        })
                                        //控制器层面的错误提示，file.accepted = true的时候；
                                        //alert(message);
                                    }*/
                });
                this.on("removedfile", function (file) {

                    var id = $("input[name='dropzone_image']").attr("data-id");
                    if (id) {
                        $('.dropzone_image').remove();
                        $.post('/admin/images/' + id, {'_method': 'DELETE'}, function (data) {
                            console.log('删除结果:' + data);
                        })
                    }


                    //删除文件时触发的方法
                    /*                var file_id = angular.element(appElement).scope().file_id;
                                    if (file_id){
                                        $.post('/admin/del/'+ file_id,{'_method':'DELETE'},function (data) {
                                            console.log('删除结果:'+data.message);
                                        })
                                    }*/
                    //document.querySelector('div .dz-default').style.display = 'block';
                });
            }
        });
    </script>
@endsection