@extends('admin.layouts.app')


@section('content')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{ asset('global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
<link href="{{ asset('global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ asset('layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ asset('layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->





    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">upload</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="m-heading-1 border-green m-bordered">
                                    <h3>jQuery Validation Plugin</h3>
                                    <p> File Upload widget with multiple file selection, drag&amp;drop support, progress bars and preview images for jQuery.
                                        <br> Supports cross-domain, chunked and resumable file uploads and client-side image resizing.
                                        <br> Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads. </p>
                                    <p> For more info please check out
                                        <a class="btn red btn-outline" href="https://github.com/blueimp/jQuery-File-Upload" target="_blank">the official documentation</a>
                                    </p>
                                </div>
                                <form id="fileupload" action="../assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-lg-7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn green fileinput-button">
                                            <i class="fa fa-plus"></i>
                                            <span> Add files... </span>
                                            <input type="file" name="files[]" multiple=""> </span>
                                            <button type="submit" class="btn blue start">
                                                <i class="fa fa-upload"></i>
                                                <span> Start upload </span>
                                            </button>
                                            <button type="reset" class="btn warning cancel">
                                                <i class="fa fa-ban-circle"></i>
                                                <span> Cancel upload </span>
                                            </button>
                                            <button type="button" class="btn red delete">
                                                <i class="fa fa-trash"></i>
                                                <span> Delete </span>
                                            </button>
                                            <input type="checkbox" class="toggle">
                                            <!-- The global file processing state -->
                                            <span class="fileupload-process"> </span>
                                        </div>
                                        <!-- The global progress information -->
                                        <div class="col-lg-5 fileupload-progress fade">
                                            <!-- The global progress bar -->
                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                                            </div>
                                            <!-- The extended global progress information -->
                                            <div class="progress-extended"> &nbsp; </div>
                                        </div>
                                    </div>
                                    <!-- The table listing the files available for upload/download -->
                                    <table role="presentation" class="table table-striped clearfix">
                                        <tbody class="files"> </tbody>
                                    </table>
                                </form>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Demo Notes</h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul>
                                            <li> The maximum file size for uploads in this demo is
                                                <strong>5 MB</strong> (default file size is unlimited). </li>
                                            <li> Only image files (
                                                <strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction). </li>
                                            <li> Uploaded files will be deleted automatically after
                                                <strong>5 minutes</strong> (demo setting). </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
<!--[if lt IE 9]>
<script src="{{ asset('global/plugins/respond.min.js')}}"></script>
<script src="{{ asset('global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/vendor/tmpl.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/vendor/load-image.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.iframe-transport.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload-process.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload-image.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload-video.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js')}}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('pages/scripts/form-fileupload.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@stop