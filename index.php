<?php 

include ('./db/db_conn.php');

if(isset($_SESSION['mb_id'])) {
    $username = $_SESSION['mb_id'];
    $userid = $_SESSION['mb_name'];
} else {
    $name ='';
    $userid = '';
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
        <article class="slide">
            <div>
                <a href="#" title="이벤트1">
                    <img src="./images/home/main1.jpg" alt="이벤트1">
                </a>
            </div>
        </article>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left_sidebar">
                            <h2 class="text-center title"><span>Category</span></h2>
                            <div class="panel-group category-products">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate01" title="침대/메트리스" data-toggle="collapse" data-parent="#accordian">침대/메트리스<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate01" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="침대">침대</a></li>
                                                <li><a href="#" title="메트리스">메트리스</a></li>
                                                <li><a href="#" title="침구">침구</a></li>
                                                <li><a href="#" title="침대협탁">침대협탁</a></li>
                                                <li><a href="#" title="침대 수납">침대 수납</a></li>
                                                <li><a href="#" title="침대헤드">침대헤드</a></li>
                                                <li><a href="#" title="매트리스 베이스">매트리스 베이스</a></li>
                                                <li><a href="#" title="침대갈빗살">침대갈빗살</a></li>
                                                <li><a href="#" title="침대다리">침대다리</a></li>
                                                <li><a href="#" title="매트리스 포함 침대">매트리스 포함 침대</a></li>
                                                <li><a href="#" title="침대헤드커버">침대헤드커버</a></li>
                                                <li><a href="#" title="침실가구세트">침실가구세트</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate02" title="소파 및 암체어" data-toggle="collapse" data-parent="#accordian">소파 및 암체어<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>

                                    <div id="cate02" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="소파">소파</a></li>
                                                <li><a href="#" title="암체어/카우치">암체어/카우치</a></li>
                                                <li><a href="#" title="소파베드">소파베드</a></li>
                                                <li><a href="#" title="소파/암체어용 다리">소파/암체어용 다리</a></li>
                                                <li><a href="#" title="풋스톨/발받침대">풋스톨/발받침대</a></li>
                                                <li><a href="#" title="긴의자/카우치">긴의자/카우치</a></li>
                                                <li><a href="#" title="소파/암체어용 커버">소파/암체어용 커버</a></li>
                                                <li><a href="#" title="소파쿠션">소파쿠션</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate03" title="수납/정리" data-toggle="collapse" data-parent="#accordian">수납/정리<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate03" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="수납장/장식장">수납장/장식장</a></li>
                                                <li><a href="#" title="책장/선반유닛">책장/선반유닛</a></li>
                                                <li><a href="#" title="옷장">옷장</a></li>
                                                <li><a href="#" title="서랍장/침대협탁">서랍장/침대협탁</a></li>
                                                <li><a href="#" title="소형 수납/정리">소형 수납/정리</a></li>
                                                <li><a href="#" title="수납 솔류션 시스템">수납 솔류션 시스템</a></li>
                                                <li><a href="#" title="거실장/찬장/콘솔테이블">거실장/찬장/콘솔테이블</a></li>
                                                <li><a href="#" title="카트/트롤리/이동식 선반">카트/트롤리/이동식 선반</a></li>
                                                <li><a href="#" title="어린이 수납/정리">어린이 수납/정리</a></li>
                                                <li><a href="#" title="TV/멀티미디어가구">TV/멀티미디어가구</a></li>
                                                <li><a href="#" title="야외용 수납가구">야외용 수납가구</a></li>
                                                <li><a href="#" title="스탠드 옷걸이/신발수납">스탠드 옷걸이/신발수납</a></li>
                                                <li><a href="#" title="창고 수납">창고 수납</a></li>
                                                <li><a href="#" title="후크/벽수납">후크/벽수납</a></li>
                                                <li><a href="#" title="가방">가방</a></li>
                                                <li><a href="#" title="이동 보조상품">이동 보조상품</a></li>
                                                <li><a href="#" title="칸막이/파티션">칸막이/파티션</a></li>
                                                <li><a href="#" title="복도 가구세트">복도 가구세트</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate04" title="책상/책상 의자" data-toggle="collapse" data-parent="#accordian">책상/책상 의자<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate04" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="책상/컴퓨터책상">책상/컴퓨터책상</a></li>
                                                <li><a href="#" title="사무용 의자">사무용 의자</a></li>
                                                <li><a href="#" title="게임용가구">게임용가구</a></li>
                                                <li><a href="#" title="미팅/회의용 테이블">미팅/회의용 테이블</a></li>
                                                <li><a href="#" title="회의용 테이블 및 의자 세트">회의용 테이블 및 의자 세트</a></li>
                                                <li><a href="#" title="책상/의자 세트">책상/의자 세트</a></li>
                                                <li><a href="#" title="책상/의자 세트">책상/의자 세트</a></li>
                                                <li><a href="#" title="회의실의자">회의실의자</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate05" title="식탁/테이블/의자" data-toggle="collapse" data-parent="#accordian">식탁/테이블/의자<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate05" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="다이닝 가구">다이닝 가구</a></li>
                                                <li><a href="#" title="커피테이블/보조테이블">커피테이블/보조테이블</a></li>
                                                <li><a href="#" title="바테이블/의자">바테이블/의자</a></li>
                                                <li><a href="#" title="스톨">스톨</a></li>
                                                <li><a href="#" title="카페가구">카페가구</a></li>
                                                <li><a href="#" title="다용도 테이블">다용도 테이블</a></li>
                                                <li><a href="#" title="벤치">벤치</a></li>
                                                <li><a href="#" title="스텝스툴/사다리">스텝스툴/사다리</a></li>
                                                <li><a href="#" title="어린이 테이블">어린이 테이블</a></li>
                                                <li><a href="#" title="어린이 의자">어린이 의자</a></li>
                                                <li><a href="#" title="영유아 의자">영유아 의자</a></li>
                                                <li><a href="#" title="화장대 의자/스툴">화장대 의자/스툴</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate06" title="아웃도어/야외용품" data-toggle="collapse" data-parent="#accordian">아웃도어/야외용품<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate06" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="야외용 가구">야외용 가구</a></li>
                                                <li><a href="#" title="야외용 수납가구">야외용 수납가구</a></li>
                                                <li><a href="#" title="파라솔/가제보">파라솔/가제보</a></li>
                                                <li><a href="#" title="야외용 조명">야외용 조명</a></li>
                                                <li><a href="#" title="야외 용품">야외 용품</a></li>
                                                <li><a href="#" title="조립식 마루/데크">조립식 마루/데크</a></li>
                                                <li><a href="#" title="야외용 러그">야외용 러그</a></li>
                                                <li><a href="#" title="야외용 화분/식물">야외용 화분/식물</a></li>
                                                <li><a href="#" title="야외 주방/야외 주방용품">야외 주방/야외 주방용품</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate07" title="화분/식물" data-toggle="collapse" data-parent="#accordian">화분/식물<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate07" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="식물/조화">식물/조화</a></li>
                                                <li><a href="#" title="화분">화분</a></li>
                                                <li><a href="#" title="화분스탠드">화분스탠드</a></li>
                                                <li><a href="#" title="원예용품">원예용품</a></li>
                                                <li><a href="#" title="물뿌리개">물뿌리개</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate08" title="홈데코/장식품" data-toggle="collapse" data-parent="#accordian">홈데코/장식품<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate08" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="액자/그림/포스터">액자/그림/포스터</a></li>
                                                <li><a href="#" title="식물/조화">식물/조화</a></li>
                                                <li><a href="#" title="수납함/바구니">수납함/바구니</a></li>
                                                <li><a href="#" title="화분">화분</a></li>
                                                <li><a href="#" title="거울">거울</a></li>
                                                <li><a href="#" title="캔들 및 캔들 홀더">캔들 및 캔들 홀더</a></li>
                                                <li><a href="#" title="꽃병/수반">꽃병/수반</a></li>
                                                <li><a href="#" title="메모판">메모판</a></li>
                                                <li><a href="#" title="장식용품">장식용품</a></li>
                                                <li><a href="#" title="선물 포장지/쇼핑백">선물 포장지/쇼핑백</a></li>
                                                <li><a href="#" title="시계">시계</a></li>
                                                <li><a href="#" title="홈 프레그런스">홈 프레그런스</a></li>
                                                <li><a href="#" title="크리스마스 장식">크리스마스 장식</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate09" title="텍스타일" data-toggle="collapse" data-parent="#accordian">텍스타일<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate09" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="침구">침구</a></li>
                                                <li><a href="#" title="커튼/블라인드">커튼/블라인드</a></li>
                                                <li><a href="#" title="쿠션/쿠션커버">쿠션/쿠션커버</a></li>
                                                <li><a href="#" title="어린이 텍스타일">어린이 텍스타일</a></li>
                                                <li><a href="#" title="야외용 쿠션">야외용 쿠션</a></li>
                                                <li><a href="#" title="담요/스로우">담요/스로우</a></li>
                                                <li><a href="#" title="테이블 텍스타일">테이블 텍스타일</a></li>
                                                <li><a href="#" title="욕실 텍스타일">욕실 텍스타일</a></li>
                                                <li><a href="#" title="패브릭/재봉용품">패브릭/재봉용품</a></li>
                                                <li><a href="#" title="주방 텍스타일">주방 텍스타일</a></li>
                                                <li><a href="#" title="영유아 텍스타일">영유아 텍스타일</a></li>
                                                <li><a href="#" title="목욕가운/판쵸우의">목욕가운/판쵸우의</a></li>
                                                <li><a href="#" title="의자방석/패드">의자방석/패드</a></li>
                                                <li><a href="#" title="러그">러그</a></li>
                                                <li><a href="#" title="허리 서포트">허리 서포트</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate10" title="러그/매트/데크" data-toggle="collapse" data-parent="#accordian">러그/매트/데크<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate10" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="러그">러그</a></li>
                                                <li><a href="#" title="조립식 마루/데크">조립식 마루/데크</a></li>
                                                <li><a href="#" title="도어매트">도어매트</a></li>
                                                <li><a href="#" title="욕실매트">욕실매트</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a href="#cate11" title="조명" data-toggle="collapse" data-parent="#accordian">조명<span class="badge pull-right"><i class="fa fa-plus"></i></span></a></h3>
                                    </div>
                                    <div id="cate11" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#" title="일반조명">일반조명</a></li>
                                                <li><a href="#" title="시스템 조명">시스템 조명</a></li>
                                                <li><a href="#" title="스마트 조명">스마트 조명</a></li>
                                                <li><a href="#" title="LED전구">LED전구</a></li>
                                                <li><a href="#" title="장식 조명">장식 조명</a></li>
                                                <li><a href="#" title="야외용 조명">야외용 조명</a></li>
                                                <li><a href="#" title="욕실용 조명">욕실용 조명</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $sql = "SELECT * FROM shop_data WHERE cate='책상'";
                        $result = mysqli_query($conn, $sql);
                    ?>
                    <div class="col-sm-9">
                        <div class="feature_items">
                            <h2 class="text-center title"><span>Feature Items</span></h2>
                            <?php 
                                while ($row = mysqli_fetch_array($result)) {?>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <p><img src="./images/shop/<?=$row['img'];?>" alt="" style="width: 200px; height: 200px;"></p>
                                                    <p> <?=$row['name']; ?></p>
                                                    <p><?=$row['parent']; ?></p>
                                                    <a href="product_detail.php?no=<?=$row['no'];?>" title="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>상품 상세보기</a>
                                                </div>
                                                <div class="product-overlay">
                                                    <div class="overlay-content">
                                                        <h2><?= NUMBER_FORMAT($row['price']);?>원</h2>
                                                        <p><?=$row['comment'];?></p>
                                                        <a href="product_detail.php?no=<?=$row['no'];?>" title="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>상품 상세보기</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }; ?>
                        </div>
                    </div>
                </div>
            </div>신상품</section>
    </main>

    <footer>
        <address>&copy; Inter IKEA Systems B.V 1999-2025</address>
    </footer>

    <script src="./js/main.js"></script>
    <script>
        (function(){var w=window;if(w.ChannelIO){return w.console.error("ChannelIO script included twice.");}var ch=function(){ch.c(arguments);};ch.q=[];ch.c=function(args){ch.q.push(args);};w.ChannelIO=ch;function l(){if(w.ChannelIOInitialized){return;}w.ChannelIOInitialized=true;var s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="https://cdn.channel.io/plugin/ch-plugin-web.js";var x=document.getElementsByTagName("script")[0];if(x.parentNode){x.parentNode.insertBefore(s,x);}}if(document.readyState==="complete"){l();}else{w.addEventListener("DOMContentLoaded",l);w.addEventListener("load",l);}})();
      
        ChannelIO('boot', {
          "pluginKey": "7258c560-0198-4a44-97cc-86186351ad71"
        });
      </script>
</body>
</html>