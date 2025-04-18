<?php 

    include ('../db/db_conn.php');

    $no = $_GET['no'];

    echo $no;

    $sql = "DELETE FROM shop_data WHERE no='$no'";

    $result = mysqli_query($conn, $sql);
    
    if($result) {
        echo "<script>alert('정상적으로 삭제 되었습니다.')</script>";
        echo "<script>history.back(-1);</script>";
    }

    mysqli_close($conn);
    exit;

?>