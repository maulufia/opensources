<?php
	$question = $items['question'];
	$originalId = $items['originalId'];
?>

	<div id="article">
		<div class="title">
			<span>질문하기</span>
		</div>

		<div class="notice-wrapper">
			<p class="notice-title"><?= $question[0]['title'] ?></p>
			<div class="notice-subinfo">
				<div class="notice-subinfo-float">작성자: <?= $question[0]['author'] ?></div>
				<div class="notice-subinfo-float">작성일: <?= $question[0]['reg_date'] ?></div>
			</div>
			<div class="notice-body"><?= $question[0]['article'] ?></div>
			<div class="notice-footer">
				<a class="button" href="/qna/question">목록</a>
				<a class="button-black" href="/qna/write/<?= $question[0]['id'] ?>">수정</a>
				<a class="button-black" href="/qna/remove/<?= $question[0]['id'] ?>">삭제</a>
				<a class="button-black" href="/qna/reply/<?= $originalId ?>">답글쓰기</a>
			</div>
		</div>

	</div>
	
</div> <!-- nav-article-wrapper -->
</div> <!-- content -->