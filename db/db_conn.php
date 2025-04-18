<?php
$mysql_host = 'localhost';
$mysql_user = 'ksk3570';
$mysql_password = 'ds2007dlek!';
$mysql_db = 'ksk3570';

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if(!$conn) {
    die('연결실패 : ' .mysqli_connect_error()); //연결 실패시 띄울 오류 메시지 & 연결 끊기
}

//ini_set('display_errors', 'Off');

session_start();
?>