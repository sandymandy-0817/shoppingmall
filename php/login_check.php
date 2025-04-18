<?php 

include ('../db/db_conn.php');

$mb_id = trim($_POST['id']);
$mb_pw = trim($_POST['pw']);

echo $mb_id . '<br>';
echo $mb_pw . '<br>';

$sql = "SELECT * FROM members WHERE mb_id = '$mb_id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//echo $row['no'] . '<br>';
//echo $row['mb_id'] . '<br>';
//echo $row['mb_name'] . '<br>';
//echo $row['mb_password'] . '<br>';
//echo $row['mb_email'] . '<br>';
//echo $row['mb_address'] . '<br>';
//echo $row['mb_phone'] . '<br>';
//echo $row['datetime'] . '<br>';

$mb_id = $row['mb_id'];
$db_password = $row['mb_password'];
$mb_name = $row['mb_name'];

if(password_verify($mb_pw, $db_password)) {
    $_SESSION['mb_id'] = $mb_id;
    $_SESSION['mb_name'] = $mb_name;

    if($mb_id=='admin') {
        echo "<script>location.replace('../product_mg.php');</script>";
    }else{
        echo "<script>location.replace('../index.php');</script>";
    }
    
}

mysqli_close($conn);

?>