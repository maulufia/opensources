<div id="article" class="intro">
<?php
	$param;
	if($this->uri->segment(2) == 'summary') {
		$param = 0;
	} else if($this->uri->segment(2) == 'prog') {
		$param = 4;
	} else if($this->uri->segment(2) == 'support') {
		$param = 3;
	}

	$article = $items['article'];
	echo $article[0]['article'];

	if($this->session->userdata('is_admin') == true) {
?>
	<a class="admin-only" href="/intro/edit/<?= $param ?>">글 수정</a>
<?php
	}
?>
	
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->