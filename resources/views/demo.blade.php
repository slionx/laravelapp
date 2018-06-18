<html>
<head>

</head>
<body>


<!-- Mainly scripts -->
<script src="{{ asset('Backend/js/jquery.min.js') }}"></script>

{{--<script src="//{{ Request::getHost() }}:6001/Backend/js/socket.io.js"></script>--}}
<script src="{{ asset('Backend/js/socket.io.js') }}"></script>
<script>
    var mapping = [];
    mapping['user_id'] = '用户id';
    mapping['m1'] = '消息1';
    mapping['m2'] = '消息2';

    var socket = io("http://l.cn:8890");
    socket.on('connection', function (data) {
        console.log(data);
    });
    socket.on('test-channel:2:App\\Events\\SomeEvent', function(message){
        console.log(message);
        var log = '';
        for(var i in message){
            log += mapping[i]+':'+message[i]+'<br>';
        }

        toastr.success(log,'您有一条新通知!');

    });
    console.log(socket);
</script>


</body>
</html>