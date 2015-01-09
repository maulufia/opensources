<?php
	$announce = $items['announce'];
?>

	<div id="article">
		<div class="title">
			<span>NOTICE</span>
		</div>

		<div class="notice-wrapper">
			<p class="notice-title"><?= $announce[0]['title'] ?></p>
			<div class="notice-subinfo">
				<div class="notice-subinfo-float">작성자: 운영진</div>
				<div class="notice-subinfo-float">작성일: <?= $announce[0]['reg_date'] ?></div>
				<div class="notice-subinfo-float">조회수: <?= $announce[0]['hits'] ?></div>
			</div>
			<div class="notice-body"><?= $announce[0]['article'] ?></div>
			<div class="notice-footer">
				<a class="button" href="/notice/announce">목록</a>
<?php
	if($this->session->userdata('is_admin')) {
?>
				<a class="button-black" href="/notice/write/<?= $announce[0]['id'] ?>">수정</a>
				<a class="button-black" href="/notice/remove/<?= $announce[0]['id'] ?>">삭제</a>
<?php
	}
?>
			</div>
		</div>

	</div>
</div> <!-- nav-article-wrapper -->
</div> <!-- content -->