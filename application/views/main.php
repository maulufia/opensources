<?php
	$announceListMain = $items['announceListMain'];
?>

<link rel="stylesheet" href="/css/idangerous.swiper.css">
<script defer src="/js/idangerous.swiper.js"></script>
<script src="/js/countdown.js"></script>

	<div id="main-carousel">
		<div class="pagination-swipe"></div>
		<div class="swiper-prev"></div>
		<div class="swiper-next"></div>
		<div class="swiper-container">
		  	<div class="swiper-wrapper">
			    <div class="swiper-slide"><div class="full-image" ><a href="#"><img src="/img/mainimage/betherocket_main_1.png" /></a></div></div>
			    <div class="swiper-slide"><div class="full-image" ><a href="#"><img class="full-image" src="/img/mainimage/betherocket_main_2.png" /></a></div></div>
			    <div class="swiper-slide"><div class="full-image" ><a href="#"><img class="full-image" src="/img/mainimage/betherocket_main_3.png" /></a></div></div>
		  	</div>
		</div>
	</div>
	<div class="col3">
		<div class="col3-child">
			<div class="title"><p>공지사항</p><a href="/notice/announce"><img src="/img/icon_more.png" /></a></div>
			<table>
				<colgroup>
					<col style="width: auto">
					<col style="width: 80px">
				</colgroup>
				<tr>
					<th></th>
					<th></th>
				</tr>
<?php
	foreach($announceListMain as $alm) {
?>
				<tr>
					<td><a href="/notice/view/<?= $alm['id'] ?>"><?= $alm['title'] ?></a></td>
					<td><?= $alm['reg_date'] ?></td>
				</tr>
<?php
	}
?>
			</table>
		</div>
<?php
	$curDate = date("z");
	$date = array(
			array(
			"title" => "부트캠프",
			"date" => "2014.10.31"
			),
			array(
			"title" => "서바이벌 엑셀러레이팅",
			"date" => "2014.11.03"
			),
		);
?>
		<div class="col3-child">
			<div class="title"><p>대회일정</p></div>
			<table>
				<colgroup>
					<col style="width: 45px">
					<col style="width: auto">
					<col style="width: 40px">
				</colgroup>
				<tr>
					<th></th>
					<th></th>
					<th></th>
				</tr>
<?php
	foreach($date as $dt) {
		
?>
				<tr>
					<td>
<?php
	$yy = substr($dt['date'], 0, 4);
	$mm = substr($dt['date'], 5, 2);
	$dd = substr($dt['date'], 8, 2);
	$dDate = date("z", mktime(0,0,0,$mm,$dd,$yy));
	$dday = -($dDate - $curDate);

	if($dday < 0) {
		echo 'D'.$dday;
	} else {
		echo 'D+'.$dday;
	}
?>
					</td>
					<td><?= $dt['title'] ?></td>
					<td><?= $dt['date'] ?></td>
				</tr>
<?php
	}
?>
			</table>
		</div>
		<div class="col3-child">
			<div class="title"><p>카운트다운</p></div>
			<script>
				var myCountdown1 = new Countdown({
										//time: 86400 * 3, // 86400 seconds = 1 day
										year:2014,
										month:11,
										day:1,
										hour:0,
										ampm:"am",

										width:300, 
										height:60,  
										rangeHi:"day",
										style:"flip"	// <- no comma on last item!);
									});
			</script>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
  var mySwiper = $('.swiper-container').swiper({
    mode:'horizontal',
    loop: true,
    pagination: '.pagination-swipe',
    createPagination: true,
    //autoplay: 3000,
    //etc..
  });

  	$('.swiper-pagination-switch').click(function() {
		mySwiper.swipeTo($(this).index(), 500);
	});

	$('.swiper-next').click(function() {
		mySwiper.swipeNext();
	});
	$('.swiper-prev').click(function() {
		mySwiper.swipePrev();
	});
});

$(document).ready(function() {
	var paginationWidth = ($('.pagination-swipe').width())*-0.5;
	$('.pagination-swipe').css('margin-left', paginationWidth);
});
</script>