<?php
	if(!$this->session->userdata('is_login')) {
?>
	<script>alert('로그인 후 이용가능핣니다.'); location.href="/auth/login";</script>";
<?php
	}
	$applyData = $items['applyData'];
?>

<div id="article" class="apply">
	<div class="title">
		<span>참가신청</span>
	</div>
<!--
	<form action="/apply/application" method="POST"><div class="apply-block-wrapper">
		<div class="apply-block"><span class="apply-title">팀명</span><input type="text" name="team_name" /></div>
		<div class="apply-block"><span class="apply-title">연락처</span>
			<input type="tel" name="team_contact_1" /><span>&nbsp-&nbsp</span>
			<input type="tel" name="team_contact_2" /><span>&nbsp-&nbsp</span>
			<input type="tel" name="team_contact_3" /></div>
		<div class="apply-block"><span class="apply-title">팀원수</span><input type="number" name="team_member" /><span class="init">명</span></div>
		<div class="apply-block"><span class="apply-title">대표자성별</span><select name="leader_gender">
			<option value="0">남</option>
			<option value="1">여</option>
			</select><span class="init">&nbsp/&nbsp</span><span class="apply-title">대표자 나이</span><input type="text" name="leader_age" style="width: 50px;" /></div>
		<div class="apply-block"><span class="apply-title">지역</span><input type="text" name="region" /></div>
		<div class="apply-block"><span class="apply-title">학교</span><input type="text" name="university" /></div>
		<div class="apply-block"><span class="apply-title">파일첨부</span>
			<input id="file-name" type="text" readonly=true name="file_name" value="파일 없음" />
			<input type="file" id="file" name="file" onchange="file_add(); return false;" /><label for="file">파일검색</label></div>

		<div class="apply-block-center"><button type="submit" onclick="submit_final(); return false;">신청하기</button></div>
	</div></form> -->

	<form action="/apply/application" method="POST"><div class="apply-block-wrapper">
		<!-- 대표자 -->
		<p class="apply-title-sub">대표자</p>
		<p class="apply-title-detail">이름</p>
		<input class="input-small" type="text" name="represent[]" value="<?= @$applyData[0]['represent[0]'] ?>" readonly />
		<p class="apply-title-detail">소속(팀명/학교 or 회사)</p>
		<p class="apply-title-detail-2">ex) 로켓팀/서울대</p>
		<input class="input-small" type="text" name="represent[]" value="<?= @$applyData[0]['represent[1]'] ?>" readonly />
		<p class="apply-title-detail">휴대폰번호</p>
		<input class="input-small" type="text" name="represent[]" value="<?= @$applyData[0]['represent[2]'] ?>" readonly />
		<p class="apply-title-detail">이메일주소</p>
		<input class="input-small" type="text" name="represent[]" value="<?= @$applyData[0]['represent[3]'] ?>" readonly />
		<p class="apply-title-detail">우리가 당신에 대해 알 수 있는 자료가 있다면 url을 알려주세요</p>
		<p class="apply-title-detail-2">ex) youtube, facebook, blog, news, etc...</p>
		<input class="input-small" type="text" name="represent[]" value="<?= @$applyData[0]['represent[4]'] ?>" readonly />

		<div class="div-margin"></div>
		<!-- TEAM -->
		<p class="apply-title-sub">TEAM</p>
		<p class="apply-title-detail">팀원 정보(이름, 학교/회사, 역할)</p>
		<p class="apply-title-detail-2">팀 인원 수에 맞게 적어주세요</p>
		<textarea class="input-big" type="text" name="team[]" readonly><?= @$applyData[0]['team[0]'] ?></textarea>
		<p class="apply-title-detail">팀에서 창출하고자 하는 가치는 무엇인가요?(100자 이내)</p>
		<textarea class="input-big" type="text" name="team[]" onkeyup="countText(this, 100)" readonly><?= @$applyData[0]['team[1]'] ?></textarea>
		<p class="count">0/100</p>
		<p class="apply-title-detail">팀의 핵심역량은 무엇인가요?(400자 이내)</p>
		<p class="apply-title-detail-2">*개발능력, 마케팅능력, 보유인프라 등</p>
		<textarea class="input-big-400" type="text" name="team[]" onkeyup="countText(this, 400)" readonly><?= @$applyData[0]['team[2]'] ?></textarea>
		<p class="count">0/400</p>
		<p class="apply-title-detail">현재 팀이 갖춰야할 역량과 그것을 확보하기 위해 어떤 노력을 하고 있나요?(400자 이내)</p>
		<textarea class="input-big-400" type="text" name="team[]" onkeyup="countText(this, 400)" readonly><?= @$applyData[0]['team[3]'] ?></textarea>
		<p class="count">0/400</p>
		<p class="apply-title-detail">국내외 스타트업 경진대회에서 수상한 경력이 있다면 알려주세요</p>
		<p class="apply-title-detail-2">*일시/대회명/수상기관/상금액/상명</p>
		<textarea class="input-big" type="text" name="team[]" readonly><?= @$applyData[0]['team[4]'] ?></textarea>

		<div class="div-margin"></div>
		<!-- PRODUCT -->
		<p class="apply-title-sub">PRODUCT</p>
		<p class="apply-title-detail">만들고자 하는 프로덕트의 핵심을 요약해서 한 문장으로 작성해 주세요</p>
		<input class="input-small" type="text" name="product[]" value="<?= @$applyData[0]['product[0]'] ?>" readonly />
		<p class="apply-title-detail">프로덕트의 핵심 기능에 기반한 유저 시나리오를 작성해주세요(400자 이내)</p>
		<textarea class="input-big-400" type="text" name="product[]" onkeyup="countText(this, 400)" readonly><?= @$applyData[0]['product[1]'] ?></textarea>
		<p class="count">0/400</p>
		<p class="apply-title-detail">사람들은 왜 이 프로덕트를 사용할까요?(400자 이내)</p>
		<textarea class="input-big-400" type="text" name="product[]" onkeyup="countText(this, 400)" readonly><?= @$applyData[0]['product[2]'] ?></textarea>
		<p class="count">0/400</p>
		<p class="apply-title-detail">이 프로덕트가 없다면 사람들은 어떤 프로덕트를 이용할까요?(400자 이내)</p>
		<p class="apply-title-detail-2">*경쟁사가 있다면 경쟁사 대비 차별성도 작성해 주세요</p>
		<textarea class="input-big-400" type="text" name="product[]" onkeyup="countText(this, 400)" readonly><?= @$applyData[0]['product[3]'] ?></textarea>
		<p class="count">0/400</p>
		<p class="apply-title-detail">이 프로덕트의 사용자가 자신의 친구에게 추천한다면 그 이유는 왜일까요?(100자 이내)</p>
		<textarea class="input-big" type="text" name="product[]" onkeyup="countText(this, 100)" readonly><?= @$applyData[0]['product[4]'] ?></textarea>
		<p class="count">0/100</p>
		<p class="apply-title-detail">이 프로덕트로 어떻게 수익을 창출할 계획인가요?(400자 이내)</p>
		<textarea class="input-big-400" type="text" name="product[]" onkeyup="countText(this, 400)" readonly><?= @$applyData[0]['product[5]'] ?></textarea>
		<p class="count">0/400</p>
		<p class="apply-title-detail">당신의 프로덕트는 어떤 상태인가요?</p>
		<div class="radiogroup-wrapper">
			<div class="radiogroup"><input class="" type="radio" name="product[6]" value="0" <?php if(@$applyData[0]['product[6]'] == '0') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 기획 단계(시장조사, 아이디어 도출 등)</span></div>
			<div class="radiogroup"><input class="" type="radio" name="product[6]" value="1" <?php if(@$applyData[0]['product[6]'] == '1') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 기획 후 개발 단계</span></div>
			<div class="radiogroup"><input class="" type="radio" name="product[6]" value="2" <?php if(@$applyData[0]['product[6]'] == '2') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 프로토타입(MVP) 완성</span></div>
			<div class="radiogroup"><input class="" type="radio" name="product[6]" value="3" <?php if(@$applyData[0]['product[6]'] == '3') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 공개적으로 일반 사용자들이 사용 가능(출시)</span></div>
		</div>
		<p class="apply-title-detail">프로덕트에 대해 알 수 있는 url이 있다면 알려주세요</p>
		<p class="apply-title-detail-2">ex) youtube, facebook, blog, news, etc...</p>
		<input class="input-small" type="text" name="product[]" value="<?= @$applyData[0]['product[7]'] ?>" readonly/>

		<div class="div-margin"></div>
		<!-- OTHER -->
		<p class="apply-title-sub">OTHER</p>
		<p class="apply-title-detail">당신의 팀원 모두는 10월 31일 ~ 11월 2일에 개최되는 ‘부트캠프’에 참여할 수 있습니까?</p>
		<div class="radiogroup-wrapper">
			<div class="radiogroup"><input class="" type="radio" name="other[0]" value="1" <?php if(@$applyData[0]['other[0]'] == '1') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 네</span></div>
			<div class="radiogroup"><input class="" type="radio" name="other[0]" value="0" <?php if(@$applyData[0]['other[0]'] == '0') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 아니오</span></div>
		</div>
		<p class="apply-title-detail">당신의 팀은 11월 2일부터 1월 30일까지 제공되는 사무공간에 입주 할 수 있습니까?</p>
		<div class="radiogroup-wrapper">
			<div class="radiogroup"><input class="" type="radio" name="other[1]" value="1" <?php if(@$applyData[0]['other[1]'] == '1') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 네</span></div>
			<div class="radiogroup"><input class="" type="radio" name="other[1]" value="0" <?php if(@$applyData[0]['other[1]'] == '0') { echo "checked='checked'"; } ?>/><span class="apply-title-detail-2"> 아니오</span></div>
		</div>
		<p class="apply-title-detail">타 지원 프로그램에서 지원을 받은 적이 있습니까? 있다면 그 프로그램을 통해 어떤 성과를 도출했나요?</p>
		<textarea class="input-big" type="text" name="other[]" readonly><?= @$applyData[0]['other[2]'] ?></textarea>
		<p class="apply-title-detail">Be the Rocket에서 지원 받고 싶은 내용을 알려주세요</p>
		<textarea class="input-big" type="text" name="other[]" readonly><?= @$applyData[0]['other[3]'] ?></textarea>
		<p class="apply-title-detail">Be the Rocket을 알게 된 경로</p>
		<div class="radiogroup-wrapper">
			<div class="radiogroup"><input class="" type="radio" name="other[4]" value="0" <?php if(@$applyData[0]['other[4]'] == '0') { echo "checked='checked'"; } ?> /><span class="apply-title-detail-2"> 페이스북</span></div>
			<div class="radiogroup"><input class="" type="radio" name="other[4]" value="1" <?php if(@$applyData[0]['other[4]'] == '1') { echo "checked='checked'"; } ?> /><span class="apply-title-detail-2"> 블로그</span></div>
			<div class="radiogroup"><input class="" type="radio" name="other[4]" value="2" <?php if(@$applyData[0]['other[4]'] == '2') { echo "checked='checked'"; } ?> /><span class="apply-title-detail-2"> 언론기사</span></div>
			<div class="radiogroup"><input class="" type="radio" name="other[4]" value="3" <?php if(@$applyData[0]['other[4]'] == '3') { echo "checked='checked'"; } ?> /><span class="apply-title-detail-2"> 지인소개</span></div>
			<div class="radiogroup"><input class="" type="radio" name="other[4]" value="4" <?php if(@$applyData[0]['other[4]'] == '4') { echo "checked='checked'"; } ?> /><span class="apply-title-detail-2"> 기타 : </span><input id="others" type="text" name="other[]" value="<?= @$applyData[0]['other[5]'] ?>" readonly/></div>
		</div>
		
		<div class="div-margin"></div>
		<!-- MILESTONE -->
		<p class="apply-title-sub">MILESTONE</p>
		<p class="apply-title-detail-3">Be the Rocket은 1월30일 이전에 프로덕트 개발을 완료하는 것을 목표로 합니다</p>
		<p class="apply-title-detail">프로그램이 진행되는 3개월간의 마일스톤을 2주단위로 작성해주세요</p>
		<p class="apply-title-detail-2">*현실 가능한 범위안에서 명확히 작성해주세요</p>
		<textarea class="input-big-400" type="text" name="milestone[]" readonly><?= @$applyData[0]['milestone[0]'] ?></textarea>

		<!--
		<span class="apply-title-detail">파일첨부</span><span class="apply-title-detail-2">(파일의 용량은 00MB를 넘지않도록 주의하세요.)</span>
		<div class="filegruop">
			<input id="file-name" type="text" readonly=true name="file_name" value="파일 없음" />
			<input type="file" id="file" name="file" onchange="file_add(); return false;" /><label for="file">파일검색</label>
		</div> -->
		<input class="input-hidden" type="text" name="apply_id" value="<?= $this->session->userdata('id') ?>" readonly />
		<input class="input-hidden" id="submitFlag" type="text" name="submitFlag" value="tempSave" readonly />

		<!-- <div class="div-margin"></div>

		<button type="submit" onclick="tempSave(); return false;">임시저장</button>
		<button type="submit" onclick="submit_final(); return false;">신청하기</button> -->
	</div></form>
