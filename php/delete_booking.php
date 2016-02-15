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
	$data_pemesanan = "SELECT `Tgl_Pengambilan`, `Jumlah`, `ID_ATK`, `ID_User` FROM `t_pemesanan` NATURAL JOIN `t_pesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	$result_data = mysql_query($data_pemesanan);
	$num = mysql_num_rows($result_data);
	$i = 0;
	while ($i < $num){
		$date = mysql_result($result_data, $i, "Tgl_Pengambilan");
		$jumlah = mysql_result($result_data, $i, "Jumlah");
		$id_atk = mysql_result($result_data, $i, "ID_ATK");
		$id_user = mysql_result($result_data, $i, "ID_User");
		/* Insert */
		$sql_insert = "INSERT INTO `t_pemakaian`(`Tgl_Pemakaian`, `Jumlah`, `ID_ATK`, `ID_User`) VALUES (now(), '$jumlah', '$id_atk', '$id_user')";
		mysql_query($sql_insert);
		$i++;
	}
	
	/* Delete */
	$sql_delete = "DELETE FROM `t_pesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	mysql_query($sql_delete);
	$sql_delete = "DELETE FROM `t_pemesanan` WHERE (`ID_Pemesanan` = '$book_id')";
	mysql_query($sql_delete);
	
	mysql_close();
?>