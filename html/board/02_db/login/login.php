<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	require_once 'session.php';
	start_session();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$password = $_POST['password'];
	
		if (try_to_login($id, $password) ==	 true) {
			header('Location: protected_page.php?id='.$id);
		} else {
			header('Location: error.php?error_code=1');
		}
	} else {
		echo '로그인 폼 에러..!';
	}
?>
</body>
</html>