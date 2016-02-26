<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$user_id = $_POST["sid"];
	$atk = $_POST["jenis_atk"];
	$jumlah = $_POST["quantity"];
	$date = $_POST["date_booking"];
	
	if (strtotime($date) < strtotime('now')){
		$message = "Invalid Date";
		echo("<script type='text/javascript'>alert('$message');
				window.history.back();
			  </script>");		
		exit;
	}
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());
	/* ID User */
	$sql_user = "SELECT `ID_User` FROM `t_user` WHERE (`SID` = '$user_id')";
	$result_user = mysql_query($sql_user);
	if (!$result_user) {
		die('Could not query:' . mysql_error());
	}	
	$id_user = mysql_result($result_user, 0);
	if (!$id_user) {
		echo "Please Fill Up Customer Identity";
		exit;
	} else {
		echo "OK";
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
	
	$x = 0;
	$habis = false;
	$sisa = false;
	while (($x < count($atk)) && (!$habis) && (!$sisa)) {
		$value = $atk[$x];
		/* Stok ATK */
		$sql_stok = "SELECT `Stok_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$value')";
		$result_stok = mysql_query($sql_stok);
		if (!$result_stok) {
			die('Could not query:' . mysql_error());
		}	
		$stok_atk = mysql_result($result_stok, 0);

		/* Cek Stok */
		if($stok_atk == 0) {
			$habis = true;
			$sql_atk_habis = "SELECT `Jenis_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$value')";
			$result_atk_habis = mysql_query($sql_atk_habis);
			$atk_habis = mysql_result($result_atk_habis, 0);
		} else if ($stok_atk < $jumlah[$x]) {
			$sisa = true;
			$sql_atk_sisa = "SELECT `Jenis_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$value')";
			$result_atk_sisa = mysql_query($sql_atk_sisa);
			$atk_sisa = mysql_result($result_atk_sisa, 0);
		} else {
			$sql = "INSERT INTO `t_pesanan`(`ID_Pemesanan`, `ID_ATK`, `Jumlah`) VALUES ('$id_pemesanan', '$value', '$jumlah[$x]')";
			mysql_query($sql);
			$sql_atk = "UPDATE `t_atk` SET `Stok_ATK` = `Stok_ATK` - '$jumlah[$x]' WHERE (`ID_ATK` = '$value')";
			mysql_query($sql_atk);
			$x++;
		}
		$atk_id = $value;
	}
	if($habis == true) {
		echo("<script type='text/javascript'> 
				window.location.href='/atk/alert.php?id=1&atk=$atk_id';
			  </script>");
	} else if ($sisa == true) {
		echo("<script type='text/javascript'>
				window.location.href='/atk/alert.php?id=2&atk=$atk_id&stok=$stok_atk';
			 </script>");

	} else {
		echo("<script type='text/javascript'>
				window.location.href='/atk/alert.php?id=3&atk=$atk_id';
			  </script>");
	}
	mysql_close();
?>