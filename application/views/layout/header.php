<body>
	<div id="page">
		<header id="header" class="<?php if($this->uri->segment(1) == '') echo 'header-main'; ?>">
			<div class="">
				<div id="logo-top"><a href="/">
					<img src="/img/logo_main2.jpg" />
				</a></div>

				<div id="nav-header">
							<div id="box-login" class="<?php if($this->uri->segment(1) == '') echo 'box-login-main'; ?>">
<?php
		if(!$this->session->userdata('is_login')) {
?>
		    <div><a href="/auth"><img src="/img/icon_login.png" /><span>LOGIN</span></a></div>
<?php
		} else {
?>
			<div><a href="/auth/out"><img src="/img/icon_login.png" /><span>LOGOUT</span></a></div>
<?php
		}
?>
		    <div><a href="/auth/join"><img src="/img/icon_join.png" /><span>JOIN</span></a></div>
		</div>
					<ul class="menu-ul">
						<li class="menu-li-stage1">
							<a class="" href="/intro">ABOUT</a>
							<!-- <ul class="menu-ul-stage2">
								<li><a href="/intro/summary">대회개요</a></li>
								<li><a href="/intro/schedule">대회일정</a></li>
								<li><a href="/intro/award">시상내역</a></li>
								<li><a href="/intro/support">후원기관</a></li>
							</ul> -->
						</li>
						<li class="menu-li-stage1">
							<a class="" href="/program">PROGRAM</a>
							<!-- <ul class="menu-ul-stage2">
								<li><a href="/notice/announce">공지사항</a></li>
							</ul> -->
						</li>
						<li class="menu-li-stage1">
							<a class="" href="/qna">FAQ</a>
							<!-- <ul class="menu-ul-stage2">
								<li><a href="">질문하기</a></li>
								<li><a href="/qna/faq">FAQ</a></li>
							</ul> -->
						</li>
						<li class="menu-li-stage1">
							<a class="" href="/apply">APPLY</a>
							<!-- <ul class="menu-ul-stage2 ul-last">
								<li><a href="/apply/application">참가신청</a></li>
							</ul> -->
						</li>
<?php
	if($this->session->userdata('is_admin')) {
?>
						<li class="menu-li-stage1">
							<a class="" href="/apply/apply_list">신청현황</a>
							<!-- <ul class="menu-ul-stage2 ul-last">
								<li><a href="/apply/application">참가신청</a></li>
							</ul> -->
						</li>
<?php
	}
?>
					</ul>
				</div>

				<!-- 
				<div id="logo-header">
					<ul class="nav nav-pills">
						<li class="dropdown">
							<a id="dLabel1" class="dropdown-toggle" data-toggle="dropdown" href="#">대회소개</a>
							<ul class="dropdown-menu" aria-labelledby="dLabel1">
								<li>대회개요</li>
								<li>대회일정</li>
								<li>시상내역</li>
								<li>후원기관</li>
							</ul>
						</li>
						<li class="dropdown">
							<a id="dLabel2" class="dropdown-toggle" data-toggle="dropdown" href="#">알림마당</a>
							<ul class="dropdown-menu" aria-labelledby="dLabel2">
								<li>공지사항</li>
								<li>행사사진</li>
							</ul>
						</li>
						<li class="dropdown">
							<a id="dLabel3" class="dropdown-toggle" data-toggle="dropdown" href="#">문의하기</a>
							<ul class="dropdown-menu" aria-labelledby="dLabel3">
								<li>질문하기</li>
								<li>FAQ</li>
							</ul>
						</li>
						<li class="dropdown">
							<a id="dLabel4" class="dropdown-toggle" data-toggle="dropdown" href="#">신청하기</a>
							<ul class="dropdown-menu" aria-labelledby="dLabel4">
								<li>신청하기</li>
								<li>참가신청</li>
								<li>참가방법</li>
								<li>신청확인</li>
							</ul>
						</li>
					</ul>
				</div> -->


			</div>
		</header>

<div id="content">
	<!-- Start of Content -->