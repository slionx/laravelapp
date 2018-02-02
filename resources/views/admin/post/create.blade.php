@extends('admin.layouts.app')

@section('content')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-theme">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
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
                                        {{--<!-- BEGIN FORM-->--}}
                                        <form action="{{ route('post.store') }}"  method="post" enctype="multipart/form-data">
                                        @include('admin.post.form-content')
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success pull-right">发布</button>
                                                    <button type="reset" class="btn btn-danger pull-right">重置</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        {{--<!-- END FORM-->--}}
                                    </div>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('theme_layout_scripts')
    <script src="{{ asset('global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#maxlength_post_title').maxlength({
                alwaysShow: true,
            });
            $('#maxlength_post_slug').maxlength({
                alwaysShow: true,
            });
            $('#post_tags').select2({
                post_tag:true
            });
        });
    </script>
@stop
