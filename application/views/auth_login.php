<?php
		if($this->session->flashdata('message')) {
?>	
		<script>
			alert('<?= $this->session->flashdata('message') ?>')
		</script>
<?php
		}
?>

<div id="article" class="login">
	<img src="/img/logo_main2.jpg" width="185px"/>

	<div class="login-form-wrapper"><form action="/auth/login" method="POST">
		<div class="login-form-right"><button type="submit">로그인</button></div>
		<div class="login-form-left"><span>ID(이메일)</span><input type="text" name="id" /></div>
		<div class="login-form-left"><span>PW</span><input type="password" name="password" /></div>
		
	</form></div>

	<div class="button">
		<a href="/auth/join">
			<img src="/img/icon_join.png">
			<span>JOIN</span>
		</a>
	</div>
	
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->