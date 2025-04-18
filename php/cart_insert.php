<?php 

    include ('../db/db_conn.php');

    $no = $_GET['no'];
    $quan = $_POST['quantity'];
    
    //session_start();
    $session_id = $_SESSION['mb_id'];

    echo $no;

    $sql = "SELECT * FROM shop_data WHERE no='$no'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $regdate = time();

    $img = $row['img'];
    $name = $row['name'];
    $price = $row['price'];
    $money = $quan * $row['price'];
    $parent = $row['parent'];
    $comment = $row['comment'];

    $sql = "INSERT INTO shop_temp (name, parent, count, price, money, img, comment, session_id) VALUES ('$name', '$parent', '$quan', '$price', '$money', '$img', '$comment', '$session_id')";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

?>
<script>location.href='../cart.php'</script>