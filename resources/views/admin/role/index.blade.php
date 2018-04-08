@extends('admin.layouts.app')
@section('title','权限')
@section('content')
    <link href="{{ asset('global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            @include('admin.layouts.theme-panel')
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">{{ trans('common.role') }}</a>
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
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Managed Datatables
                <small>managed datatable samples</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

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
                                            <a href="{{ route('role.create') }}" id="sample_editable_1_new" class="btn sbold green">{{ trans('common.create_role') }}
                                                <i class="fa fa-plus"></i>
                                            </a>
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
                            <div class="dataTables_wrapper no-footer">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="table-scrollable">
                                    {!! $html->table() !!}

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
@stop
@section('theme_layout_scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ asset('global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>


    {!! $html->scripts() !!}
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
