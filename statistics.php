<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        
        <title>iBH - Statistics</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
	<?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "atk";
            $connection = mysql_connect($servername, $username, $password) or die(mysql_error());
            @mysql_select_db('atk') or die(mysql_error());
			if (isset($_GET["name"])) {
            $nama = $_GET["name"];
			$query1 = "SELECT * FROM `t_user` NATURAL JOIN `t_pemakaian` NATURAL JOIN `t_atk` WHERE `SID` LIKE '%$nama%' OR `Nama_User` LIKE '%$nama%'";
			$result1 = mysql_query($query1);
			if ($result1)
				$num1 = mysql_num_rows($result1);
			}
			else {
				$result1 = false;
				$num1 = 0;
			}
    ?>
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
	<div class = "navbar-fixed">
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
            <li class="active"><a href="#!"><i class="material-icons left">equalizer</i>Statistics</a></li>
            <li><a href="about.html"><i class="material-icons left">supervisor_account</i>About</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>
	  </div>
        <ul class ="collapsible" data-collapsible="expandable" style = "width: 50%; margin: auto; margin-top: 5%;">
            <li>
                <div class ="collapsible-header">ATK usage per period</div>
                <!--<div style="width:90%; height:90%; margin: auto;" class="input-field">-->
				<div style="width:90%; height:90%; margin: auto;" class="row">
					<label class="center">ATK</label><br>
					<form>
					<div class="input-field col s10">
					<select id="atk" name="atk">
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Kertas HVS</option>
						<option value="2">Pulpen</option>
						<option value="3">Spidol</option>
						<option value="4">Pensil</option>
						<option value="5">Amplop</option>
						<option value="6">Kertas Buram</option>
						<option value="7">Klip</option>
						<option value="8">Lakban</option>
					  </select>
					  </div>
					  <div class="input-field col s2">
						<button class="btn waves-effect waves-light"><i class="material-icons right">send</i></button></form>
					  </div>
					<!--<input type="text" name="atk" style="width:88%;"><button class="btn waves-effect waves-light" style="width:12%;"><i class="material-icons right">send</i></button></form>-->
					<canvas id="PeriodChart"></canvas>
				</div>
            </li>
			<li>
                <div class ="collapsible-header">ATK usage per user</div>
                <div style="width:90%; height:90%; margin: auto;">
					<label>SID/SSN/Name</label><br>
					<form><input type="text" name="name" style="width:88%;"><button class="btn waves-effect waves-light" style="width:12%;"><i class="material-icons right">send</i></button></form>
					<canvas id="UserChart"></canvas>
				</div>
            </li>
			<li>
                <div class ="collapsible-header">Minimum stock of ATK</div>
                <div style="width:60%; height:90%; margin: auto;">
					<table>
						<tr>
							<th>ATK</th>
							<th>Minimum stock</th>
						</tr>
						<?php
							for ($i=1;$i<=8;$i++) {
								$query2 = "SELECT * FROM `t_atk` WHERE `ID_ATK` = '$i'";
								$result2 = mysql_query($query2);
								if ($result2) {
									echo '<tr><td>' . mysql_result($result2, 0, "Jenis_ATK") . '</td>';
									$query2 = "SELECT * FROM `t_pemakaian` WHERE `ID_ATK` = '$i'";
									$result2 = mysql_query($query2);
									$num2 = mysql_num_rows($result2);
									$sum = 0;
									if ($num2 > 0) {
										
										for ($j=0;$j<$num2;$j++) {
											$sum = $sum + mysql_result($result2, $j, "Jumlah");
										}
										$avg = $sum/$num2;
										echo '<td>' . round($avg) . '</td></tr>';
									}
									else
										echo '<td>0</td></tr>';
								}
							}
						?>
					</table>
				</div>
            </li>
        </ul>
        
    </body>
	
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	<script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
	<script>
        $( document ).ready(function() {
           $('.datepicker').pickadate({
             selectMonths: true, // Creates a dropdown to control month
			selectYears: 100, // Creates a dropdown of 15 years to control year
			format: 'yyyy-mm-dd'
           });
         });
		 
    </script>
    <script>
        var data = {
		<?php
			$val1 = 0;
			$val2 = 0;
			$val3 = 0;
			$val4 = 0;
			$val5 = 0;
			$val6 = 0;
			$val7 = 0;
			$val8 = 0;
			$val9 = 0;
			$val10 = 0;
			if (isset($_GET["atk"])) {
				$jenisatk = $_GET["atk"];
				$query = "SELECT * FROM `t_atk` WHERE `ID_ATK` = '$jenisatk'";
				$result = mysql_query($query);
				if ($result)
					$idatk = mysql_result($result, 0, "ID_ATK");
				else
					$idatk = 0;
			}
			else
				$idatk = 0;
				
			for ($a=-10;$a<0;$a++) {
				$query = "SELECT * FROM `t_pemakaian` NATURAL JOIN `t_atk` WHERE `ID_ATK` = '$idatk' AND `Tgl_Pemakaian` > DATE_ADD(NOW(), INTERVAL $a MONTH) AND `Tgl_Pemakaian` < DATE_ADD(NOW(), INTERVAL $a+1 MONTH)";
				//echo $query;
				$result = mysql_query($query);
				if ($result) {
					$num = mysql_num_rows($result);
					for ($i=0;$i<$num;$i++) {
						if ($a==-10) $val1 = $val1 + mysql_result($result, $i, "Jumlah");
						else if ($a==-9) $val2 = $val2 + mysql_result($result, $i, "Jumlah");
						else if ($a==-8) $val3 = $val3 + mysql_result($result, $i, "Jumlah");
						else if ($a==-7) $val4 = $val4 + mysql_result($result, $i, "Jumlah");
						else if ($a==-6) $val5 = $val5 + mysql_result($result, $i, "Jumlah");
						else if ($a==-5) $val6 = $val6 + mysql_result($result, $i, "Jumlah");
						else if ($a==-4) $val7 = $val7 + mysql_result($result, $i, "Jumlah");
						else if ($a==-3) $val8 = $val8 + mysql_result($result, $i, "Jumlah");
						else if ($a==-2) $val9 = $val9 + mysql_result($result, $i, "Jumlah");
						else if ($a==-1) $val10 = $val10 + mysql_result($result, $i, "Jumlah");
						
					}
				}
			}
		?>
            labels: ["10 months ago", "9 months ago", "8 months ago", "7 months ago", "6 months ago", "5 months ago", "4 months ago", "3 months ago", "2 months ago", "1 months ago"],
            datasets: [
                {
                    label: "ATK Usage per Period",
                    fillColor: "rgba(200,200,200,0.8)",
					strokeColor: "rgba(100,100,100,1)",
					pointColor: "rgba(100,100,100,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(80,80,80,1)",
                    data: [<?php echo $val1 . ',' . $val2 . ',' . $val3 . ',' . $val4 . ',' . $val5 . ',' . $val6 . ',' . $val7 . ',' . $val8 . ',' . $val9 . ',' . $val10;?>]
                }
            ]
        };
		
		var data1 = [
			<?php
					if ($result1) {
						$hvs = 0;
						$pulpen = 0;
						$spidol = 0;
						$pensil = 0;
						$amplop = 0;
						$burem = 0;
						$klip = 0;
						$lakban = 0;
						
						for ($i=0;$i<$num1;$i++) {
							if (mysql_result($result1, $i, "ID_ATK") == 1) $hvs = $hvs + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 2) $pulpen = $pulpen + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 3) $spidol = $spidol + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 4) $pensil = $pensil + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 5) $amplop = $amplop + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 6) $burem = $burem + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 7) $klip = $klip + mysql_result($result1, $i, "Jumlah");
							else if (mysql_result($result1, $i, "ID_ATK") == 8) $lakban = $lakban + mysql_result($result1, $i, "Jumlah");
						}
					}
					else {
						$hvs = 0;
						$pulpen = 0;
						$spidol = 0;
						$pensil = 0;
						$amplop = 0;
						$burem = 0;
						$klip = 0;
						$lakban = 0;
					}?>
            
			{
				value: <?php echo $hvs?>,
				color:"#F7464A",
				highlight: "#FF5A5E",
				label: "Kertas HVS"
			},
			{
				value: <?php echo $pulpen?>,
				color: "#F7A74E",
				highlight: "#FEB97F",
				label: "Pulpen"
			},
			{
				value: <?php echo $spidol?>,
				color: "#FDFD50",
				highlight: "#FFFF90",
				label: "Spidol"
			},
			{
				value: <?php echo $pensil?>,
				color:"#40F75D",
				highlight: "#80F88D",
				label: "Pensil"
			},
			{
				value: <?php echo $amplop?>,
				color: "#4095F5",
				highlight: "#80B5F7",
				label: "Amplop"
			},
			{
				value: <?php echo $burem?>,
				color: "#9F5FF7",
				highlight: "#BF9FF7",
				label: "Burem"
			},
			{
				value: <?php echo $klip?>,
				color: "#E550E8",
				highlight: "#F590F8",
				label: "Klip"
			},
			{
				value: <?php echo $lakban?>,
				color: "#FDB45C",
				highlight: "#FFC870",
				label: "Lakban"
			}
			
        ]
        // Get context with jQuery - using jQuery's .get() method.
        var ctx = document.getElementById("PeriodChart").getContext("2d");
		var ctx1 = document.getElementById("UserChart").getContext("2d");
        // This will get the first returned node in the jQuery collection.
		var PeriodChart = new Chart(ctx).Line(data, {
			responsive: true,
			animationSteps: 50
		});
		var UserChart = new Chart(ctx1).Pie(data1, {
            responsive: true,
			animationSteps: 50
        });

		/*function updateChartUser() {
			<?php
				$nama = $_GET["name"];
				$query = "SELECT * FROM `t_pemakaian` NATURAL JOIN `t_user` NATURAL JOIN `t_atk` WHERE `Nama_User` = `$nama`";
				echo 'alert("' . $query . '");';
				$result1 = mysql_query($query);
				if ($result1)
					$num = mysql_num_rows($result1);
			?>
			var i;
			for (i=1;i<=8;i++) {
				<?php
				if ($result1) {
					$i = 0;
					$val = mysql_result($result1, $i, "Jumlah");
					$i = $i + 1;
				}
				?>
				LineChartUser.datasets[0].points[i-1].value = <?php if ($result1) echo $val; else echo 0;?>;
			}
			
			LineChartUser.update();
		};*/

    </script>
</html>
