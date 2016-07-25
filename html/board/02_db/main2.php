<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<?php 
	require_once 'login/session.php';
	start_session();
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $_GET['id'];
		}
		echo '['.$id.']님<br>';
?>	
	<a href = "main.php?id=<?php echo $id; ?>">자유게시판</a>
	<a class = "r_btn" href = "login/logout.php"><button>로그아웃</button></a><br><br>

<?php
	} else {
		$id = 0;
?>	
	<a href = "main.php?id=<?php echo $id; ?>">자유게시판</a>
	<a class = "r_btn" href = "login/index.php"><button>로그인하기</button></a><br><br>
<?php
	}
	
?>
<?php
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	//페이징
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$page_num = 5; // 페이지 수
	$page_start = ($page - 1) * $page_num; // 시작번호
	$page_end = $page * $page_num; // 끝번호
	
	$page_query = "SELECT count(*) as count FROM post WHERE board_id = 1 ORDER BY post_id DESC";
	$page_result = mysqli_query($db_server, $page_query);
	$tmp = mysqli_fetch_assoc($page_result);
	$total_post = $tmp['count'];
	$total_page = ($total_post - 1) / $page_num + 1;
	
	$block_num = 5; //블록수
	$curr_block = intval(($page - 1) / $block_num) + 1;
	$block_start = ($curr_block - 1) * $block_num + 1;
	$block_end = $block_start + $block_num;
	
	if ($block_end > $total_page) {
		$block_end = $total_page;
	}
?>
<table>
<tr><th colspan = "3" class = "top"><h2>Q&A게시판</h2></th></tr>
<tr><th>번호</th> <th>제목</th> <th>이름</th></tr>
<?php 
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	if (isset($_GET['src_value'])) {
		$search = $_GET['src_value'];
		$select_query = sprintf("SELECT * FROM post WHERE board_id = 2 AND title LIKE '%%%s%%' ORDER BY post_id DESC LIMIT %d, %d", $search, $page_start, $page_num );
	} else {
		$select_query = sprintf("SELECT * FROM post WHERE board_id = 2 ORDER BY post_id DESC LIMIT %d, %d", $page_start, $page_num);
	}
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		echo "<tr>";
		echo "<td>".$row['post_id']."</td>";
		if (check_login()) {
			printf("<td><a href = \"view_post.php?number=%d&id=%s\">%s </a></td>", $row['post_id'], $id, htmlspecialchars($row['title']));
		} else {
			printf("<td><a href = \"view_post.php?number=%d\">%s </a></td>", $row['post_id'], htmlspecialchars($row['title']));
		}
		echo "<td>".get_user_name($row['user_id'])."</td>"; 
		echo "</tr>";
	}
	mysqli_close($db_server);
?>
</table><br>
<?php
	if($block_start == 1){
		printf("[이전]");
	}else{
		if (isset($_GET['src_value'])) {
			printf("[<a href='./main2.php?page=%d&id=%s&src_value=%s'>이전</a>]", $block_start-1, $id, $search);
		} else {
			printf("[<a href='./main2.php?page=%d&id=%s'>이전</a>]", $block_start-1, $id);
		}
	}
	
	for($i = $block_start ; $i < $block_end ; $i++){
		if($i == $page){
			printf("[<b>%d</b>]", $i);
		}else {
			if (isset($_GET['src_value'])) {
				printf("[<a href='main2.php?page=%d&id=%s&src_value=%s'>%d</a>]", $i, $id,$search, $i);
			}
			else {
				printf("[<a href='main2.php?page=%d&id=%s'>%d</a>]", $i, $id, $i);
			}
		}
	}
	
	if($block_end == $total_page){
		printf("[다음]");
	}else{
		if (isset($_GET['src_value'])) {
			printf("[<a href='./main2.php?page=%d&id=%s&src_value=%s'>다음</a>]", $block_end, $id, $search);
		} else {
			printf("[<a href='./main2.php?page=%d&id=%s'>다음</a>]", $block_end, $id);
		}
	}
?>

<!-- 검색 입력 폼 --><br><br>
<form action="main2.php" method="get">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<select name="src_name">
	<option value="title" selected>제목</option>
	</select>
	<input type="text" name="src_value" size="20">
	<input type="submit" value=검색>
</form><br>
<!-- 전체목록 -->
<form action="main2.php" method="get">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="submit" value=전체목록>
</form>
<?php 
	if (check_login()) {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$id = $_GET['id'];	
		}
		echo "<a class=\"w_btn\" href = \"login/write_post2.php?id=".$id."\">글쓰기</a><br>";
		echo "<br><br>";
	} else {
		echo "<a class=\"w_btn\" href = \"write.php\">글쓰기</a><br>";
		echo "<br><br>";
	}  
	//메인
	echo "<a class=\"w_btn\" href = \"../../index.php?id=".$id."\">메인으로</a><br>";
?> 
</div>
</body>
</html>