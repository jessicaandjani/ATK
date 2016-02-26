<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>iBH - Home</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <!-- Dropdown Structure -->
  <nav class="amber darken-1" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo white-text">iBH</a>
    </div>
  </nav>
  
  <div class="container" style="margin-top:200px;">
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "atk";
        $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
        @mysql_select_db('atk') or die(mysql_error());
        $alert_id = $_GET["id"];
        $atk = $_GET["atk"];
          // ATK
          $sql_atk_habis = "SELECT `Jenis_ATK` FROM `t_atk` WHERE (`ID_ATK` = '$atk')";
          $result_atk_habis = mysql_query($sql_atk_habis);
          $atk_habis = mysql_result($result_atk_habis, 0);
        if ($alert_id == 1) {
      ?>
        <center><h3>Out of Order <?= $atk_habis ?></h3>
          <button class="btn waves-effect waves-light" onclick="window.history.back();">Back</button>
        </center>
      <?php } else if($alert_id == 2) {
            $stok_atk = $_GET["stok"];
       ?>
        <center><h3><?= $atk_habis ?> Only Available <?= $stok_atk ?></h3>
          <button class="btn waves-effect waves-light" onclick="window.history.back();">Back</button>
        </center>
      <?php } else if($alert_id == 3) { ?>
        <center><h3>Success! Thank you</h3>
          <button class="btn waves-effect waves-light" onclick="window.location.href='/atk/bhistory.php';">Back</button>
        </center>
      <?php } else if($alert_id == 4) { ?>
        <center><h3>Success! Thank you</h3>
          <button class="btn waves-effect waves-light" onclick="window.location.href='/atk/uhistory.php';">Back</button>
        </center>
      <?php } ?>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
