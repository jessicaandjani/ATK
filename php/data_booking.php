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

	/* Stok ATK */
	$sql_stok = "SELECT `Stok_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$atk')";
	$result_stok = mysql_query($sql_stok);
	$stok_atk = mysql_result($result_stok, 0);
	if (!$result_stok) {
    	die('Could not query:' . mysql_error());
	}	

	echo $user_name;
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
		//var_dump($result_user);
		if (!$result_user) {
	    	die('Could not query:' . mysql_error());
		}	
		$id_user = mysql_result($result_user, 0);
		if (!$id_user) {
			$sql_new_user = "INSERT INTO `t_user`(`Nama_User`) VALUES ('$user_name')";
			mysql_query($sql_new_user);	
			$sql_new_id = "SELECT `ID_User` FROM `t_user` WHERE (`Nama_User` = '$user_name')";
			$result_id_user = mysql_query($sql_user);
			if (!$result_id_user) {
	    		die('Could not query:' . mysql_error());
	    	}
	    	$id_user = mysql_result($result_id_user, 0);
			//echo $id_user;
		}
		$sql = "INSERT INTO `t_pemesanan`(`Tgl_Pemesanan`, `Jumlah`, `Tgl_Pengambilan`, `ID_ATK`, `ID_User`) VALUES (now(), '$jumlah', '$date', '$atk', '$id_user')";
		mysql_query($sql);
		$sql_atk = "UPDATE `t_atk` SET `Stok_ATK` = `Stok_ATK` - '$jumlah' WHERE (`ID_ATK` = '$atk')";
		mysql_query($sql_atk);
		header("Location: /ATK_Test/booking.html");
	}
	//header("Location: /ATK_Test/booking.html");
	mysql_close();
	
?>