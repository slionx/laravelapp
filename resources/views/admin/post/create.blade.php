@extends('admin.layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">写文章</h3>
                    </div>
                    <div class="panel-body">
                        @include('admin.post.form-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('theme_layout_scripts')
    <script src="{{ asset('global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#maxlength_post_title').maxlength({
                alwaysShow: true,
            });
            $('#maxlength_post_slug').maxlength({
                alwaysShow: true,
            });

            $('#post_tags').select2({
                post_tag:true
            });
            if ($('#post_tags').hasClass("select2-hidden-accessible")) {
                console.log(1);
            }else {
                alert(1);
            }
        });
    </script>
@stop
