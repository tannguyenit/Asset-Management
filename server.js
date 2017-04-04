var portchat = 9999 ;
var socketIO = require('/usr/local/lib/node_modules/socket.io'),
http = require('http'),
port = process.env.PORT || portchat,
ip = process.env.IP || '103.7.43.233',
server = http.createServer().listen(port, ip, function(){
	console.log('Started Socket.IO');
}),
io = socketIO.listen(server);
io.set('match origin procotol', true);
io.set('origins', '*:*');
var run = function (socket){
	
	socket.emit('access', 'Connected!');

	socket.on('chat_example',function(obj){
		socket.broadcast.emit('chat_example',obj);
	});	
}
io.sockets.on('connection', run);