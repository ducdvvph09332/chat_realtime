var express = require("express");
var app = express();
var http = require("http").createServer(app);
const io = require("socket.io")(http, {
    cors: {
        origin: "http://127.0.0.1:8000",
        methods: ["GET", "POST"]
    }
})
http.listen(3000)

console.log('Connected to port::3000')
io.on('error', function(socket){
    console.log('error')
})

io.on('connection', function(socket){
    console.log('Co nguoi vua ket noi ' + socket.id)
})

var Redis = require("ioredis")
var redis = new Redis(1000)
redis.psubscribe("*")

redis.on('pmessage', function(pattern, channel, message){
    
    console.log(pattern)
    console.log(channel)
    console.log(message)

    message = JSON.parse(message)
    io.emit(channel + ":" + message.event, message.data.chats)
    console.log('Sent')
})