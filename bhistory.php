<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>iBH - Booking History</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
        <div class = "container">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "atk";
            $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
            @mysql_select_db('atk') or die(mysql_error());
            $query = "SELECT * FROM `t_pemesanan` NATURAL JOIN `t_pesanan`";
            $result = mysql_query($query);
            $num = mysql_num_rows($result);
          ?>
          <table class = "highlight centered">
              <thead>
              <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Items</th>
                  <th>Qty</th>
                  <th>Booking Date</th>
                  <th>Due Date</th>
              </tr>
              </thead>
              <tbody>
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
                  $id = "bhistory_list" . $book_id;
              ?>         
              <tr id="<?= $id ?>">
                <?php 
                if($i!= 0) {
                    $book_id_before = mysql_result($result, $i-1, "ID_pemesanan");
                    if($book_id != $book_id_before) { ?>
                      <td><?= $book_id ?></td>
                      <td><?= $user_name ?></td>
                      <td><?= $atk_name ?></td>
                      <td><?= $jumlah ?></td>
                      <td><?= $date_book ?></td>
                      <td><?= $date ?></td>
                      <td>
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Take</a>
                      </td>
                    <?php } else { ?>
                      <td></td>
                      <td></td>
                      <td><?= $atk_name ?></td>
                      <td><?= $jumlah ?></td>
                      <td><?= $date_book ?></td>
                      <td><?= $date ?></td>
                  <?php } ?>
                <?php } else { ?>
                  <td><?= $book_id ?></td>
                  <td><?= $user_name ?></td>
                  <td><?= $atk_name ?></td>
                  <td><?= $jumlah ?></td>
                  <td><?= $date_book ?></td>
                  <td><?= $date ?></td>
                  <td>
                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Take</a>
                  </td>
                <?php } ?>
              </tr>
              </tbody>
              <?php $i++; } ?>
              <?php mysql_close(); ?> 
          </table>
      </div>
      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h5>Are you sure want to take this items ?</h5>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
          <a class=" modal-action modal-close waves-effect waves-green btn-flat" id="submit-button" data-id="<?= $book_id?>">Yes</a>
        </div>  
      </div>
    </body>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    
    <script>
      $(document).ready(function(){
        $('.modal-trigger').leanModal();
      });
    </script>

    <script type="text/javascript">
      $("a#submit-button").on("click", function(){
        var listID = $(this).data("id");
        $('tr#bhistory_list' + listID).remove();
        $.get("php/delete_booking.php?id="+ listID, function(data, status){
          window.location.href="/atk/bhistory.php";
        });
      });
    </script>
</html>
