@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">upload</h3>
                    </div>
                    <div class="panel-body">
                        <title>Upload and edit images in Laravel using Croppic jQuery plugin</title>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
                        <link rel="stylesheet" href="plugins/croppic/assets/css/main.css"/>
                        <link rel="stylesheet" href="plugins/croppic/assets/css/croppic.css"/>

                        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
                        <link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

                        </head>
                        <body>

                        <div class="container">
                            <div class="row margin-bottom-40">
                                <div class="col-md-12">
                                    <h1>Upload and edit images in Laravel using Croppic jQuery plugin</h1>
                                </div>
                            </div>

                            <div class="row margin-bottom-40">
                                <div class=" col-md-3">
                                    <div id="cropContainerEyecandy"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p><a href="http://www.croppic.net/" target="_blank">Croppic</a> is ideal for uploading profile photos,
                                        or photos where you require predefined size/ratio.</p>
                                </div>
                            </div>
                        </div>
                        <script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
                        <script src="plugins/croppic/croppic.min.js"></script>
                        <script>
                            var eyeCandy = $('#cropContainerEyecandy');
                            var croppedOptions = {
                                uploadUrl: 'upload',
                                cropUrl: 'crop',
                                cropData:{
                                    'width' : eyeCandy.width(),
                                    'height': eyeCandy.height()
                                }
                            };
                            var cropperBox = new Croppic('cropContainerEyecandy', croppedOptions);
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop