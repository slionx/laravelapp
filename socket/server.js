var http = require('http').createServer(handler);
var io = require('socket.io')(http);
var Redis = require('ioredis');

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

var redis =new Redis({
    port: 6379,          // Redis port
    host: '127.0.0.1',   // Redis host
    password: '123456',
})

redis.on('ready',function(res){
    console.log('redis ready');
});
http.listen(6001, function() {
    console.log('Server is running!');
});
io.on('connection', function(socket) {
    console.log('socket.io client connected');

/*    socket.on('disconnect', function() {
        redis.quit();
    });*/
});
redis.psubscribe('*', function(err, count) {
    console.log('count '+ count);
    console.log('error '+ err);
});
redis.on('pmessage', function(subscribed, channel, message) {
    console.log(subscribed);
    console.log('channel '+channel);
    console.log('message '+message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

