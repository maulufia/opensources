<?php
	$applyList = $items['applyList'];
	$applyCount = 0;
?>

<div id="article">
	<div class="title">
		<span>신청현황</span>
	</div>

	<table class="list">
		<colgroup>
			<col style="width: 60px;">
			<col style="width: auto">
			<col style="width: 80px;">
		</colgroup>
		<tr>
			<th>번호</th>
			<th>대표자 이름</th>
			<th>소속</th>
		</tr>
<?php
	foreach($applyList as $al) {
		$applyCount++;
?>
		<tr>
			<td><?= $applyCount ?></td>
			<td><a href="/apply/admin_view/<?= $al['apply_id'] ?>"><?= $al['represent[0]'] ?></a></td>
			<td><?= $al['represent[1]'] ?></td>
		</tr>
<?php
	}
?>
	</table>


</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->