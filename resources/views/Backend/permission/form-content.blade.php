
<div class="m-portlet__body">
    <div class="m-form__content">
        @include('Backend.layouts.alert')
    </div>
    <div class="form-group m-form__group row {{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">权限名称 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input autofocus type="text" class="form-control m-input" id="name" name="name" maxlength="255" placeholder="权限名称" value="{{ isset($permission) ? $permission->name : old('name') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('name') ? $errors->first('name', ':message') : '权限名称为必填项，长度应小于255。' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('display_name') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_name">显示名称 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input type="text" class="form-control m-input" id="display_name" name="display_name" placeholder="显示名称" value="{{ isset($permission) ? $permission->display_name : old('display_name') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('display_name') ? $errors->first('display_name', ':message') : '显示名称' }}</div>
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