@extends('Backend.layouts.app')
@section('css')

@endsection
@section('content')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Form Widgets</h3>
            </div>
            <div>
                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                    <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                        <i class="la la-plus m--hide"></i>
                        <i class="la la-ellipsis-h"></i>
                    </a>
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">
                                        <li class="m-nav__section m-nav__section--first m--hide">
                                            <span class="m-nav__section-text">Quick Actions</span>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                <span class="m-nav__link-text">Activity</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                <span class="m-nav__link-text">Messages</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-info"></i>
                                                <span class="m-nav__link-text">FAQ</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="" class="m-nav__link">
                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                <span class="m-nav__link-text">Support</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__separator m-nav__separator--fit">
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ trans('common.create') }}{{ trans('common.welcome') }}
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{ route('welcome.index') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
						<span>
							<i class="fa fa-list"></i>
							<span>{{ trans('common.welcome') }}{{ trans('common.list') }}</span>
						</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" novalidate="novalidate" action="{{ route('welcome.upload') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="m-portlet__body">
                    <div class="m-form__content">
                        @include('Backend.layouts.alert')
                    </div>
                    <div class="form-group m-form__group row {{ $errors->has('file') ? ' has-danger' : '' }}">
                        <label class="col-form-label col-lg-3 col-sm-12" for="file">图片 *</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group data">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="avatar">选择图片</label>

                                <div class="input-group-append">
							<span class="input-group-text">
								<img src="" height="128">
							</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-success">发布</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space"></div>
            </form>

            <form class="m-form m-form--fit m-form--label-align-right" novalidate="novalidate" action="{{ route('welcome.store') }}" method="post">
                {{ csrf_field() }}

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row {{ $errors->has('type') ? ' has-danger' : '' }}">
                        <label class="col-form-label col-lg-3 col-sm-12" for="type">类型 *</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group">
                                <select class="form-control m-bootstrap-select m_selectpicker" name="type" id="type">
                                    <option value="">未选择类型</option>
                                    <option value="slide">幻灯</option>
                                    <option value="video">视频</option>
                                </select>
                                <div class="input-group-append"><span class="input-group-text"><i class="la la-pencil"></i></span></div>
                            </div>
                            <div class="form-control-feedback">{{ $errors->has('type') ? $errors->first('type', ':message') : '类型为必选项' }}</div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row {{ $errors->has('path') ? ' has-danger' : '' }}">
                        <label class="col-form-label col-lg-3 col-sm-12" for="name">{{ trans('common.welcome') }}路径 :</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group data">
                                <input class="form-control m-input" placeholder="填写在线地址" type="text" id="path" name="path" value="{{ old('path') }}" aria-describedby="m_datepicker-error">
                                <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-pencil"></i>
							</span>
                                </div>
                            </div>
                            <div class="form-control-feedback">{{ $errors->has('path') ? $errors->first('path', ':message') : '欢迎页路径为必填项，应小于255字节。' }}</div>
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
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
@endsection
@section('footer_script')
    <script>
        var BootstrapMaxlength = {
            init: function () {
                $("#path").maxlength({
                    alwaysShow: !0,
                    threshold: 5,
                    warningClass: "m-badge m-badge--success m-badge--rounded m-badge--wide",
                    limitReachedClass: "m-badge m-badge--danger m-badge--rounded m-badge--wide"
                })
            }
        };
        var BootstrapSelect = {
            init: function () {
                $("#type").selectpicker()
            }
        };
        jQuery(document).ready(function () {
            BootstrapSelect.init()
            BootstrapMaxlength.init()

        });
    </script>
@endsection
