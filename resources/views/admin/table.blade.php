

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">

                <div class="widget-body">
                    <a class="btn pull-right" role="button" data-toggle="modal" data-target="#add-tag-modal">
                        <i class="fa fa-tag"></i>
                    </a>
                    {!! $html->table() !!}
                    {{--<table id="category-table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>sort</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>--}}
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>




<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {!! $html->scripts() !!}
    {{--
<script>
    $(function () {
        $('#category-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '/table/array-data',
            "columns": [
                { data: 'id', name: 'id', orderable:true},
                { data: 'name', name: 'name', orderable:true },
                { data: 'sort', name: 'sort',orderable:true },
                { data: 'created_at', name: 'created_at',orderable:true },
                { data: 'updated_at', name: 'updated_at',orderable:true },
                { data: 'action', name: 'action', 'searchable':false },
            ],
            "autoWidth": true,//自动宽度
            "pagingType":   "full_numbers",
            "sLoadingRecords": "正在加载数据...",
            "sZeroRecords": "暂无数据",
            "stateSave": true,
            "searching": true,
            "createdRow": function ( row, data, index ) {
                //行渲染回调,在这里可以对该行dom元素进行任何操作
                //给当前行加样式
                if (data.role) {
                    $(row).addClass("info");
                }
                //给当前行某列加样式
                $('td', row).eq(3).addClass(data.status?"text-success":"text-error");
                //不使用render，改用jquery文档操作呈现单元格
                var $btnEdit = $('<button type="button" class="btn btn-small btn-primary btn-edit">修改</button>');
                var $btnDel = $('<button type="button" class="btn btn-small btn-danger btn-del">删除</button>');
                $('td', row).eq(5).append($btnEdit).append($btnDel);

            },
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


        });
    });
</script>--}}
