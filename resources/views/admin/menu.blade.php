@extends('admin.layouts.app')
@section('title','分类')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget widget-default">
                        <div class="widget-header">
                            <h6><i class="fa fa-folder fa-fw"></i>菜单</h6>
                        </div>
                        <div class="widget-body">
                            <a class="btn pull-right" role="button" data-toggle="modal" data-target="#add-category-modal">
                                <i class="fa fa-folder-o"></i>
                            </a>
                            <table class="table table-hover table-striped table-bordered table-responsive" style="overflow: auto">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>索引</th>
                                    <th>名称</th>
                                    <th>父级id</th>
                                    <th>图标</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result as $val)
                                    <tr>
                                        <td>{{ $val['id'] }}</td>
                                        <td>{{ $val['menu_name'] }}</td>
                                        <td>{{ $val['display_name'] }}</td>
                                        <td>{{ $val['parentid'] }}</td>
                                        <td>{{ $val['icon'] }}</td>
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
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.modals.add-menu-modal')
        </div>
    </div>
@stop
@section('theme_layout_scripts')

@stop