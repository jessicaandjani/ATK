<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$first_name = $_POST["firstname"];
	$last_name = $_POST["lastname"];
	$sid = $_POST["sid"];
	$telephone = $_POST["telephone"];
	$email = $_POST["email"];
	$pageid = $_POST["pageid"];
	var_dump ($pageid);
	$name = $first_name . " " . $last_name;
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());
	/* ID User */
	$sql_user = "SELECT `ID_User` FROM `t_user` WHERE (`SID` = '$sid')";
	$result_user = mysql_query($sql_user);
	if (!$result_user) {
		die('Could not query:' . mysql_error());
	}	
	$id_user = mysql_result($result_user, 0);
	if (!$id_user) {
		if(empty($telephone)){
			$sql_new_user = "INSERT INTO `t_user`(`Nama_User`, `SID`, `Telephone`, `Email`) VALUES ('$name', '$sid', '0', '$email')";
		} else {
			$sql_new_user = "INSERT INTO `t_user`(`Nama_User`, `SID`, `Telephone`, `Email`) VALUES ('$name', '$sid', '$telephone', '$email')";
		}
		$result_new_user = mysql_query($sql_new_user);	
		if (!$result_new_user) {
			die('Could not query:' . mysql_error());
		}	
	}
	if ($pageid == 'booking'){
		header("HTTP/1.1 307 Temporary Redirect");
		header("Location: /ATK/booking.php");
	} else if ($pageid = 'usage'){
		header("HTTP/1.1 307 Temporary Redirect");
		header("Location: /ATK/usage.php");
	}
	
	mysql_close();
	 
?>