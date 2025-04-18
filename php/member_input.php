<?php 

include ('../db/db_conn.php');

$mb_id = trim($_POST['mb_id']);
$mb_pass = trim($_POST['mb_pass']);
$mb_name = trim($_POST['mb_name']);
$mb_email = trim($_POST['mb_email']);
$mb_address = trim($_POST['mb_address']);
$mb_phone = trim($_POST['mb_phone']);

date_default_timezone_set('Asia/Seoul');
$mb_datetime = date('Y-m-d H:i:s', time());

$mb_pass = password_hash($mb_pass, PASSWORD_DEFAULT);

echo 'mb_id: ' . $mb_id . '<br>';
echo 'mb_pass: ' . $mb_pass . '<br>';
echo 'mb_name: ' . $mb_name . '<br>';
echo 'mb_email: ' . $mb_email . '<br>';
echo 'mb_address: ' . $mb_address . '<br>';
echo 'mb_phone: ' . $mb_phone . '<br>';
echo 'mb_datetime: ' . $mb_datetime . '<br>';

$sql = "INSERT INTO members (mb_id, mb_name, mb_password, mb_email, mb_address, mb_phone, datetime) VALUES ('$mb_id', '$mb_name','$mb_pass','$mb_email','$mb_address','$mb_phone', '$mb_datetime')";

$result = mysqli_query($conn, $sql);

if($result) {
    echo "<script>alert('회원 가입이 완료되었습니다. 로그인 페이지로 이동합니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";
}

mysqli_close($conn);
?>