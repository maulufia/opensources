<?php
	$announce = $items['announce'];
?>

<script type="text/javascript" src="/bbs/js/HuskyEZCreator.js" charset="utf-8"></script>

<div id="article" class="notice">
	<div class="title">
		<span>NOTICE</span>
	</div>

	<form action="/notice/write/<?php echo $this->uri->segment(3); ?>" method="POST">
		<div class="wrap"><span class="subtitle">제목</span><input id="title" type="text" name="title" value="<?php echo @$announce[0]['title'] ?>"/></div>
		<div class="wrap">
			<span class="subtitle">내용</span>
			<textarea name="content" id="ir1" rows="10" cols="100" style="width: 473px; min-width: 300px;"><?php echo @$announce[0]['article'] ?></textarea>
		</div>
		<div class="wrap">
			<a href="/notice/announce" class="button-black">목록</a>
			<button type="submit" onclick="submitContents(this);">글쓰기</button>
		</div>
	</form>

</div>

</div> <!-- nav-article-wrapper -->
</div> <!-- content -->

<script type="text/javascript">
	var oEditors = [];
	nhn.husky.EZCreator.createInIFrame({
	    oAppRef: oEditors,
	    elPlaceHolder: "ir1",
	    sSkinURI: "/bbs/SmartEditor2Skin.html",
	    fCreator: "createSEditor2"
	});

		// ‘저장’ 버튼을 누르는 등 저장을 위한 액션을 했을 때 submitContents가 호출된다고 가정한다.
	function submitContents(elClickedObj) {
	    // 에디터의 내용이 textarea에 적용된다.
	    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	 
	    // 에디터의 내용에 대한 값 검증은 이곳에서
	    // document.getElementById("ir1").value를 이용해서 처리한다.
	 
	    try {
	        elClickedObj.form.submit();
	    } catch(e) {}
	}
</script>