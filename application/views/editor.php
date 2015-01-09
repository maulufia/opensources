<script type="text/javascript" src="/bbs/js/HuskyEZCreator.js" charset="utf-8"></script>

<?php
    $article = $items['article'];
?>
<div id="article">
	<form action="/intro/edit/<?php echo $this->uri->segment(3); ?>" method="POST">
		<textarea name="content" id="ir1" rows="10" cols="100" style="width: 100%; min-width: 300px;"><?= $article[0]['article'] ?></textarea>
		<button type="submit" class="admin-only" onclick="submitContents(this);">Submit</button>
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