<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        
        <title>iBH - Form</title>

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
            <li class="active"><a href="statistics.php"><i class="material-icons left">equalizer</i>Statistics</a></li>
            <li><a href="about.html"><i class="material-icons left">supervisor_account</i>About</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>
	<div class="container">		
		<div class="row">
			<h2>Customer Registration Form</h2>
		</div>
	  <div class="row">
		<form class="col s12" method="POST" action="php/registration.php">
		  <div class="row">
			<div class="input-field col s6">
			  <i class="material-icons prefix">account_circle</i>
			  <input id="icon_prefix" name="firstname" type="text" class="validate" required="" aria-required="true">
			  <label for="icon_prefix">First Name</label>
			</div>
			<div class="input-field col s6">
			  <input id="icon_prefix" name="lastname" type="text" class="validate" required="" aria-required="true">
			  <label for="icon_prefix">Last Name</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">info_outline</i>
				<?php $sid = $_POST["sid"];
					$pageid = $_POST["pageid"];
				?>
			  <input id="sid" type="number" readonly="readonly" name="sid" class="validate" required="required" aria-required="true" value="<?= $sid ?>">
			  <label for="sid">SID/SSN</label>
			  <input type="hidden" name="pageid" value="<?php echo $pageid; ?>">
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">phone</i>
			  <input id="icon_telephone" name="telephone" type="tel" class="validate">
			  <label for="icon_telephone">Telephone</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
				<i class="material-icons prefix">email</i>
			  <input id="email" type="email" name="email" class="validate" required="">
			  <label for="email">Email</label>
			</div>
		  </div>
		  <div class="row center">
			<button class="btn waves-effect waves-light" type="submit" name="action" id="submit-button" value="Submit">Submit
              <i class="material-icons right">send</i>
			</button>
		  </div>
		</form>
	  </div>
	</div>        
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    </script>
</html>
