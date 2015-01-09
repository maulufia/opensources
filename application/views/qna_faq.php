<?php
	$faqList = $items['faqList'];
	$faqNumber = 0;
?>

<div id="article" class="faq">
	<div class="title">
		<span>FAQ</span>
	</div>
	
	<div class="div-faq">
		<ul>
<?php
			foreach($faqList as $fl) {
				$faqNumber++;
?>
			<li clas="toggle"><span class="number"><?= $faqNumber ?></span><span class="title"><?= $fl['title'] ?></span><span class="icon"></span></li>
			<li class="toggle-content"><?= $fl['article'] ?></li>
<?php
			}
?>
		</ul>
	</div>
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->

<script type="text/javascript">
	$('.icon').click(function() {
		$(this).toggleClass('minus');
		$(this).parent().next('.toggle-content').toggle("on");
	});
</script>