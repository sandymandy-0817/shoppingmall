<?php 

    include ('../db/db_conn.php');

    $p_cate = $_POST['p_cate'];
    $p_name = trim($_POST['p_name']);
    $p_price = trim($_POST['p_price']);
    $p_myfile = $_FILES['p_myfile']['name'];
    $p_parent = trim($_POST['p_parent']);
    $p_detail = trim($_POST['p_detail']);
    $p_comment = trim($_POST['p_comment']);

    echo "카테고리 : " . $p_cate . "<br>";
    echo "상품명 : " . $p_name . "<br>";
    echo "상품가격 : " . $p_price . "<br>";
    echo "상품사진 : " . $p_myfile . "<br>";
    echo "상품요약설명 : " . $p_parent . "<br>";
    echo "상품설명 : " . $p_detail . "<br>";
    echo "메모 : " . $p_comment . "<br>";

    if($_POST['action']=='upload') {
        $uploaded_file_name_tmp = $_FILES['p_myfile']['tmp_name'];
        $uploaded_file_name = $_FILES['p_myfile']['name'];
        $uploaded_folder = '../images/shop/';

        move_uploaded_file($uploaded_file_name_tmp, $uploaded_folder. $uploaded_file_name);

        $img = $_FILES['p_myfile']['name'];
        echo $img . "<br>";
        echo "<img src='../images/shop/" .htmlspecialchars($img). "'>";
        echo "<p>" . $uploaded_file_name . "을(를) 업로드 하였습니다.</p>";
    }

    date_default_timezone_set('Asia/Seoul');
    $datetime = date('Y-m-d H:i:s', time());

    /*$sql = "CREATE TABLE shop_data (no int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, cate varchar(100) DEFAULT NULL, img varchar(255) NOT NULL, name varchar(20) NOT NULL, parent varchar(20) NOT NULL, price double NOT NULL, comment varchar(500) NOT NULL, memo varchar(255) NOT NULL, datetime datetime DEFAULT CURRENT_TIMESTAMP())";*/

    $sql = "INSERT INTO shop_data SET cate = '$p_cate', img = '$p_myfile', name = '$p_name', parent = '$p_parent', price = '$p_price', comment = '$p_detail', memo = '$p_comment', datetime = '$datetime'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "<script>alert('상품등록이 완료되었습니다. 이전 페이지로 이동합니다.');</script>";
        echo "<script>location.replace('../product_mg.php');</script>";
    } else {
        echo "상품등록 실패" . mysqli_error($conn);
    }

?>