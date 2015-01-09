<?php
	$announceList = $items['announceList'];
	$announceCount = 0;
?>

<div id="article" class="notice">
	<div class="title">
		<span>NOTICE</span>
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
			<th>조회수</th>
		</tr>
<?php
	foreach($announceList as $al) {
		$announceCount++;
?>
		<tr>
			<td><?= $announceCount ?></td>
			<td><a href="/notice/view/<?= $al['id'] ?>"><?= $al['title'] ?></a></td>
			<td><?= $al['reg_date'] ?></td>
			<td><?= $al['hits'] ?></td>
		</tr>
<?php
	}
?>
	</table>
<?php
	if($this->session->userdata('is_admin')) {
?>
	<div class="wrapper-float">
		<div class="button"><a href="/notice/write">글쓰기</a></div>
	</div>
<?php
	}
?>

</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->