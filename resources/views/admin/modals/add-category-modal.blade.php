<div class="moda1l fad2e" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" class="form-horizontal" action="{{ url('admin/category') }}" method="post">
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
                    <h4 class="modal-title" id="myModalLabel">新的分类</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">分类名称</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                        </div>
                        <label for="name" class="col-md-4 control-label">排序</label>
                        <div class="col-md-8">
                            <input id="sort" type="text" class="form-control" name="sort" autofocus>
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