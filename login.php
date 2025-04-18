<?php
  include('./db/db_conn.php');

  if(isset($_SESSION['mb_id'])){
    $userid = $_SESSION['mb_id'];
    $username = $_SESSION['mb_name'];
  }else{
    $userid = '';
    $username = '';
  }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="가구, 책상, 인테리어">
    <meta name="description" content="가구용품 쇼핑몰">
    <title>쇼핑몰 프로젝트 - IKEA</title>
    <!--css서식-->
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="./css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="./css/price-range.css" rel="stylesheet" type="text/css">
    <link href="./css/animate.css" rel="stylesheet" type="text/css">
    <link href="./css/swiper.css" rel="stylesheet" type="text/css">
    <link href="./css/main.css" rel="stylesheet" type="text/css">
    <link href="./css/form.css" rel="stylesheet" type="text/css">

    <!--jquery-->
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.scrollUp.min.js"></script>
    <script src="./js/price-range.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.prettyPhoto.js"></script>
    <script src="./js/swiper.js"></script>
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
                                <li><a href="logout.php" title=""><i class="fa fa-user"></i>로그아웃</a></li>
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
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="login_form">
                            <h2>로그인</h2>
                            <form name="loginform" method="post" action="./php/login_check.php" onsubmit="return form_check()">
                                <p>
                                    <label for="id">아이디 : </label><input type="text" placeholder="아이디" name="id" id="id">
                                </p>
                                
                                <p>
                                    <label for="pw">비밀번호 : </label>
                                    <input type="password" placeholder="비밀번호" name="pw" id="pw">
                                </p>
                                
                                <p class="id_save">
                                    <input type="checkbox" class="checkbox" id="id_check">
                                    <label for="checkbox">아이디 저장</label>
                                </p>
                                <input type="submit" class="btn btn-default" value="로그인">
                                <p style="background-color: #ff0; text-align:center; padding: 10px 0px; border-radius: 5px"><a href="javascript:void(0)" onclick="kakaoLogin()" title="카카오 로그인" style="font-weight:bold;">카카오 로그인</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <address>&copy; Inter IKEA Systems B.V 1999-2025</address>
    </footer>

    <script src="./js/main.js"></script>
    <script src="./js/jquery.cookie.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>

    <script>
        function form_check() {
            if(!document.getElementById('id').value) {
                alert('아이디를 입력하세요.');
                document.getElementById('id').focus(); // 커서가 입력폼에 나타나도록
                return false;
            }

            if(!document.getElementById('pw').value) {
                alert('비밀번호를 입력하세요.');
                document.getElementById('pw').focus(); // 커서가 입력폼에 나타나도록
                return false;
            }
        }

        Kakao.init('76dc0e2d2f8f1fff6832edc4719c83f1');

        // sdk초기화여부판단 
        //카카오로그인 
        function kakaoLogin() {
            //Kakao.Auth.authorize()
            Kakao.Auth.login({
                success: function (response) {
                Kakao.API.request({ 
                    url: '/v2/user/me', success: function (response) {
                    console.log(response)
                    }, fail: function (error) { 
                        console.log(error)
                    }, 
                    })
                    }, fail: function (error) { 
                    console.log(error) 
                    }, 
                }) 
            } 

        //카카오로그아웃 
        function kakaoLogout() {
            if (Kakao.Auth.getAccessToken()) { 
                Kakao.API.request({
            url: '/v1/user/unlink',
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
            // Kakao.API.request({ 
            // url: '/v1/user/unlink', success: function (response) { 
            // console.log(response) 
            // }, fail: function (error) { 
            //   console.log(error) }, 
            //});
            Kakao.Auth.setAccessToken(undefined) 
        }}

        $(document).ready(function() {
            let userid = $.cookie('id_save');
            
            if(userid){
                $('#id').val(userid);
                $('#id_check').prop('checked', 'true');
            }

            let login_btn = $('input[type=submit]');

            login_btn.click(function() {
                getCookie();
            });

            let ch = $('#id_check');

            function getCookie() {
                if(ch.is(':checked')) {
                    let userId = $('#id').val();
                    $.cookie('id_save', userId,{expires:7, path:'/'});
                } else {
                    $.removeCookie('id_save', {path:'/'});
                }
            }
        });
    </script>
</body>
</html>