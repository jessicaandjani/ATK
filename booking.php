<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>iBH - Booking</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type = "text/javascript">
		function validateForm() {
			var valatk = document.getElementsByName("jenis_atk[]");
			  var valquantity = document.getElementsByName("quantity[]");
			  var sum = valatk.length;
			  var valname = document.forms["form"]["sid"].value;
			  var valdate = document.forms["form"]["date_booking"].value;
			  for(var i = 0; i < sum; i++) {
				if((valatk[i].value == null || valatk[i].value == "") || (valquantity[i].value == null || valquantity[i].value == "")) {
				  alert("All fields must be filled out.");
				  return false;  
				}
			  }
			  if ((valname == null || valname == "") || (valdate == null || valdate == "")) {
				alert("All fields must be filled out.");
				return false;
			  }
			  else {
				$('#modal1').openModal();
				var count = 1;
				$("p#input_place2").remove();
				$("p#input_place3").html("<p id=\"input_place2\"></p>");
				$('input[type=number]').each(function(){
				  var quantity = parseInt($(this).val(),10);
				  if($.isNumeric(quantity)){
					var input_add1 = "<div class=\"row\"><div class=\"col s2\"><h7>" + count + "</h7></div><div class=\"col s4\">" + quantity + "</div><div class=\"col s6\" id=\"inserthere" + count + "\"></div>";
					/*$("p#input_place2").html(input_add1);*/
					$(input_add1).insertBefore("p#input_place2");
					count++;
				  }
				});
				count = 1;
				var counter = 0;
				$('select').each(function(){
				  if (counter > 1){
					var barang = $(this).find(":selected").text();
					$("div#inserthere" + count).html(barang);
					count++;
				  } else {
					counter++;
				  }
				});
				var counter = 0;
				$("input[type='text']").each(function(){
				  if (counter > 1){
					var barang = $(this).select();
					$("div#insertnamehere" + count).html(barang);
					count++;
				  } else {
					counter++;
				  }
				});
			  }
		}
		</script>
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
              <li><a href="#!"><i class="material-icons left">dialpad</i>Booking Transactions</a>
              <li><a href="usage.html"><i class="material-icons left">trending_up</i>Usage History</a>
              <li><a href="statistics.php"><i class="material-icons left">equalizer</i>Statistics</a></li>
              <li><a href="about.html"><i class="material-icons left">supervisor_account</i>About</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
          </div>
        </nav>
		</div>
        
        <div class ="container">
            <div class="row">
                <h2>Start Your Booking</h2>
            </div>
            <form name="form" method="POST" action="php/data_booking.php">
              <div class="row">
                <div class="col s4">
                  <label>SID/SSN</label>
				  <?php $sid = $_POST["sid"]; ?>
                  <input type="text" class="validate" name="sid" id="sid" readonly="readonly" value="<?=$sid?>">
                </div>
                <div class="col s8">
                  <label>Book For</label>
                  <input type="date" class="datepicker" name="date_booking">
                </div>
              </div>
              <div class="row" id="book1">
                <div class="input-field col s1">
                  <h5>1.</h5>
                </div>
                <div class="input-field col s5">
                  <select id="ATK1" name="jenis_atk[]">
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
                <div class="input-field col s4">
                  <input id="number1" type="number" min="1" class="validate" name="quantity[]">
                  <br><br>
                  <label for="number" data-error="wrong" data-success="right">Quantity</label>
                </div>
              </div>  
              <p id="input_place"></p>
              <!-- Add buttin-->
              <div class="fixed-action-btn" style="bottom: 70px; right: 100px;">
                <a id="add_field" class="btn-floating btn-large red">
                  <i class="large material-icons">add</i>
                </a>
              </div>
        </div>

        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4 align="center">Booking List</h4>
            <div class="row">
                <div class="col s12">
                    <h6>Please recheck your booking before proceed</h6>
                </div>
                <div class="col s2">
                    <h7>No</h7>
                </div>
                <div class="col s4">
                    <h7>Quantity</h7>
                </div>
                <div class="col s6">
                    <h7>Items</h7>
                </div>
            </div>
            <p id="input_place3"></p>
          </div>
          <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" name="action" id="submit-button" value="Submit">Confirm</button>
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Discard</a>
            </button>
          </div>
      </div>
        </form> 

        <!--Submit Button-->          
        <div class="row center">
          <!-- Modal Trigger -->
          <button class="btn waves-effect waves-light" type="submit" name="action" id="submit-button" value="Submit" onclick="return validateForm();">Submit
              <i class="material-icons right">send</i>
          </button>
        </div>
    </body>
    
    <!--  Scripts-->
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
    <script>
        
        $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        });
        
        var input_index = 1;
        var quantity = 1;
        var input_add;
        $("a#add_field").click(function(){
            input_index++;
           var input_add = "<div id=\"book" + input_index + "\" class=\"row\"><div class=\"input-field col s1\"><h5>" + input_index + ".</h5></div><div class=\"input-field col s5\"><select name=\"jenis_atk[]\"><option value=\"\" disabled selected>Choose your option</option><option value=\"1\">Kertas HVS</option><option value=\"2\">Pulpen</option><option value=\"3\">Spidol</option><option value=\"4\">Pensil</option><option value=\"5\">Amplop</option><option value=\"6\">Kertas Buram</option><option value=\"7\">Klip</option><option value=\"8\">Lakban</option></select></div><div class=\"input-field col s4\"><input id=\"number\" type=\"number\" min=\"1\" class=\"validate\" name=\"quantity[]\"><br><br><label for=\"number\" data-error=\"wrong\" data-success=\"right\">Quantity</label></div><div class=\"input-field col s1\"><a id=\"remove_field\" data-id=\""+ input_index +"\"><h5>×</h5></a></div></div>";
           $(input_add).insertBefore("p#input_place");
           $('select').material_select();
        });
        
        $("body").on("click", "a#remove_field", function(){
           var divID = $(this).data("id");
           if (divID < input_index){
               $("div#book" + divID).remove();
           } else {
               $("div#book" + divID).remove();
               input_index--;
           }
        });
        
        $( document ).ready(function() {
           $('.datepicker').pickadate({
             selectMonths: true, // Creates a dropdown to control month
			selectYears: 100, // Creates a dropdown of 15 years to control year
			format: 'yyyy-mm-dd'
           });
         });
         
        
    </script>
     <script type="text/javascript">
        $(document).ready(function() {
          $('#agree_booking').click(function() {
              $.post("php/data_booking.php");
          });
        });
    </script>
  <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
</html>
