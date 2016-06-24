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
?>