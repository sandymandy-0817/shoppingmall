<?php 

include ('./db/db_conn.php');

$userid = $_SESSION['mb_id'];
$username = $_SESSION['mb_name'];
    
$sql = "SELECT * FROM shop_temp WHERE session_id = '$userid'";
$result = mysqli_query($conn, $sql);
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
	</head><!--/head-->
	<body>
		<header id="header"><!--header-->
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
		</header><!--/header-->

		<main>
			<form name="주문하기" action="./php/order_db.php" method="post">
				<section id="cart_item" style="margin: 0 auto; width: 1300px;">
					<div class="container">
						<div class="breadcrumbs">
							<ol class="breadcrumb">
								<li><a href="index.php" title="메인으로 바로가기">Home</a></li>
								<li class="active">Shopping Cart</li>
							</ol>
						</div>
					</div>
					<div class="table-responsive car_info">
						<table class="table table-condensed" style="width: 1224px;">
							<thead>
								<tr class="cart_menu">
									<td class="image">제품이미지</td>
									<td class="description">제품명</td>
									<td class="price">가격</td>
									<td class="quantity">수량</td>
									<td class="total">전체금액</td>
									<td>&nbsp;</td>
								</tr>
							</thead>

							<tbody>
								<?php 
									while($row = mysqli_fetch_array($result)) {
								?>
									<tr>
										<td class="cart_product">
											<a href="#" title="제품사진">
												<img src="./images/shop/<?=$row['img']?>" alt="" style="width: 17px; height: 15px;">
											</a>
										</td>
										<td class="cart_description">
											<h4><a href="#" title="상품명"><?=$row['name']?></a></h4>
										</td>
										<td class="cart_price"><?= number_format($row['price']) ?></td>
										<td class="cart_quantity">
											<input type="text" class="cart_quantity_input" name="quantity" value="<?=$row['count']?>" autocomplete="off" size="2">
										</td>
										<td class="cart_total">
											<p class="cart_total_price"><?= number_format($row['money']) ?></p>
										</td>
										<td class="cart_delete">
											<a href="./php/cart_delete.php?no=<?=$row['no']?>" class="cart_delete"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								<?php } ?>
								<?php 
									$sql = "SELECT sum(money) FROM shop_temp WHERE session_id='$userid'";
									$result = mysqli_query($conn, $sql);
									$row = mysqli_fetch_array($result);
									mysqli_close($conn);
								?>
								<tr>
									<td colspan="4">총금액:</td>
									<td class="cart_total">
										<p class="cart_total_price" style="text-align:right"><?=NUMBER_FORMAT($row[0]) ?></p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class=""><input type="submit" class="btn btn-default" style="color:orange" value="주문하기"></div>
				</section>
			</form>
		</main>

		<footer class="text-center">
				<address>copyright&copy;2023 shoppingmall allrightes resverved.</address>
			</footer>
	</body>
</html>