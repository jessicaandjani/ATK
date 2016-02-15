<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "atk";
	$book_id = $_GET["id"];
	// echo json_encode(array('id' => $book_id));
	$connection = mysql_connect($servername, $username, $password) or die(mysql_error());
	@mysql_select_db('atk') or die(mysql_error());

	/* Data Pemakaian */
	$data_pemesanan = "SELECT `Tgl_Pengambilan`, `Jumlah`, `ID_ATK`, `ID_User` FROM `t_pemesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	$result_data = mysql_query($data_pemesanan);
	$date = mysql_result($result_data, 0, "Tgl_Pengambilan");
	$jumlah = mysql_result($result_data, 0, "Jumlah");
	$id_atk = mysql_result($result_data, 0, "ID_ATK");
	$id_user = mysql_result($result_data, 0, "ID_User");
	if (!$result_data) {
    	die('Could not query:' . mysql_error());
	}	
	
	/* Delete */
	$sql_delete = "DELETE FROM `t_pemesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	mysql_query($sql_delete);
	/* Insert */
	$sql_insert = "INSERT INTO `t_pemakaian`(`Tgl_Pemakaian`, `Jumlah`, `ID_ATK`, `ID_User`) VALUES ('$date', '$jumlah', '$id_atk', '$id_user')";
	mysql_query($sql_insert);
	mysql_close();
?>