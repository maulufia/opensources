<div id="article">
	<div class="title">
		<span>JOIN</span>
	</div>

	<div class="join-form-wrapper"><form action="/auth/join" method="POST">
		<div class="join-form-right"><button type="button" onclick="checkDup();">중복확인</button></div>
		<div class="join-form-left"><span class="sub-title">ID(이메일)</span><input id="join-id" type="text" name="id" /></div>
		<div class="join-form-left"><span class="sub-title">비밀번호</span><input id="join-pw" type="password" name="password" /></div>
		<div class="join-form-left"><span class="sub-title">비밀번호 확인</span><input id="join-pw-re" type="password" name="password_2" /></div>
		<div id="join-form-nickname" class="join-form-left"><span class="sub-title">닉네임</span><input id="join-nickname" type="text" name="nickname" /><span class="init">(영문, 한글 2자이상)</span></div>
		<div class="join-form-center"><button type="submit" onclick="checkValue(); return false;">가입하기</button></div>
		
	</form></div>
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->

<script type="text/javascript">
	function checkDup() {
		//유효성 체크
		var id = new Array();
		id.push($('#join-id').val()); //id POST

		$.ajax({
			url: '/auth/checkId/',
			data: {id:id},
			type: 'POST',
			cache: false,
			success: function(data) {
				if(data == '1') {
					alert('중복된 아이디입니다.');
				} else {
					alert('정상적입니다.');
				}
			},
			error: function(data, textStatus, error) {
				alert(data);
			}
		});
	}

	function checkValue() {
		var submitFlag = 1;

		//id 유효성 검사
		var id = $('#join-id').val();
		var regex = /.+@.+\..+/;

		if(!id.match(regex)) {
			alert("아이디는 이메일 주소 형태로 사용해주세요.");
			submitFlag = 0;
			return false;
		}

		//password 유효성 검사
		var pw = $('#join-pw').val();
		var pwre = $('#join-pw-re').val();

		if(pw == '' || !(pw == pwre)) {
			alert("비밀번호를 다시 확인해주세요.");
			submitFlag = 0;
			return false;
		}

		if($('#join-nickname').val() == '') {
			alert("닉네임을 입력해주세요.");
			submitFlag = 0;
			return false;
		}

		if(submitFlag == 1) {
			alert('회원가입에 성공하였습니다.');
			$('form').sumbit();

		}
	}
</script>