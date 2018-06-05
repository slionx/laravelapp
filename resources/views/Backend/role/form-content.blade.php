
<div class="m-portlet__body">
    <div class="m-form__content">
        @include('Backend.layouts.alert')
    </div>
    <div class="form-group m-form__group row {{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">角色名称 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input autofocus type="text" class="form-control m-input" id="name" name="name" maxlength="255" placeholder="角色名称" value="{{ isset($role) ? $role->name : old('name') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('name') ? $errors->first('name', ':message') : '角色名称为必填项，应小于255字节。' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('slug') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="slug">角色描述 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input type="text" class="form-control m-input" id="slug" name="slug" placeholder="角色描述" value="{{ isset($role) ? $role->slug : old('slug') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('slug') ? $errors->first('slug', ':message') : '角色描述' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('permission') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="permission">权限</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>模块</th>
                            <th>权限</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissionArray as $controller => $permission)
                            <tr>
                                <td class="m--font-Primary">{{ $controller }}</td>
                                <td>
                                    @if(is_array($permission))
                                        @foreach($permission as $k => $v)
                                            <div class="m-checkbox-inline">
                                                <label class="m-checkbox">
                                                    <input type="checkbox" name="permission[]" @if(in_array($v['id'],$role_permissionArray)) checked @endif value="{{ $v['id'] }}">{{ $v['display_name'] }}
                                                    <span></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions m-form__actions">
        <div class="row">
            <div class="col-lg-9 ml-lg-auto">
                <button type="submit" class="btn btn-success">发布</button>
                <button type="reset" class="btn btn-secondary">重置</button>
            </div>
        </div>
    </div>
</div>
<script>
    var BootstrapMaxlength = {
        init: function () {
            $("input[name='name']").maxlength({
                alwaysShow: !0,
                threshold: 5,
                warningClass: "m-badge m-badge--success m-badge--rounded m-badge--wide",
                limitReachedClass: "m-badge m-badge--danger m-badge--rounded m-badge--wide"
            })
        }
    };
    jQuery(document).ready(function () {
        BootstrapMaxlength.init()
    });
</script>