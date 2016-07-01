<?php 
	function get_connection() {
		$db_hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';;
		$db_database = 'Jindoohwan';
		$db_username = 'Jindoohwan';
		$db_password = 'password';
		
		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		mysqli_query($db_server, "SET NAMES 'utf8'");
		if (!$db_server) {
		die('Mysql connection failed: '.mysqli_connect_error());
		}
		
		return $db_server;
	}
	
	function get_user_name($user_id) { //유저아이디 번호로 이름 찾는 함수
	require_once '../../../includes/mylib.php';
	$db_server = get_connection();
	$select_query = "SELECT user_id, username FROM user";
	$result_set = mysqli_query($db_server, $select_query);
	while ($row = mysqli_fetch_assoc($result_set)) {
		if ($row['user_id'] == $user_id) {
			return $row['username'];
		}
	}
}
?>