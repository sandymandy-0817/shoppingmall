<?php 

    include ('../db/db_conn.php');

    $sql = "SELECT * FROM shop_data";

    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>쇼핑몰 관리자 페이지</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="../css/animate.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../css/product_mg.css" rel="stylesheet" type="text/css">
    <style>
        table {width: 1500px; margin: 0 auto;}
        img {width: 50%;}
        th {width:5%;}
        thead {background-color: var(--m_color); color: #fff; height: 45px;}
        th {text-align: center;}
        tbody {font-size:14px;}
        tbody > tr > td {text-align: center;}
        thead > tr > th:nth-child(6) {width: 20%;}
        td > a {margin-left: 10px;}
    </style>
</head>
<body>
    <header>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <h1><a href="../index.php" alt="상단로고"><img src="../images/ikea.svg" alt="상단로고" width="180"></a></h1>
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <!--사용자가 로그인 안한 경우 메뉴-->
                                <?php if(!$userid) { ?>
                                <li><a href="order_list.php" title=""><i class="fa fa-shopping-cart"></i>주문정보</a></li>
                                <li><a href="cart.php" title=""><i class="fa fa-shopping-cart"></i>장바구니</a></li>
                                <li><a href="login.php" title=""><i class="fa fa-user"></i>로그인</a></li>
                                <li><a href="join.php" title=""><i class="fa fa-lock"></i>회원가입</a></li>
                                <?php } else { ?>

                                <!--사용자가 로그인 한 경우 메뉴-->
                                <li><a href="#" title=""><i class="fa fa-lock"></i><?php echo $name; echo '(' . $userid; echo ')'; ?>님 환영합니다.</a></li>
                                <li><a href="order_list.php" title=""><i class="fa fa-shopping-cart"></i>주문정보</a></li>
                                <li><a href="cart.php" title=""><i class="fa fa-shopping-cart"></i>장바구니</a></li>
                                <li><a href="./php/logout.php" title=""><i class="fa fa-user"></i>로그아웃</a></li>
                                <li><a href="join.php" title=""><i class="fa fa-lock"></i>회원가입</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--메인메뉴-->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle>
                                <span class="sr_only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" title="모든 제품">모든 제품</a></li>
                                <li><a href="#" title="공간별 쇼핑하기">공간별 쇼핑하기</a></li>
                                <li><a href="#" title="특별한 가격">특별한 가격</a></li>
                                <li><a href="#" title="새로운 소식">새로운 소식</a></li>
                                <li><a href="#" title="아이디어">아이디어</a></li>
                                <li><a href="#" title="플래닝&체크서비스">플래닝&amp;체크 서비스</a></li>
                                <li><a href="#" title="더보기">더보기</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <main>
        <section>
            <div>
                <table>
                    <caption>상품목록 리스트</caption>
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">카테고리</th>
                            <th scope="col">상품명</th>
                            <th scope="col">상품 가격</th>
                            <th scope="col">상품 요약 설명</th>
                            <th scope="col">상품 설명</th>
                            <th scope="col">상품 메모</th>
                            <th scope="col">상품 이미지</th>
                            <th scope="col">상품 등록일</th>
                            <th scope="col">메뉴</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>';
                                echo "<td>" . $row['no'] . '</td>';
                                echo "<td>" . $row['cate'] . '</td>';
                                echo "<td>" . $row['name'] . '</td>';
                                echo  "<td>" . number_format($row['price']) . '</td>';
                                echo "<td>" . $row['parent'] . '</td>';
                                echo "<td>" . $row['comment'] . '</td>';
                                echo "<td>" . $row['memo'] . '</td>';
                                echo "<td><img src='../images/shop/" . $row['img'] . "' alt=''></td>";
                                echo "<td>" . date('Y-m-d', strtotime($row['datetime'])) . '</td>';
                                echo "<td><a href='product_del.php? no=" .$row['no'] . "' title='수정'>수정</a><a href='product_del.php? no=" .$row['no'] . "' title='삭제'>삭제</a></td>";
                                echo '</tr>';
                            };
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <address>&copy; Inter IKEA Systems B.V 1999-2025</address>
    </footer>
</body>
</html>