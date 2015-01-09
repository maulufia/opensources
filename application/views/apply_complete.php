<?php
	if(!$this->session->userdata('is_login')) {
?>
	<script>alert('로그인 후 이용가능핣니다.'); location.href="/auth/login";</script>";
<?php
	}
?>

<div id="article" class="apply-complete">
	<div class="apply-complete-wrapper">
		<div class="title-sbig">참가 신청 완료</div>
		<div class="bar-red"></div>
		<div>
			<p>참가 신청이 완료되었습니다</p>
			<p>스타트업의 성공적인 시장진출을 위해 비더로켓이 당신을 응원합니다!</p>
		</div>
		<a class="button" href="/">메인으로</a>
	</div>


	
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->