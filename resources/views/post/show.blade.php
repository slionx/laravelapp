
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1 pull-left">
                <div class="panel panel-default">
                    left
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading lead">{{ $post->post_title }}</div>

                    <div class="panel-body ">
                        {!! $post->post_content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 pull-right">
                <div class="panel panel-default">
                    right
                </div>
            </div>





        </div>
    </div>
@endsection
