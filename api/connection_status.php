<?php
require '../lib/autoload.php';

$IP = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

$ipt = new Iptables($IP);

if( !$ipt->connected() ) {
  http_response_code(403);
  exit;
}

if( !@file_get_contents('http://ipinfo.io/ip') ) {
  http_response_code(503);
  exit;
}
