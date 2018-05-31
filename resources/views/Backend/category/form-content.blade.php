{!! editor_css() !!}
<div class="m-portlet__body">
    <div class="m-form__content">
        @include('Backend.layouts.alert')
    </div>
    <div class="form-group m-form__group row {{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">分类名称 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input autofocus type="text" class="form-control m-input" id="name" name="name" maxlength="255" placeholder="分类名称" value="{{ isset($category) ? $category->name : old('name') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('name') ? $errors->first('name', ':message') : '分类名称为必填项，应小于255字节。' }}</div>
        </div>
    </div>

    <div class="form-group m-form__group row {{ $errors->has('sort') ? ' has-danger' : '' }}">
        <label class="col-form-label col-lg-3 col-sm-12" for="sort">分类名称 *</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <div class="input-group data">
                <input type="text" class="form-control m-input" id="sort" name="sort" value="0" maxlength="3" placeholder="排序" value="{{ isset($category) ? $category->sort : old('sort') }}" aria-describedby="m_datepicker-error">
                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                </div>
            </div>
            <div class="form-control-feedback">{{ $errors->has('sort') ? $errors->first('sort', ':message') : '默认0，最大255' }}</div>
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