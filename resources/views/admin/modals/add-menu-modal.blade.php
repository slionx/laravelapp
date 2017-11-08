

<div id="stack1" class="modal fade" tabindex="-1" data-width="400">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">添加菜单</h4>
            </div>
            <form role="form" class="form-horizontal" action="{{ route('menu.store') }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label for="name" class="col-md-4 control-label">路径:</label>
                            <div class="col-md-8">
                                <input type="text" name="menu_name" class="form-control" autofocus>
                            </div>
                            <label for="name" class="col-md-4 control-label">显示名称:</label>
                            <div class="col-md-8">
                                <input type="text" name="display_name" class="form-control">
                            </div>
                            <label for="name" class="col-md-4 control-label">父级id:</label>
                            <div class="col-md-8">
                                <input type="text" name="parentid" class="form-control">
                            </div>
                            <label for="name" class="col-md-4 control-label">图标:</label>
                            <div class="col-md-8">
                                <input type="text" name="icon" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">取消</button>
                    <button type="submit" class="btn red">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>