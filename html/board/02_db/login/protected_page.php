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
	start_session();
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$id = $_GET['id'];	
	}
	if (check_login()) {
		echo "<h1>로그인 성공!</h1>";
?>
		<form action="../main.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="submit" value="메인메뉴로 돌아가기">
		</form>
<?php
	} else {
		header("Location: error.php?error_code=3");
	}
?>
</div>
</body>
</html>
