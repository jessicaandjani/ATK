<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$user_name = $_POST["name"];
	$atk = $_POST["jenis_atk"];
	$jumlah = $_POST["quantity"];
	$date = $_POST["date_booking"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());
	$sql_user = "SELECT `ID_User` FROM `t_User` WHERE (`Nama_User` = '$user_name')";
	$result_user = mysql_query($sql_user);
	$id_user = mysql_result($result_user, 0);
	if (!$result_user) {
    	die('Could not query:' . mysql_error());
	}
	$sql = "INSERT INTO `t_pemesanan`(`Tgl_Pemesanan`, `Jumlah`, `Tgl_Pengambilan`, `ID_ATK`, `ID_User`) VALUES (now(), '$jumlah', '$date', '$atk', '$id_user')";
	mysql_query($sql);
	mysql_close();
	//header("Location: /ATK/sample.html");
?>