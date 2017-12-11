@extends('admin.layouts.app')
@section('title','分类')
@section('content')
    <link href="{{ asset('global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />


    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget widget-default">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">主页</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>菜单</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-bell"></i> Action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-shield"></i> Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Something else here</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-bag"></i> Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-header">

                        </div>
                        {{--<div class="widget-body">

                            <table class="table table-hover table-striped table-bordered table-responsive" style="overflow: auto">
                                <thead>
                                <tr>
                                    <th>排序</th>
                                    <th>名称</th>
                                    <th>日期</th>
                                    <th>文章</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categorise as $val)
                                    <tr>
                                        <td>{{ $val['sort'] }}</td>
                                        <td>{{ $val['name'] }}</td>
                                        <td>{{ $val['updated_at'] }}</td>
                                        <td></td>
                                        <td>
                                            <div>
                                                <a href="" class="btn btn-info"
                                                   data-toggle="tooltip" data-placement="top" title="编辑">
                                                    <i class="fa fa-pencil fa-fw">编辑</i>
                                                </a>
                                                <button class="btn btn-danger swal-dialog-target"
                                                        data-toggle="tooltip" data-placement="top" title="删除"
                                                        data-url=""
                                                        data-dialog-msg="删除?">
                                                    <i class="fa fa-trash-o fa-fw">删除</i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>--}}

                    </div>
                </div>
            </div>

            //----------------------------------------------------
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Managed Table</span>
                            </div>
                            <div class="actions">
                                <div class="btn-group btn-group-devided" data-toggle="buttons">
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_table">
                                <thead>
                                <tr>
                                    <th> 排序 </th>
                                    <th> 名称 </th>
                                    <th> 日期 </th>
                                    <th> 文章 </th>
                                    <th> 操作 </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td> shuxer </td>
                                    <td>
                                        <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                    <td class="center"> 12 Jan 2012 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td> looper </td>
                                    <td>
                                        <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-warning"> Suspended </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td> userwow </td>
                                    <td>
                                        <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                    </td>
                                    <td>
                                        <span class="label label-sm label-success"> Approved </span>
                                    </td>
                                    <td class="center"> 12.12.2011 </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-docs"></i> New Post </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-tag"></i> New Comment </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-user"></i> New User </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="icon-flag"></i> Comments
                                                        <span class="badge badge-success">4</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            //---------------------------------------------------

            @include('admin.modals.add-category-modal')
        </div>
    </div>
@stop
@section('theme_layout_scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
{{--    <script src="{{ asset('global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->--}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('global/plugins/datatables/colResizable-1.5.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            var table = $('#sample_table').DataTable({
                "ajax": {
                    "url": "http://l.cn/admin/category/show",
                    "type": "GET",
                    "data": function ( d ) {
                        d._token = "{{csrf_token()}}";
                    },
                    "dataSrc": "data",
                    "error":function(){alert("服务器未正常响应，请重试");}
                },
                "processing": true,
                "serverSide": true,
                "columns": [
                    { "data": "id"},
                    { "data": "name"},
                    { "data": "sort"},
                    { "data": "created_at"},
                    { "data": "updated_at"},
                ],
                "autoWidth": true,//自动宽度
                "pagingType":   "full_numbers",
                "sLoadingRecords": "正在加载数据...",
                "sZeroRecords": "暂无数据",
                "stateSave": true,
                "searching": true,
                "dom": '<"top"f>lrt<"bottom"ip<"clear">>',
                "order": [[ 0, "asc" ]],


                /*"aoColumnDefs": [ { "bSortable": false, "aTargets": [0] },{ "class": "tn", "targets": [ 0 ] }

                   ],*/
                "language": {
                    "processing": "玩命加载中...",
                    "lengthMenu": "显示 _MENU_ 项结果",
                    "zeroRecords": "没有匹配结果",
                    "info": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "search": "搜索",
                    "infoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "infoFiltered": "(由 _MAX_ 项结果过滤)",
                    "infoPostFix": "",
                    "url": "",
                    "paginate": {
                        "first":    "首页",
                        "previous": "上一页",
                        "next":     "下一页",
                        "last":     "末页"
                    }
                },
                _fnPageChange:function(){
                    alert("1111");
                }


            });
            $("#sample_table").colResizable();
            $("#tb-refresh").on("click",function(){
                //加载一个新的文件
                //fnReloadAjax方法有3个主要参数
                //1、oSettings=[类似jquery ajax的data:{id:2}]
                //2、sNewSource=加载数据的URL
                //3、回调函数fnCallback
                //table.fnReloadAjax( 'media/examples_support/json_source2.txt' );
                //刷新新的数据
                //table.fnReloadAjax();
            });








        });
    </script>
@stop