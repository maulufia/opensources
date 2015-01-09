<div id="article" class="notice">
	<div class="title">
		<span>질문하기</span>
	</div>

	<div class="div-password-wrapper">
		<div class="div-password"><form action="/qna/preques/<?= $this->uri->segment(3) ?>" method="POST">
			<p>이 글은 작성자와 운영진만 볼 수 있습니다.</p>
			<p>비밀번호를 입력하여 주십시오.</p>
			<div class="div-password-input"><span class="reddot">* </span><span>비밀번호</span><input id="password" name="password" type="password" value="" /></div>

			<div class="buttons">
				<button type="submit" onclick="checkEmpty(); return false;">확인</button>
				<button type="button">목록</button>
			</div>
		</form></div>
	</div>

</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->

<script type="text/javascript">
	function checkEmpty() {
		var flag = 1;
		if($('#password').val() == '') {
			flag = 0;
			alert("비밀번호를 입력해 주세요.");
		}

		if(flag == 1) {
			$('.div-password form').submit();
		}
	}
</script>