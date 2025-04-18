<?php 
    $username = '';
    $userid = '';
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
                                <li><a href="login.php" title=""><i class="fa fa-user"></i>로그인</a></li>
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
                <div class="row">
                    <div class="col-sm-12">
                        <div class="join_form">
                            <h2>회원가입</h2>
                            <form name="member_form" method="post" action="./php/member_input.php" onsubmit="return form_check()">
                                <div class="agree_box">
                                    <textarea>
    약관 내용
    제1조 [목적]
        이 약관은 주식회사 IKEA가 운영하는 온라인 가구 쇼핑몰에서 제공하는 전자상거래....
                                    </textarea>
                                    <p>
                                        <input type="checkbox" id="agree">
                                        <label for="agree">약관에 동의합니다.</label>
                                    </p>
                                </div>
                                <div>
                                    <label for="mb_id">아이디 : </label>
                                    <input type="text" placeholder="아이디" name="mb_id" id="mb_id" required maxlength="20">

                                    <p class="id_check">
                                        <span id="id_check_btn" data-check="0" class="btn btn-default" style="display: inline;">중복확인</span>
                                    </p>

                                    <p id="id_check"></p>
                                </div>
                                
                                <div class="form">
                                    <label for="mb_pass">비밀번호 :</label>
                                    <input type="password" placeholder="비밀번호" class="mb_pass" id="mb_pass" name="mb_pass" required maxlength="12">
                                </div>

                                <div class="form">
                                    <label for="pass2">비밀번호 확인 : </label>
                                    <input type="password" name="mb_pass2" id="mb_pass2" maxlength="12" required>
                                </div>

                                <div class="form">
                                    <label for="mb_name">이름 : </label>
                                    <input type="text" placeholder="이름" name="mb_name" id="mb_name" name="mb_name" required maxlength="5">
                                </div>

                                <div class="form">
                                    <label for="mb_email">이메일 :</label>
                                    <input type="email" placeholder="이메일" class="mb_email" id="mb_email" name="mb_email" required maxlength="50">
                                </div>

                                <div class="form">
                                    <label for="mb_address">주소 :</label>
                                    <input type="text" placeholder="주소" class="mb_address" id="mb_address" name="mb_address" required maxlength="50">
                                </div>

                                <div class="form">
                                    <label for="mb_phone">전화번호 :</label>
                                    <input type="text" placeholder="전화번호" class="mb_phone" id="mb_phone" name="mb_phone" required maxlength="11">
                                </div>
                                
                                <input type="submit" class="btn btn-default" value="회원가입">
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

    <script>
        let id_check_done = false;

        $(document).ready(function() {
            $('#id_check_btn').click(function() {
                let userId = $('#mb_id').val().trim();

                if(userId == '') {
                    alert('아이디를 입력하세요.');
                    $('#mb_id').focus();
                    return;
                }

                if(!validateIdFormat(userId)) {
                    alert('아이디는 영문자와 숫자 조합으로 4~20자 이내여야 합니다.');
                    $('#mb_id').focus();
                    return;
                }

                $.ajax({
                    url: './ajax/id_check.php',
                    type: 'post',
                    data: {mb_id: userId},
                    success: function(response) {
                        response = response.trim();
                        if(response == 'ok') {
                            $('#id_check').text('사용 가능한 아이디입니다.').css('color', 'green');
                        } else {
                            $('#id_check').text('이미 사용중인 아이디입니다.').css('color', '#ff0000');
                        }
                    },
                    error: function() {
                        alert('서버 요청 실패, 다시 시도하세요.');
                    }
                });
            });
        });

        function validateIdFormat(userId) {
            let regex = /^[a-zA-Z0-9]{4,20}$/;
            return regex.test(userId);
        }

        function form_check() {
            if (!document.getElementById('agree').checked) {
                alert('약관에 동의하셔야 합니다.');
                document.getElementById('agree').focus();
                return false;
            }

            if (document.getElementById('mb_id').value.trim() == '') {
                alert('아이디를 입력하세요.');
                document.getElementById('mb_id').focus();
                return false;
            }

            if (document.getElementById('mb_pass').value === '') {
                alert('패스워드를 입력하세요.');
                document.getElementById('mb_pass').focus();
                return false;
            }

            if (document.getElementById('mb_pass2').value === '') {
                alert('패스워드를 재입력하세요.');
                document.getElementById('mb_pass2').focus();
                return false;
            }

            if (document.getElementById('mb_pass').value !== document.getElementById('mb_pass2').value) {
                alert('패스워드가 일치하지 않습니다. 다시 확인하세요.');
                return false;
            }

            if (document.getElementById('mb_name').value === '') {
                alert('이름을 입력하세요.');
                document.getElementById('mb_name').focus();
                return false;
            }

            if (document.getElementById('mb_email').value === '') {
                alert('이메일을 입력하세요.');
                document.getElementById('mb_email').focus();
                return false;
            }

            if (document.getElementById('mb_address').value === '') {
                alert('주소를 입력하세요.');
                document.getElementById('mb_address').focus();
                return false;
            }

            if (document.getElementById('mb_phone').value === '') {
                alert('전화번호를 입력하세요.');
                document.getElementById('mb_phone').focus();
                return false;
            }

            return true;
        }

    </script>
</body>
</html>