
<div class="m-portlet__body">
    <div class="m-form__content">
        @include('Backend.layouts.alert')
    </div>
    <div class="form-group m-form__group row {{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">{{ trans( 'common.name' ) }} *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input autofocus type="text" class="form-control m-input" id="name" name="name" maxlength="255" placeholder="{{ trans( 'common.name' ) }}" value="{{ isset($user) ? $user->name : old('name') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('name') ? $errors->first('name', ':message') : '昵称为必填项，应小于255字节。' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('email') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="email">邮箱地址 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input type="text" class="form-control m-input" id="email" name="email" placeholder="输入邮箱地址" value="{{ isset($user) ? $user->email : old('email') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('email') ? $errors->first('email', ':message') : '输入正确的邮箱地址' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('password') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="password">密码 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input type="text" class="form-control m-input" id="password" name="password" placeholder="输入密码" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('password') ? $errors->first('password', ':message') : '密码' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="password_confirmation">确认密码 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input type="text" class="form-control m-input" id="password_confirmation" name="password_confirmation" placeholder="输入确认密码" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation', ':message') : '确认密码' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('avatar') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="avatar">头像 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                    <input type="file" class="custom-file-input" id="avatar" name="avatar">
                    <label class="custom-file-label" for="avatar">选择头像</label>

                <div class="input-group-append">
							<span class="input-group-text">
								<img src="{{ isset($user) ? $user->avatar : config('app.APP_URL').'..uploads/avatar/default.png' }}" height="128">
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('avatar') ? $errors->first('avatar', ':message') : '头像' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row ">
        <label class="col-form-label col-lg-3 col-sm-12">用户角色</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="m-checkbox-inline">
                @foreach($roles as $role)
                <label class="m-checkbox">
                    <input type="radio" name="role[]" @if (in_array($role->id,$current_role)) checked="checked" @endif value="{{ $role->id }}">{{ $role->slug }} [<a data-target="#myModal" data-toggle="modal" href="">查看角色权限</a>]
                    <span></span>
                </label>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12">Modal Demos</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <a href="" class="btn btn-brand m-btn m-btn--pill" data-toggle="modal" data-target="#role_modal">Launch maxlength inputs on modal</a>
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

<!--begin::Modal-->
<div class="modal fade" id="role_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">权限列表</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>模块</th>
                            <th>权限</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="m--font-danger">$3200.00</td>
                            <td class="m--font-success">sadsad</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->


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