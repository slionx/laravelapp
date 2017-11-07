<div class="moda1l fad2e" id="add-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" class="form-horizontal" action="{{ url('admin/menu') }}" method="post">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">新的菜单</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">路径</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="menu_name" autofocus>
                        </div>
                        <label for="name" class="col-md-4 control-label">显示名称</label>
                        <div class="col-md-8">
                            <input id="display_name" type="text" class="form-control" name="display_name" autofocus>
                        </div>
                        <label for="name" class="col-md-4 control-label">父级id</label>
                        <div class="col-md-8">
                            <input id="parentid" type="text" class="form-control" name="parentid" autofocus>
                        </div>
                        <label for="name" class="col-md-4 control-label">图标</label>
                        <div class="col-md-8">
                            <input id="icon" type="text" class="form-control" name="icon" autofocus>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button id="confirm-btn" type="submit" class="btn btn-primary">确定</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->