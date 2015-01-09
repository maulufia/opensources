<?php
	$questionList = $items['questionList'];
	$replyList = $items['replyList'];
	$questionCount = 0;
?>

<div id="article" class="notice">
	<div class="title">
		<span>질문하기</span>
	</div>
	<table class="list">
		<colgroup>
			<col style="width: 60px;">
			<col style="width: auto">
			<col style="width: 80px;">
			<col style="width: 60px">
		</colgroup>
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성일</th>
			<th>작성자</th>
		</tr>
<?php
	foreach($questionList as $ql) {
		$questionCount++;
?>
		<tr>
			<td><?= $questionCount ?></td>
			<td><div class="icon-lock"></div><a href="/qna/preques/<?= $ql['id'] ?>"><?= $ql['title'] ?></a></td>
			<td><?= $ql['reg_date'] ?></td>
			<td><?= $ql['author'] ?></td>
		</tr>
<?php
		foreach($replyList as $rl) {
			if($ql['id'] == $rl['fk_id']) {
				$questionCount++;
?>
		<tr>
			<td><?= $questionCount ?></td>
			<td><?php for($i=0; $i<$rl['depth']; $i++) { echo '&nbsp&nbsp&nbsp&nbsp'; } ?><div class="icon-lock"></div>RE :<a href="/qna/preques/<?= $rl['id'] ?>"><?= $rl['title'] ?></a></td>
			<td><?= $rl['reg_date'] ?></td>
			<td><?= $rl['author'] ?></td>
		</tr>
<?php
			}
		}
	}
?>
	</table>

	<div class="wrapper-float">
		<div class="button"><a href="/qna/write">글쓰기</a></div>
	</div>
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->