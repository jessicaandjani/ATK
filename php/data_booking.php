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
			/* ID USser */
			$sql_user = "SELECT `ID_User` FROM `t_user` WHERE (`Nama_User` = '$user_name')";
			$result_user = mysql_query($sql_user);
			$id_user = mysql_result($result_user, 0);
			if (!$result_user) {
				die('Could not query:' . mysql_error());
			}
			$sql = "INSERT INTO `t_pemesanan`(`Tgl_Pemesanan`, `Jumlah`, `Tgl_Pengambilan`, `ID_ATK`, `ID_User`) VALUES (now(), '$jumlah[$x]', '$date', '$value', '$id_user')";
			mysql_query($sql);
			$sql_atk = "UPDATE `t_atk` SET `Stok_ATK` = `Stok_ATK` - '$jumlah[$x]' WHERE (`ID_ATK` = '$value')";
			mysql_query($sql_atk);
			$x++;

		}
	}
	//header("Location: /ATK/booking.html");
	mysql_close();
	
?>