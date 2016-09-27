<?php
//db 접속
function get_connection() {
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$database = 'Jindoohwan';
	$username = 'Jindoohwan';
	$password = 'password';
	
	$db_server = mysqli_connect($hostname, $username, $password, $database);
	mysqli_query($db_server, "SET NAMES 'utf8'");
	if (!$db_server) {
		die('Mysql connection failed: '.mysqli_connect_error());
	}
	
	return $db_server;
}

// 쿠키 생성
function start_session() {
	$secure = false;
	$httponly = true;
	
	if (ini_set('session.use_only_cookies', 1) === false) {
		header("Location: error.php?error_code=2");
		exit();
	}
	
    $params = session_get_cookie_params();
    session_set_cookie_params($params["lifetime"],
        $params["path"], 
        $params["domain"], 
        $secure, $httponly);
 
    session_start();
    session_regenerate_id();
}

// 쿠키 삭제
function destroy_session() {
	$_SESSION = array();
	$params = session_get_cookie_params();
	
	setcookie(session_name(), '', 0, 
		$params['path'], $params['domain'], $params['secure'], isset($params['httponly'])); 
	session_destroy();
}

function try_to_login($id, $password) {
	if (check_user_account($id, $password)) {
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['id'] = $id;
		$_SESSION['password'] = $password;
		$_SESSION['login_status'] = true;
		return true;
	} else {
		return false;
	}
}

function try_to_logout() {
	if (check_login()) {
		$_SESSION['login_status'] = false;
	} else {
	}
}

function check_login() {
	return isset($_SESSION['ip'], $_SESSION['user_agent'], $_SESSION['login_status']) && 
		$_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] && 
		$_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] &&
		$_SESSION['login_status'];
}

function check_user_account($id, $password) {
	$conn = get_connection();
	// statement : 명제
	$stmt = mysqli_prepare($conn, "SELECT password FROM JDuser WHERE name = ?");
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) === 0) {
		echo '4';
		// header('Location: error.php?error_code=1');
		header('Location: /');
	} else {
		$row = mysqli_fetch_assoc($result);
		$hash = $row["password"];
		return password_verify($password, $hash); //db에 있는 password 255로해야한다.
	}
	mysqli_free_result($result);
	mysqli_close($conn);
}

//user_id => name
function get_user_name($conn, $user_id) {
	$query = sprintf("SELECT name FROM JDuser WHERE user_id = '%d'", $user_id);
	$result = mysqli_query($conn, $query);
	if ($result === false) {
		die ("Database access failed: ".mysqli_error());
	}
	$row = mysqli_fetch_assoc($result);
	return $row['name'];
}

// $_SESSION['id'] = name -> id
// get_user_id($conn, $_SESSION['id']);
function get_user_id($conn, $name) {
	$query = sprintf("SELECT user_id FROM JDuser WHERE name = '%s'", $name);
	$result = mysqli_query($conn, $query);
	if ($result === false) {
		die ("Database access failed: ".mysqli_error());
	}
	$row = mysqli_fetch_assoc($result);
	return $row['user_id'];
}