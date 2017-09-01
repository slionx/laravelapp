@extends('admin.layouts.app')
@section('title','文章')
@section('content')
        <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-sticky-note fa-fw"></i>文章</h6>
                    <h6><i class="fa fa-sticky-note fa-fw"></i>写文章</h6>
                </div>

                <div class="widget-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td title=""></td>
                                <td></td>
                                <td>
                                    <div>
                                        <a  href=""
                                           data-toggle="tooltip" data-placement="top" title="编辑"
                                           class="btn btn-info">
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </a>

                                            <form style="display: inline" method="post"
                                                  action="">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-default" data-toggle="tooltip"
                                                        data-placement="top" title="发布">
                                                    <i class="fa fa-send-o fa-fw"></i>
                                                </button>
                                            </form>

                                        <button class="btn btn-danger swal-dialog-target"
                                                data-title=""
                                                data-dialog-msg="确定删除文章<label></label>？"
                                                title="删除"
                                                data-dialog-enable-html="1"
                                                data-url=""
                                                data-dialog-confirm-text="">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                        </button>
                                        <a class="btn btn-default" href="">
                                            <i class="fa fa-cloud-download fa-fw"></i>
                                        </a>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                操作
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>

                                                        <a href="#" data-url=""
                                                           data-method="post"
                                                           data-enable-ajax="1"
                                                           data-dialog-title="允许评论"
                                                           data-request-data="allow_resource_comment=true"
                                                           class="swal-dialog-target">
                                                            允许评论
                                                        </a>
                                                        <a href="#" data-url=""
                                                           data-method="post"
                                                           data-enable-ajax="1"
                                                           data-dialog-title="显示评论"
                                                           data-request-data="comment_info=force_enable"
                                                           class="swal-dialog-target">
                                                            显示评论
                                                        </a>

                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