</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->

<script type="text/javascript">
	function countText(object, max) {
		var count = $(object).val().length;
		$(object).next("p").text(count + "/" + max);

		if(count > max) {
			$(object).next("p").css('color','red');
		} else {
			$(object).next("p").css('color','#000');
		}

	}
	function file_add() {
		if($("#file").val() != '') {
			var data = new FormData();
			$.each($("#file")[0].files, function(i, file) {
				data.append('picture'+i, file);
			});

			$.ajax({
			url: '/fileupload/index',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			success: function(data) {
				console.log(data);
				$('input#file-name').val($('#file').val());
				alert('성공적으로 업로드하였습니다. 양식을 검토 후 신청하기 버튼을 눌러주세요.')
			},
			error: function(data, textStatus, error) {
					alert(data);
					console.log(data);
			}
			});
		}
	}
	function tempSave() {
		$('form').submit();
		alert("임시 저장하였습니다.");
	}
	function submit_final() {
		var checkFormFlag = 1;

		$('input').each(function() {
			if($(this).attr('id') == 'others') {
				return true;
			}
			if($(this).attr('type') == 'radio') {
				return true;
			}
			if($(this).val() == '') {
				alert('양식을 다시 확인해주세요.');
				checkFormFlag = 0;
				return false;
			}
		});

		$.ajax({
			url: '/fileupload/submit_final',
			data: '',
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			success: function(data) {
				console.log(data);
			},
			error: function(data, textStatus, error) {
					alert(data);
					console.log(data);
					checkFormFlag = 0;
					return false;
			}
		});

		if(checkFormFlag == 1) {
			$('#submitFlag').val() = "finalSave";
			$('form').submit();
			alert("성공적으로 신청하였습니다.");
		}
	}
</script>