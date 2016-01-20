<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	<title>Tapping application for MASTER EAPICP</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css">

</head>
<body>
  
	<?php 
	//here we stock the variables for je AJAX command.
	$firstname = $_POST['firstname'];
	$name = $_POST['name'];
	$group = $_POST['group'];

	?>


<div class="container">
      <div class="header clearfix" style="margin-bottom:20px;">
        <!--<nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
          </ul>
        </nav> -->
        <h3 class="text-muted">Finger Tapping</h3>
      </div>


      <div class="jumbotron row">
        <h1>The tapping test</h1>
        <h3>Instructions</h3>
        <p class="lead">Click on the big Green button. The countdown of 5 seconds will start and when it hits START you have 4 seconds to alternate as fast as possible the F and J key.</p>


        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 row">
        	<a href="" id="begin" >
        		<div class="image text-center row">
	        	
	        			<img src="img/button.png" alt="start button" style="width:100%;vertical-align:middle;">
	        			<h2 id="countdown" style="color:white;">0</h2>
	        			<h2 id="count" style="display: none;color:white;">0</h2>
	        			
	        		
        		</div>
        	</a>
		</div>

      </div>
    </div>
    <footer class="footer text-center" style="background-color:rgba(0,0,0,0.8);height:25px;">
        <p style="color:white;">&copy; 2015 A Creation By JORIS HART, Inc.</p>
    </footer>

<!-- Modals -->




<div class="modal fade bs-example-modal-lg" id="endmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content text-center">
    	</br>
    	</br>
    	<h2> You finished the test ! </h2>
    </br>
	</br>
  		<img src="img/tapping.gif" alt="" id="gif"/>
  	</br></br>
  	<p id="result" >0</p></br></br>

  		<button type="button" id="restart" class="btn btn-lg btn-success">Restart the test</button>

		<button type="button" id="home" class="btn btn-lg btn-warning">Back to the homepage</button>
	</br>
	</br>
		
    </div>
  </div>
</div>



</body>

<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- the game -->

<script src="js/game.js"></script>

<!-- keycode F = 70 , J=74 -->
</html>


