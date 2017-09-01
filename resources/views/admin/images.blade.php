@extends('admin.layouts.app')
@section('title','图片')
@section('content')
    <div class="row">
        <div class="widget widget-default">
            <div class="widget-header">
                <h6><i class="fa fa-file-image-o fa-fw"></i>图片()</h6>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="widget-body">
                <form role="form" class="form-horizontal" action="post/upload_img"
                      datatype="image"
                      required="required"
                      enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="image" class="col-xs-2 col-xs-offset-1 control-label">
                            <i class="fa fa-file-image-o fa-lg fa-fw"></i>
                        </label>
                        <div class="col-xs-6">
                            <input id="image" class="form-control" accept="image/*" type="file" name="files">
                        </div>
                        <div class="col-xs-2">
                            <button type="submit" class="btn btn-primary">
                                上传
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="widget widget-default">
                    <label style="padding: 5px 10px;width: 100%;margin: 0">

                    </label>
                    <div class="js-imgLiquid" style="width: 100% ;height: 250px;">
                        <img src="">
                    </div>
                    <div class="widget-footer">
                        <div class="widget-meta">
                            <button id="clipboard-btn" class="btn btn-default"
                                    type="button"
                                    data-clipboard-text=""
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Copied">
                                <i class="fa fa-copy fa-fw"></i>
                            </button>
                            <a  class="btn btn-primary"
                                    href=""
                                    target="_blank">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <button class="btn btn-danger swal-dialog-target"
                                    data-dialog-msg="确定删除？"
                                    data-url=""
                                    data-key="">
                                <i class="fa fa-trash-o fa-fw"></i>
                            </button>

                            <i class="fa fa-clock-o fa-fw"></i>

                        </div>
                    </div>
                </div>
            </div>


    </div>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

@endsection
