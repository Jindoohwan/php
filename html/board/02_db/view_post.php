<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script language="javascript" src="js/check_form.js"></script>
<script language="javascript" src="js/jquery-1.11.2.js"></script>
<script>
//댓글 수정
var isEditReplyMode = false;
function editReply(button, replyId, form) {
	var cell = document.getElementById(replyId);
	if (isEditReplyMode == false) {
		var content = cell.innerHTML;
		cell.innerHTML = '';
		var textarea = document.createElement('textarea');
		textarea.id = replyId + 'textarea';
		cell.appendChild(textarea);
		textarea.value = content;
		textarea.cols = 60;
		isEditReplyMode = true;
		button.value = '수정완료';
	} else {
		var textarea = document.getElementById(replyId + 'textarea');
		var content = textarea.value;
		if (content == '') {
			alert('댓글은 빈칸 안됨');
			textarea.focus();
			return false;
		}
		//cell.innerHTML = content;
		isEditReplyMode = false;
		button.value = '수정';
		var element = document.createElement('input');
		form.appendChild(element);
		element.name = 'content';
		element.type = 'hidden';
		element.value = content;
		form.submit();
	}
	return false;
}

//댓글더보기
var currentDisplayedReplies = 0;
var replyBlockSize = 3; //보여지는 댓글갯수
function showMoreReplies(button) {
	var table = document.getElementById('reply_table');
	var numTotalReplies = table.rows.length;
	//alert(numTotalReplies);
	var nextDisplayedReplies = Math.min(currentDisplayedReplies + replyBlockSize, numTotalReplies);
	for (var rownum = 0; rownum < numTotalReplies; rownum++) {
		var row = table.rows[rownum];
		if (rownum < nextDisplayedReplies) {
			row.style.display = '';
		} else {
			row.style.display = 'none';
		}
	}
	currentDisplayedReplies = nextDisplayedReplies;
	if (nextDisplayedReplies === numTotalReplies) {
		button.style.display = 'none';
	}
}

//댓글삭제
function deleteRowById(table, rowId) {
	for (var i = 0; i < table.rows.length; i++) {
		if (table.rows[i].id === rowId) {
			table.deleteRow(i);
			return;
		}
	}
	alert(table.rows[1].id);
}

function deleteReply(replyId) {	
	if (confirm('정말 삭제하겟습니까?')) {
		ajaxDeleteReply(replyId);
		var table = document.getElementById('reply_table');
		deleteRowById(table, 'reply_id' + replyId);
	} 
}

function ajaxDeleteReply(replyId) {
	$.ajax({ 
		url: 'comment/delete2.php',
		type: 'POST',
		async: false,
		data: { comment_id: replyId },
		success: function(result) {
		},
		error: function(xhr) {
			alert('ajaxDeleteReply');
		},
		timeout : 1000
	});		
}
</script>
</head>
<body>
<div class="wrap">
<center><h1> 게시물보기 </h1></center>
<table>
<tr class = "top"><th>번호</th><th>이름</th><th>제목</th><th>내용</th></tr>
<?php
	require_once 'login/session.php';
	start_session(); //세션
	if (check_login()) { //로그인시
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$number = $_GET['number'];
			$id = $_GET['id'];
		} 
	} else { //로그인아닐시
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$number = $_GET['number'];
		}
	}
	require_once '../../../includes/mylib.php';
	$db_server = get_connection(); //DB접속
	$select_query = 'SELECT * FROM Jindoohwan.post';
	$result_set = mysqli_query ($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if($number === $row['post_id']) {
			echo '<td>'.$row['post_id'].'</td>';
			$userid = get_user_name($row['user_id']);
			echo '<td>'.$userid.'</td>';
			echo '<td>'.htmlspecialchars($row['title']).'</td>';
			echo '<td>'.htmlspecialchars($row['content']).'</td>';
		}
	}
	mysqli_close($db_server);
?>
</table><br>
<?php 
	if (check_login()) { //로그인 
		if($id == $userid) {
			echo "<a href = \"delete/delete.php?id=".$id."&number=".$number."\"><button>게시판삭제</button></a> "; 
			echo "<a href = \"change/change.php?id=".$id."&number=".$number."\"><button>게시판수정</button></a><br>";
			echo "<br><br>";
		}
	}
?>

<h3>댓글</h3>
<?php
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = 'SELECT * FROM Jindoohwan.comment';
	$result_set = mysqli_query ($db_server, $select_query);
	if (check_login()) { 
		echo '<table id="reply_table">';
		echo '<tr><th>작성자</th>';
		echo '<th>내용</th>';
		echo '<th colspan=2>수정/삭제</th></tr>';
		while ($row = mysqli_fetch_assoc($result_set)) {
			if ($number === $row['post_id']) {
				echo '<tr>';
				echo '<td id="reply_id'.$row['comment_id'].'">'.$row['writer'].'</td>';
				echo '<td id='.$row['comment_id'].'>'.htmlspecialchars($row['content']).'</td>';
				echo '<td>';
				echo '<form action="change2_db.php" method="post">';
				echo '<input type="hidden" name="id" value='.$id.'>';
				echo '<input type="hidden" name="post_id" value='.$number.'>';
				echo '<input type="hidden" name="comment_id" value='.$row['comment_id'].'>';
				if($id == $row['writer']) { //자신의 댓글만 수정/삭제 가능
					echo '<input type="button" value="수정" onClick="editReply(this,'.$row['comment_id'].',this.form)">';
					} else {
						echo '<input type="button" value="수정" disabled="true" onClick="editReply(this,'.$row['comment_id'].',this.form)">';
					}
				echo '</form>';
				echo '</td>';
				echo '<td>';
				if($id == $row['writer']) {
					echo '<input type="button" value="삭제" 
					onClick="deleteReply('.$row['comment_id'].')">';
				} else {
					echo '<input type="button" value="삭제" disabled="true"
					onClick="deleteReply('.$row['comment_id'].')">';
				}
				echo '</td>';
				echo '</tr>';
			}
		}
		echo '</table>';
	}
	mysqli_close($db_server);
?>
<br><br>
<?php
	if (check_login()) { //로그인시 댓글쓰기 가능
		echo "<a href = \"comment/comment.php?id=".$id."&number=".$number."\"><button>댓글쓰기</button></a> "; 
	}
?>
	<input type="button" id="show_more_reply_button" value="댓글 더보기" style="float: right;" 
		onclick="showMoreReplies(this);"> </input><br><br>   
	<script>showMoreReplies(document.getElementById('show_more_reply_button')); </script>
<br><a class="w_btn" href = "main.php?id=<?php echo $id; ?>">메인으로</a><br>
</div>
</body>
</html>
