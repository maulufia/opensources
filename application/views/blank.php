<div id="article" class="notice">
<?php
	if($message != null) {
?>
	<script>
		alert('<?= $message ?>')
		location.href = '/';
	</script>
<?php
	}
?>
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->