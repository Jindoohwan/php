<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/JavaScript" src="sha512.js"></script> 
<script type="text/JavaScript" src="check_form.js"></script> 
<script>
function tryLogin(form, password) {
    var hash = document.createElement('input');
    form.appendChild(hash);
    hash.name = 'hash';
	hash.type = 'hidden';
	hash.value = hex_sha512(password.value);
    password.value = '';
	form.submit();
	return true;
}
</script>
</head>
<body>
<div class="wrap">
<?php
	require_once 'session.php';
	start_session();
	if (check_login()) {
?>
	<h1>현재 로그인 되어 있는 상태입니다</h1>
	<form action="logout.php" method="get">
		<input type="submit" value="로그아웃">
	</form>	
<?php
	} else {
?>
	<h1>로그인 하십시오</h1>
	<form action="login.php" method="post">
	<table>
		<tr><td>아이디(이름):</td><td><input type="text" name="id"></td></tr>
		<tr><td>비번:</td><td><input type="text" name="password" onfocus="if(this.value =='') { this.value=''; this.type='password'; }"></td></tr>
	</table>
		<br><input class="r_btn" type="button" value="로그인" onclick="tryLogin(this.form, this.form.password);"><br><br>
	</form>
	<h1>회원이 아니라면 가입하십시오</h1>
	<form action="register_page.php" method="get">
		<input class="r_btn" type="submit" value="회원가입">
	</form>
<?php
	}
?>
	<br><br><a class="w_btn" href = "../main.php">메인으로</a>
</div>
</body>
</html>



	