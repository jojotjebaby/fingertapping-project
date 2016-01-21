<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
	<title>Tapping application for MASTER EAPICP</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="/css/custom.css">

</head>
<body>
  <?php include '/ext/connection.php'; ?>

    <div class="container">
      <div class="header clearfix" style="margin-bottom:20px;">
        <nav style="margin-top:10px;">
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><button  class="btn btn-default" id="home">Home</button></li>
            <li role="presentation"><button  class="btn btn-default" id="downmodal">Download the Results</button></li>
          </ul>
        </nav> 


        <h3 class="text-muted">Finger Tapping By Joris Hart</h3>
      </div>


      <div class="jumbotron row">
        <h1>Begin your Tapping experience</h1>
        <p class="lead">Become worlds fastest finger tapper with this application brought to you by the students of the University of Chambéry.</p>


        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 row">
	        <form method="post" action="/test">
			  	<div class="form-group">
			    	<label for="name">Name</label>
			    	<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
			  	</div>
			  	<div class="form-group">
			    	<label for="firstname">Firstname</label>
			    	<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
			  	</div>
        <div class="text-center">
			  	<label class="radio-inline">
					 <input type="radio" name="group" id="group" value="control" required> Control
				  </label>
				  <label class="radio-inline">
					 <input type="radio" name="group" id="group" value="foottapping" required> Foot Tapping
				  </label>
				  <label class="radio-inline">
					 <input type="radio" name="group" id="group" value="fingertapping" required> Finger Tapping
				  </label>
        </div>
				<div class="checkbox">
				    <label>
				      	<input type="checkbox" required> I accept that my informations will be saved and analysed by the students of the University of Chambéry (France)
				    </label>
				</div>
			  	<div class="text-center">
			  		<button type="submit" class="btn btn-default ">Begin your test</button>
				</div>
			</form>
    </br>
		</div>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12 row">
        <div class="col-xs-12 col-sm-6 col-md-6  col-lg-6 row">
          <h3>Instructions</h3>
          <p>Fill in your information and select which test you want to do.</p>

          <h3>The test</h3>
          <p>Click on the button to begin the countdown. Once the word START appears, alternate pressing F and J key as fast as possible during 4 seconds. You can tap before the word START appears to be sure to have a flying start(the counting starts when the start sign is given)</p>

          <div class="text-center">    
            <img src="img/keyboard.png" alt="keyboard image" style="width:80%"/>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6  col-lg-6 row" style="padding:15px 15px;">
          <h4>Ranking (TOP 7)</h4>
            <table class="table table-striped">
              <tr>
                <td>n°</td>
                <td>Firstname</td>
                <td>Points</td>
                <td>Hits/second</td>
                <td>ms/hit</td>
              </tr>
              <?php
                $i = 1;
                require_once('ext/connection.php'); 
                $sql= "SELECT firstname, points FROM results ORDER BY points DESC LIMIT 7 ";
                $stmt = $bdd->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach($result as $row){

                    echo "<tr><td>".$i."</td>";
                    echo "<td>".$row['firstname']."</td>";
                    echo "<td>".$row['points']."</td>";

                    $hits = $row['points'] / 4;
                    $speed = (1 /$hits)*1000;

                    $hits = round($hits, 2);
                    $speed = round($speed, 2);

                    echo "<td>".$hits."</td>";
                    echo "<td>".$speed."</td></tr>";


                    $i++;
                } 
              ?>
        	</table>
        </div>
      </div>


    </div>
    <footer class="footer text-center" style="background-color:rgba(0,0,0,0.8);height:25px;">
        <p style="color:white;">&copy; 2015 A Creation By JORIS HART, Inc.</p>
    </footer>




<!-- Modals -->




<div class="modal fade bs-example-modal-lg" id="downloadmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content text-center">
      </br>
      </br>
      <h2> Download all the results. </h2>
    </br>
    </br>
    <p>You're at point to download all the data that we collect over time. Please be aware that these data can only be used for educational purposes.</br></p>
      Your spreadsheet program will ask you which separation you want to use.</p></br><h4 style="color:red;"> Please use ONLY TABULATION as separator</h4>
      <img src="img/matrix.gif" alt="" id="gif"/>
    </br></br>
      <button  class="btn btn-lg btn-success" id="download">Download the Results</button>
  </br>
  </br>
    
    </div>
  </div>
</div>

</body>
<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript">
  $("#download").click(function(){
    window.location="download.php";
  });
  $("#home").click(function(){window.location.href = 'http://eapicp.ezwebcreation.fr/';});
  $("#downmodal").click(function(){
     $('#downloadmodal').modal('show')
  });

 
</script>

</html>


