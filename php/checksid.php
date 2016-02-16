<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());
	if (isset($_POST['user_sid'])){
		$sid = $_POST["user_sid"];	
		/* ID User */
		$sql_user = "SELECT `Nama_User` FROM `t_user` WHERE (`SID` = '$sid')";
		$result_user = mysql_query($sql_user);
		if (!$result_user) {
			die('Could not query:' . mysql_error());
		}
		if (mysql_num_rows($result_user) > 0) {
			$nama_user = mysql_result($result_user , 0);
			echo $nama_user;
		} else {
			echo "Please Register Customer Identity";
		}
		exit();
		mysql_close();
	}
?>