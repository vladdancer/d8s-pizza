<?php

global $argv;
$localsocket = 'tcp://127.0.0.1:8003';
$user = '5a91de9d3cd9ab22cc74a3fe';
$message = $argv[1];
// connect to a local tcp-server
$instance = stream_socket_client($localsocket);
// send message
fwrite($instance, json_encode(['user' => $user, 'message' => $message])  . "\n");