<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$user_name = $_POST["name"];
	$atk = $_POST["jenis_atk"];
	$jumlah = $_POST["quantity"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());

	/* Stok ATK */
	$sql_stok = "SELECT `Stok_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$atk')";
	$result_stok = mysql_query($sql_stok);
	$stok_atk = mysql_result($result_stok, 0);
	if (!$result_stok) {
    	die('Could not query:' . mysql_error());
	}	

	/* Cek Stok */
	if($stok_atk == 0) {
		$message = "Out of order";
		echo("<script type='text/javascript'>alert('$message');</script>");
	} else if ($stok_atk < $jumlah) {
		$message = "Only available " . $stok_atk;
		echo("<script type='text/javascript'>alert('$message');</script>");
	} else {
		/* ID USser */
		$sql_user = "SELECT `ID_User` FROM `t_user` WHERE (`Nama_User` = '$user_name')";
		$result_user = mysql_query($sql_user);
		$id_user = mysql_result($result_user, 0);
		if (!$result_user) {
	    	die('Could not query:' . mysql_error());
		}	

		$sql = "INSERT INTO `t_pemakaian`(`Tgl_Pemakaian`, `Jumlah`, `ID_ATK`, `ID_User`) VALUES (now(), '$jumlah', '$atk', '$id_user')";
		mysql_query($sql);
		$sql_atk = "UPDATE `t_atk` SET `Stok_ATK` = `Stok_ATK` - '$jumlah' WHERE (`ID_ATK` = '$atk')";
		mysql_query($sql_atk);
		header("Location: /ATK/usage.html");
	}
	mysql_close();
	
?>