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

	/* ID User */
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
	$sql = "INSERT INTO `t_pemesanan`(`Tgl_Pemesanan`, `Tgl_Pengambilan`, `ID_User`) VALUES (now(), '$date', '$id_user')";
	mysql_query($sql);
	
	/* ID User */
	$sql_ID = "SELECT * FROM `t_pemesanan` ORDER BY `ID_Pemesanan` DESC LIMIT 1";
	$result_ID = mysql_query($sql_ID);
	if (!$result_ID) {
		die('Could not query:' . mysql_error());
	}
	$id_pemesanan = mysql_result($result_ID, 0);
	/* Stok ATK */
	$x = 0;
	foreach($atk as $value){
		$sql_stok = "SELECT `Stok_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$value')";
		$result_stok = mysql_query($sql_stok);
		$stok_atk = mysql_result($result_stok, 0);
		if (!$result_stok) {
			die('Could not query:' . mysql_error());
		}	
		/* Cek Stok */
		if($stok_atk == 0) {
			$message = "Out of order";
			echo("<script type='text/javascript'>alert('$message');</script>");
		} else if ($stok_atk < $jumlah[$x]) {
			$message = "Only available " . $stok_atk;
			echo("<script type='text/javascript'>alert('$message');</script>");
		} else {
			$sql = "INSERT INTO `t_pesanan`(`ID_Pemesanan`, `ID_ATK`, `Jumlah`) VALUES ('$id_pemesanan', '$value', '$jumlah[$x]')";
			mysql_query($sql);
			$sql_atk = "UPDATE `t_atk` SET `Stok_ATK` = `Stok_ATK` - '$jumlah[$x]' WHERE (`ID_ATK` = '$value')";
			mysql_query($sql_atk);
			$x++;
		}
	}
	$message = "Booking success! Thank you";
	echo("<script type='text/javascript'>alert('$message');</script>");
	header("Location: /ATK/booking.html");
	mysql_close();
	
?>