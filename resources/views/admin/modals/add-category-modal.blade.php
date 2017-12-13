
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
        <div class="col-sm-2">
            <div class="input-icon right">
                <i class="{{ $errors->has('name') ? ' fa fa-warning tooltips' : '' }}" data-original-title="分类名称为必填项，最大长度255。"></i>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="名称">
            <span  class="help-block">{{ $errors->has('name') ? ' 分类名称为必填项，最大长度255。' : '' }}</span>
            </div>
        </div>

    </div>
    <div class="form-group {{ $errors->has('sort') ? ' has-error' : '' }}">
        <label for="sort" class="col-sm-2 control-label">排序</label>
        <div class="col-sm-2">
            <div class="input-icon right">
            <i class="{{ $errors->has('sort') ? ' fa fa-warning tooltips' : '' }}" data-original-title="排序为必填项，序号只能为数字。"></i>
            <input type="text" name="sort" value="{{ old('sort') }}" class="form-control" aria-describedby="sortStatus" id="sort" placeholder="排序">
            <span  class="help-block">{{ $errors->has('sort') ? ' 排序为必填项，序号只能为数字。' : '' }}</span>
            </div>
        </div>
    </div>
    {{ csrf_field() }}
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn sbold green">提交</button>
        </div>
    </div>
</form>