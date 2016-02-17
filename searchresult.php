<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>iBH - Usages History</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content white-text">
      <li><a href="uSID.html">Usages</a></li>
      <li><a href="uhistory.php">History</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content white-text">
      <li><a href="SID.html">Start Your Booking</a></li>
      <li><a href="bhistory.php">History</a></li>
    </ul>
  <nav class="amber darken-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.html" class="brand-logo white-text">iBH</a>
      <ul class="right hide-on-med-and-down">
        <li><a class="dropdown-button white-text" data-activates="dropdown2"><i class="material-icons left">dialpad</i><i class="material-icons right">arrow_drop_down</i>Booking Transactions</a></li>
        <li><a class="dropdown-button white-text" data-activates="dropdown1"><i class="material-icons left">trending_up</i><i class="material-icons right">arrow_drop_down</i>Usages Transactions</a></li>
        <li><a href="statistics.php" class="white-text"><i class="material-icons left">equalizer</i>Statistics</a></li>
        <li><a href="about.html" class="white-text"><i class="material-icons left">supervisor_account</i>About</a></li>
      </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="booking.html"><i class="material-icons left">dialpad</i>Booking Transactions</a>
            <li><a href="usage.html"><i class="material-icons left">trending_up</i>Usage History</a>
            <li><a href="statistics.php"><i class="material-icons left">equalizer</i>Statistics</a></li>
            <li><a href="#!"><i class="material-icons left">supervisor_account</i>About</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>
      <div class ="container">
            <div class="row">
                <h2>Booking History</h2>
            </div>
        </div>
		<div class="container">
		<nav class = "amber darken-1">
			<div class="nav-wrapper">
			  <form action="searchresult.php" method="POST">
				<div class="input-field">
				  <input id="search" name="search" type="search" required>
				  <label for="search"><i class="material-icons">search</i></label>
				  <!-- I've put "red-text" class to emphasize -->
				  <i class="material-icons white-text">close</i>
				</div>
			  </form>
			</div>
		  </nav>
		</div>
        <div class = "container">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "atk";
            $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
            @mysql_select_db('atk') or die(mysql_error());
			$search_query = $_POST["search"];
            $query = "SELECT * FROM `t_user` NATURAL JOIN `t_pemesanan` NATURAL JOIN `t_atk` NATURAL JOIN `t_pesanan` WHERE `SID` LIKE '%$search_query%' OR `Nama_User` LIKE '%$search_query%' OR `Jenis_ATK` LIKE '%$search_query%' OR `Tgl_Pengambilan` LIKE '%$search_query%'";
            $result = mysql_query($query);
            $num = mysql_num_rows($result);
          ?>
          <table class = "highlight centered">
              <thead>
              <tr>
                  <th>No</th>
				  <th>SID/SSN</th>
                  <th>User</th>
                  <th>Items</th>
                  <th>Qty</th>
                  <th>Booking Date</th>
                  <th>Due Date</th>
				  <th>Status</th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <?php   
                $i = 0;
                while($i < $num) {
                  $book_id = mysql_result($result, $i, "ID_pemesanan");
                  $jumlah = mysql_result($result, $i, "jumlah");
                  $date_book = mysql_result($result, $i, "Tgl_Pemesanan");
                  $date = mysql_result($result, $i, "Tgl_Pengambilan");
                  $atk_id = mysql_result($result, $i, "ID_ATK");
                  /* nama atk */
                  $query_atk = "SELECT Jenis_ATK FROM `t_atk` WHERE (`ID_ATK` = '$atk_id')";
                  $result_atk = mysql_query($query_atk);
                  $atk_name = mysql_result($result_atk, 0);

                  $user_id = mysql_result($result, $i, "ID_User");
                  /* nama user */
                  $query_user = "SELECT Nama_User FROM `t_user` WHERE (`ID_User` = '$user_id')";
                  $result_user = mysql_query($query_user);
                  $user_name = mysql_result($result_user, 0);
				  $query_user = "SELECT SID FROM `t_user` WHERE (`ID_User` = '$user_id')";
				  $result_user = mysql_query($query_user);
                  $user_sid = mysql_result($result_user, 0);
                  $id = "bhistory_list" . $book_id;
              ?>         
              <tr id="<?= $id ?>">
                <?php 
                if($i!= 0) {
                    $book_id_before = mysql_result($result, $i-1, "ID_pemesanan");
                    if($book_id != $book_id_before) { ?>
                      <td><?= $i+1 ?></td>
					  <td><?= $user_sid ?></td>
                      <td><?= $user_name ?></td>
                      <td><?= $atk_name ?></td>
                      <td><?= $jumlah ?></td>
                      <td><?= $date_book ?></td>
                      <td><?= $date ?></td>
                      <td>
                        <?php if (strtotime($date) < strtotime('now')) { ?>
                          <button class="btn waves-effect waves-light red" type="submit" name="action" id="submit-button2" data-id="<?= $book_id?>" value="Submit">Expired
                          </button>
                        <?php } else { ?>
                          <button class="btn waves-effect waves-light" type="submit" name="action" id="submit-button1" data-id="<?= $book_id?>" value="Submit">Healthy
                          </button>
                        <?php } ?>
                      </td>
                    <?php } else { ?>
                      <td></td>
					  <td></td>
                      <td></td>
                      <td><?= $atk_name ?></td>
                      <td><?= $jumlah ?></td>
                      <td><?= $date_book ?></td>
                      <td><?= $date ?></td>
                  <?php } ?>
                <?php } else { ?>
                  <td><?= $i+1 ?></td>
				  <td><?= $user_sid ?></td>
                  <td><?= $user_name ?></td>
                  <td><?= $atk_name ?></td>
                  <td><?= $jumlah ?></td>
                  <td><?= $date_book ?></td>
                  <td><?= $date ?></td>
                  <td>
                     <?php if (strtotime($date) < strtotime('now')) { ?>
                      <button class="btn waves-effect waves-light red" type="submit" name="action" id="submit-button2" data-id="<?= $book_id?>" value="Submit">Expired
                      </button>
                    <?php } else { ?>
                      <button class="btn waves-effect waves-light" type="submit" name="action" id="submit-button1" data-id="<?= $book_id?>" value="Submit">Healthy
                      </button>
                    <?php } ?>
                  </td>
                <?php } ?>
              </tr>
              </tbody>
              <?php $i++; } ?>
              <?php mysql_close(); ?> 
          </table>
      </div>
	  <br><br>
	  <div class="container">
	  <div class="row center">
			<a class="btn waves-effect waves-light" href="bhistory.php">Clear
              <i class="material-icons right">send</i>
          </a>
        </div>
		</div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
	<script>
      $(document).ready(function(){
        $('.modal-trigger').leanModal();
      });
    </script>

      <script type="text/javascript">
      $("button#submit-button1").on("click", function(){
        var listID = $(this).data("id");
        $('tr#bhistory_list' + listID).remove();
        $.get("php/delete_booking.php?id="+ listID, function(data, status){
          window.location.href="/atk/bhistory.php";
        });
      });
    </script>

     <script type="text/javascript">
      $("button#submit-button2").on("click", function(){
        console.log("hello");
        var listID = $(this).data("id");
        $('tr#bhistory_list' + listID).remove();
        $.get("php/expired.php?id="+ listID, function(data, status){
          window.location.href="/atk/bhistory.php";
        });
      });
    </script>
</html>
