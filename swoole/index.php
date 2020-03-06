<?php
$host = '127.0.0.1';  //监听IP
$port = 9000;  //监听的端口

$serv = new swoole_server($host,$port);

//$serv = new Swoole\Server($host,$port);

//监听连接进入事件
$serv->on('Connect', function ($serv, $fd) {
    echo "建立链接.\n";
});

//监听数据接收事件
$serv->on('Receive', function ($serv, $fd, $from_id, $data) {
    var_dump($data);
    $serv->send($fd, "参数为: ".$data);
});

//监听连接关闭事件
$serv->on('Close', function ($serv, $fd) {
    echo "链接关闭.\n";
});

//启动服务器
$serv->start();
