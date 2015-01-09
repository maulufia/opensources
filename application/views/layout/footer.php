<footer id="footer">
	<div class="wrapper-footer">
		<div>
			<div class="col">
				<a href="http://www.facebook.com/betherocket" target="_blank"><img class="icon" src="/img/footer_facebook.png" /></a>
				<span>문의처 ㅣ 서울대학교 기술지주회사 ㅣ 02-880-2031</span>
				<span class="red">Copyright 2014 Be the Rocket. All Rights Reserved.</span>
			</div>
			<div class="bar-stand"></div>
			<div class="col halfimage">
				<a href="#"><img class="" src="/img/footer_op00.png" /></a>
			</div>
			<div class="col halfimage">
				<a href="#"><img class="" src="/img/footer_op01.png" /></a>
			</div>
		</div>
		<!-- 
		<div class="logo-footer"><img src="/img/logo_snu.png" /><span>서울대학교</span></div>
		<div class="detail">
			<p>151-742 서울시 관악구 관악로 1 서울대학교 | Tel. 02-880-5114 | Fax. 02-885-5272 | EmailWebmaster@snu.ac.kr</p>
			<p>Copyright 2014 Seoul University All Rights Reserved. [개인정보처리방침] 이메일무단수집거부</p>
		</div> -->
	</div>
</footer>

<script type="text/javascript">
	$(document).ready(function() {
		placeImagePosition.set();
	})
   	window.onload  = changeContentSize;          // Window 창 로드시
  	window.onresize  = changeContentSize;          // Window 창 크기를 조정할때마다

   	function changeContentSize() {
	    var heightWindow   = Number(document.documentElement.clientHeight);   // Window 창 높이
	    var widthWindow = Number(document.documentElement.clientWidth);   // Window 창 너비
	    var heightPage = $('#page').outerHeight(true);
		var heightHeader = $('#header').outerHeight(true);
		var heightFooter = $('#footer').outerHeight(true);
		
		//메인 이미지 정렬
	    placeImagePosition.set();

	    console.log(heightWindow);
	    console.log(heightPage);
	    if(heightPage < heightWindow) {
	    	var contentHeight = heightWindow - heightHeader - heightFooter;
	    	if(!$('#article').hasClass('faq')) {
		    	$('#content').css('height', contentHeight);
		    	//$('#nav-left').css('height', contentHeight);
		    	$('#article').css('height', contentHeight);
		    }
	    } else {
	    	var contentHeight = $('#content').outerHeight(true);
	    	//$('#nav-left').css('height', contentHeight);
	    }

	    if(widthWindow < 960) {
	    	$('#box-login').css('left', '5px');
	    	$('.header-main').css('width', widthWindow);
	    } else {
	    	$('#box-login').css('left', 'initial');
	    	$('.header-main').css('width', widthWindow);
	    }

	    //footer width 지정
	    $('#page').css('width', widthWindow);
	    $('footer').css('width', widthWindow);
	    $('#content').css('width', widthWindow);

	    
	}

	/* 사진 중앙정렬 함수
 * 
 * fullView : 사진 모두 보이도록 조정하고 중앙 정렬
 * cropView : 프레임에 맞춰 사진 사이즈를 확대하고 중앙 정렬
 * common : 사진 정렬 후 보이기
 * 
 * */
var placeImagePosition = {
	set: function () {
		if ($('.crop-image').length) {
			placeImagePosition.cropView();
		};
		
		if($('.full-image').length){
			// console.log('full-image 있음: 이미지 정렬 함수 호출' );
			placeImagePosition.fullView();
		};
	},
	fullView: function () {
		// console.log('fullView function called: 이미지 정렬');
		var $image = $('.full-image img');
		$image.each(function(){
			var $this = $(this);
			
			// full-portrait 클래스있을 경우. 세로사진은 가로로 꽉 채우기
			if ($this.parent().hasClass('full-portrait') && $this.width() < $this.height()) {
				$this.css({
					'max-height': 'none'
				});
			}
			
			$this
				.css({
					'margin-left': -($this.width() - Number(window.innerWidth)) /2 + 'px',
					'margin-top': ''
				});
		});
		
		// 가로 세로 공통
		this.common($image);
	},
	cropView: function () {
		var $image = $('.crop-image img');
		$image.each(function () {
			var $this = $(this);
			
			// 상하 여백이 남을 경우
			if($this.parent().outerHeight() > $this.height()) {
				$this
					.css({
						'width': 'auto',
						'height': $this.parent().outerHeight() + 'px'
					})
					.css({
						'margin-left': ($this.parent().outerWidth() - $this.width()) / 2 + 'px',
						'margin-top': ''
					});
			}
			// 상하로 넘칠 경우
			else {
				$this
					.css({
						'width': '',
						'height': ''
					})
					.css({
						'margin-left': '',
						'margin-top': ($this.parent().outerHeight() - $this.height()) / 2 + 'px'
					});
								console.log($this.parent().outerHeight());
								console.log($this.height());
			}
		});
		
		// 가로 세로 공통
		this.common($image);
	},
	common: function ($image) {
		// console.log('common function called: 이미지 보이기');
		$image.each(function () {
			var $this = $(this);
			
			$this
				.css({
					'z-index': 'auto'
				})
				.parent().css('background-image', 'none');
		});
	}
};
</script>