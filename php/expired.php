<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$book_id = $_GET["id"];
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());

	/* Data Pemesanan */
	$data_pemesanan = "SELECT `ID_ATK`, `Jumlah` FROM `t_pesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	$result_data = mysql_query($data_pemesanan);
	if (!$result_data) {
		die('Could not query:' . mysql_error());
	}	
	$id_atk = mysql_result($result_data, 0, "ID_ATK");
	$jumlah_atk = mysql_result($result_data, 0, "Jumlah");
	
	/* Stok ATK */
	$sql_stok = "SELECT `Stok_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$id_atk')";
	$result_stok = mysql_query($sql_stok);
	if (!$result_stok) {
		die('Could not query:' . mysql_error());
	}	
	$stok_atk = mysql_result($result_stok, 0);

	/* Update Database */
	$sql_atk = "UPDATE `t_atk` SET `Stok_ATK` = `Stok_ATK` + '$jumlah_atk' WHERE (`ID_ATK` = '$id_atk')";
	mysql_query($sql_atk);
	
	/* Delete */
	$sql_delete = "DELETE FROM `t_pesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	mysql_query($sql_delete);
	$sql_delete = "DELETE FROM `t_pemesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	mysql_query($sql_delete);
	mysql_close();
?>