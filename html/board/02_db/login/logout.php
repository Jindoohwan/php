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
	try_to_logout();
	destroy_session();
	
	echo '로그아웃 성공..!';
?>
<br><br><a class="w_btn" href = "../main.php">메인으로</a>