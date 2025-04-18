<?php 

include ('./db/db_conn.php');

if(isset($_SESSION['mb_id'])) {
    $username = $_SESSION['mb_id'];
    $userid = $_SESSION['mb_name'];
} else {
    $username ='';
    $userid = '';
}
    
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>쇼핑몰 관리자 페이지</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="./css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="./css/animate.css" rel="stylesheet" type="text/css">
    <link href="./css/main.css" rel="stylesheet" type="text/css">
    <link href="./css/product_mg.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <h1><a href="index.php" alt="상단로고"><img src="./images/ikea.svg" alt="상단로고" width="180"></a></h1>
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
                                <li><a href="#" title=""><i class="fa fa-lock"></i><?php echo $username; echo '(' . $userid; echo ')'; ?>님 환영합니다.</a></li>
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
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="product_mg.php" title="상품등록 추가">상품등록 추가</a></li>
                        <li><a href="./product_list.php" title="등록상품 관리">등록상품 관리</a></li>
                        <li><a href="#" title="상품 분류 관리">상품 분류 관리</a></li>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="container">
                    <h2>쇼핑몰 관리자 페이지</h2>
                    <form name="upload_product" method="post" action="./php/product_input.php" enctype="multipart/form-data" onsubmit="return form_check()">
                        <input type="hidden" name="action" value="upload">
                        <h3>상품등록</h3>

                        <p>
                            <label for="p_cate" class="form-label">카테고리</label>
                            <select name="p_cate" id="p_cate" class="form-select-lg">
                                <option value="">카테고리 선택</option>
                                <option value="가구">가구</option>
                                <option value="침대">침대</option>
                                <option value="책상">책상</option>
                                <option value="의자">의자</option>
                                <option value="원예">원예</option>
                                <option value="어린이">어린이</option>
                            </select>
                        </p>

                        <p>
                            <label for="p_name" class="form-label">상품명</label>
                            <input type="text" id="p_name" name="p_name" class="form-control">
                        </p>

                        <p>
                            <label for="p_price" class="form-label">상품가격 <input type="text" name="p_price" id="p_price" class="form-control">원</label>
                        </p>

                        <p>
                            <label for="p_myfile" class="form-label">상품사진</label>
                            <input type="file" name="p_myfile" id="p_myfile" class="form-control">
                            <?php 
                                if(!isset($_POST['p_myfile'])) {
                                    echo "";
                                } else {
                                    echo "<img src'./uploads/" .htmlspecialchars($img). "'>";
                                }
                            ?>
                        </p>

                        <p>
                            <label for="p_parent" class="form-label">상품요약설명</label>
                            <textarea name="p_parent" id="p_parent" cols="100" rows="10" class="form-control"></textarea>
                            <input type="file" id="detail_img" class="form-control">
                        </p>

                        <p>
                            <label for="p_detail" class="form-label">설명</label>
                            <textarea name="p_detail" id="p_detail" cols="100" rows="10" class="form-control"></textarea>
                        </p>

                        <p>
                            <label for="p_comment" class="form-label">메모</label>
                            <input type="text" id ="p_comment" name="p_comment" class="form-control">
                        </p>

                        <p>
                            <input type="submit" value="upload" class="btn btn-primary">
                            <input type="button" value="새로운 상품등록" class="btn btn-secondary">
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <address>&copy; Inter IKEA Systems B.V 1999-2025</address>
    </footer>

    <script>
        function form_check() {
            //alert('함수실행');

            if(document.getElementById('p_cate').value =="") {
                alert('상품 카테고리를 선택하세요');
                document.getElementById('p_cate').focus();
                return false;
            }

            if(document.getElementById('p_name').value == '') {
                alert('상품명을 입력하세요');
                document.getElementById('p_name').focus();
                return false;
            }

            if(!document.getElementById('p_price').value) {
                alert('상품가격을 입력하세요');
                document.getElementById('p_price').focus();
                return false;
            }

            if(document.getElementById('p_myfile').value==="") {
                alert('상품사진을 등록하세요');
                document.getElementById('p_myfile').focus();
                return false;
            }

            if(document.getElementById('p_parent').value==="") {
                alert('상품요약설명을 작성하세요');
                document.getElementById('p_parent').focus();
                return false;
            }

            if(!document.getElementById('p_detail').value) {
                alert('상품설명을 작성하세요.');
                document.getElementById('p_detail').focus();
                return false;
            }
            return true;
        }
    </script>
</body>
</html>