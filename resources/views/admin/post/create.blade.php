@extends('admin.layouts.app')

@section('content')
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
    <script src="{{ asset('pages/scripts/components-bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
@stop