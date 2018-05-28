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
                            添加文章
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" id="m_form_1" novalidate="novalidate" method="post" enctype="multipart/form-data" action="{{ route('post.store') }}">
                {{ csrf_field() }}
                @include('Backend.post.form-content')
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-success">发布</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->                </div>
@endsection
@section('footer_script')
    <script>
        var BootstrapSwitch = {
            init: function () {
                $("input[name='comments_status']").bootstrapSwitch()
            }
        };
        var BootstrapMaxlength = {
            init: function () {
                $("input[name='post_title']").maxlength({
                    alwaysShow: !0,
                    threshold: 5,
                    warningClass: "m-badge m-badge--success m-badge--rounded m-badge--wide",
                    limitReachedClass: "m-badge m-badge--danger m-badge--rounded m-badge--wide"
                })
            }
        };
        var BootstrapSelect = {
            init: function () {
                $("#post_tag").selectpicker({
                    noneSelectedText: '未选择文章标签',
                }),
                    $("#post_category").selectpicker()


            }
        };
        jQuery(document).ready(function () {
            BootstrapSwitch.init()
            BootstrapMaxlength.init()
            BootstrapSelect.init()
        });
        $("#post_content").markdown({
            language: 'zh',
            savable: true,
            onSave: function(e) {
                alert("Saving '"+e.getContent()+"'...")
            },
        })

        (function ($) {
            $.fn.markdown.messages.zh = {
                'Bold': "粗体",
                'Italic': "斜体",
                'Heading': "标题",
                'URL/Link': "链接",
                'Image': "图片",
                'List': "列表",
                'Unordered List': "无序列表",
                'Ordered List': "有序列表",
                'Code': "代码",
                'Quote': "引用",
                'Preview': "预览",
                'strong text': "粗体",
                'emphasized text': "强调",
                'heading text': "标题",
                'enter link description here': "输入链接说明",
                'Insert Hyperlink': "URL地址",
                'enter image description here': "输入图片说明",
                'Insert Image Hyperlink': "图片URL地址",
                'enter image title here': "在这里输入图片标题",
                'list text here': "这里是列表文本",
                'code text here': "这里输入代码",
                'quote here': "这里输入引用文本"
            };
        }(jQuery));

    </script>

    <!--begin::Page Resources -->
    {{--<script src="http://keenthemes.com/metronic/preview/assets/demo/default/custom/crud/forms/validation/form-widgets.js" type="text/javascript"></script>--}}
    <!--end::Page Resources -->

@endsection