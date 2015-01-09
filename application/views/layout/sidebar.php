<?php
	$sidebarList = $items['sidebarList'];
?>
<div id="nav-article-wrapper">
	<nav id="nav-left">
		<ul>
<?php
			foreach($sidebarList as $slKey => $sl) {
?>
			<li <?php if($this->uri->uri_string() == "$slKey") { echo 'class="on"';} ?>><a href="/<?= $slKey ?>"><?= $sl ?></a></li>
<?php
			}
?>
		</ul>
	</nav>

<?php
//사이드바 배경 변경
	if($this->uri->segment(1) == 'intro') {
?>
	<script>
		$('#nav-left').css('background', 'url("/img/bg/bg-about")');
		$('#nav-left').css('background-repeat', 'no-repeat');
	</script>
<?php
	}
?>
<?php
//사이드바 배경 변경
	if($this->uri->segment(1) == 'program') {
?>
	<script>
		$('#nav-left').css('background', 'url("/img/bg/bg-apply")');
		$('#nav-left').css('background-repeat', 'no-repeat');
	</script>
<?php
	}
?>

<?php
//사이드바 배경 변경
	if($this->uri->segment(1) == 'qna') {
?>
	<script>
		$('#nav-left').css('background', 'url("/img/bg/bg-faq")');
		$('#nav-left').css('background-repeat', 'no-repeat');
	</script>
<?php
	}
?>

<?php
//사이드바 배경 변경
	if($this->uri->segment(1) == 'apply') {
?>
	<script>
		$('#nav-left').css('background', 'url("/img/bg/bg-apply")');
		$('#nav-left').css('background-repeat', 'no-repeat');
	</script>
<?php
	}
?>

