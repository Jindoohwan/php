<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/JavaScript" src="sha512.js"></script> 
<script type="text/JavaScript" src="check_form.js"></script> 
</head>
<body>
<div class="wrap">
<h1>가입할 회원 정보를 입력하시오</h1><br>
<form action="register.php" method="post">
	<table>
		<tr><td>아이디(이름):</td><td><input type="text" name="id"></td></tr>
		<tr><td>비번:</td><td><input type="text" name="password"></td></tr>
		<tr><td>비번확인:</td><td><input type="text" name="password2"></td></tr>
	</table>
	<br><input class="r_btn" type="button" value="가입" onclick=
		"checkRegisterForm(this.form, this.form.id, this.form.password, this.form.password2);"><br>
</form>
</div>
</body>
</html>