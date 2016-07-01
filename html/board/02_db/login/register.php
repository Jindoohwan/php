<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrap">
<?php
	require_once 'session.php';
	require_once '../../../../includes/mylib.php';
	if(isset($_POST['id'], $_POST['password'])) {
		$id = $_POST['id'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$db_server = get_connection();
		$insert_query = "INSERT INTO user(username, password) values('" . $id . "','" .$password. "') ";
		if (mysqli_query($db_server, $insert_query) === false) {
			echo mysqli_error($db_server);
		} 
		else {
			echo "회원가입 성공..! <br><br>";
			echo "<a class = 'w_btn' href='index.php'>로그인화면으로</a><br>";
		}
	}
	else {
		echo '회원가입 폼 에러..!';
	}
	mysqli_close($db_server);
?>
</div>
</body>
</html>