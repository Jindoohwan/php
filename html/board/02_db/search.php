<?php
if (isset($_GET['src_value'])) {
	$search = $_GET['src_value'];
	
	header("Location : main.php");
} else {
	header("Location : main.php");
}
