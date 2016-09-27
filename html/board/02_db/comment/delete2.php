<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$comment_id = $_POST['comment_id'];
	}
	require_once '../../../../includes/mylib.php';
	$db_server = get_connection();
	$delete_query = "DELETE FROM comment WHERE comment_id = ".$comment_id."";
	mysqli_query($db_server, $delete_query); 
	if (mysqli_query($db_server, $delete_query) === false){
		echo mysqli_error($db_server);
	}
	mysqli_close($db_server);

