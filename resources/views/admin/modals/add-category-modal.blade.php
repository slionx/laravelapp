
<form class="form-horizontal" action="{{ url('admin/category') }}" method="post">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
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
        </div>
    </div>
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-sm-2 control-label">分类名称</label>
        <div class="col-sm-10">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="名称">
            <span  class="help-block">{{ $errors->has('name') ? ' 分类名称为必填项，最大长度255。' : '' }}</span>
        </div>

    </div>
    <div class="form-group {{ $errors->has('sort') ? ' has-error' : '' }}">
        <label for="sort" class="col-sm-2 control-label">排序</label>
        <div class="col-sm-10">
            <input type="text" name="sort" value="{{ old('sort') }}" class="form-control" aria-describedby="sortStatus" id="sort" placeholder="排序">
            <span  class="help-block">{{ $errors->has('sort') ? ' 排序为必填项，序号只能为数字。' : '' }}</span>
            <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            <span id="sortStatus" class="sr-only">(error)</span>
        </div>
    </div>
    {{ csrf_field() }}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button  type="submit" type="button" class="btn btn-primary">提交</button>
                <button type="reset" class="btn btn-primary">重置</button>
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>