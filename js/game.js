$(document).ready(function(e) {
	//declaration of the variables
	var countdownvalue = 5;
	var count = 0;
	var begin = 0;
	var pushed = 74;
	var finalscore = 0;
	var firstname = '<?php echo $firstname; ?>';
	var name = '<?php echo $name; ?>';
	var group = '<?php echo $group; ?>';

    console.log( "ready!" );
   	$('#countdown').empty().append('Click to Start');
    $("#begin").click(function(e){
    	e.preventDefault();
		var countdown = setInterval(function(){countdownloop()}, 1000);
		$('#countdown').empty().append(countdownvalue);
		setTimeout(function(){stopcountdownloop()}, 5000);

		function  stopcountdownloop(){
			clearInterval(countdown);

			$('#countdown').empty().append('START');

			$( "#countdown" ).fadeOut( "slow", function() {
  				$( "#count" ).show();
  			});

			var pushed = 74;
			count = 0;
			var tid = setInterval(function(){counting()}, 10);
			setTimeout(function(){stoploop()}, 4000);

			function  stoploop(){
	    		clearInterval(tid);
	    		finalscore = count;
	    		console.log('your final score is = '+finalscore);
	    		$( "#countdown" ).hide();
	    		$( "#count" ).hide();

	    		$('#result').empty().append('Your final score is = '+finalscore);

	    		

	    		//here we send the information with AJAX !
	    		$.ajax({
	    			url: 'script/update.php',
	    			type: 'post',
	    			data: 'name='+name+'&firstname=' + firstname + '&group=' + group + '&points=' + finalscore,
	    			success: function(statut){
	    				//open a modal at the end of the test
	    				$('#endmodal').modal('show');
	    			}
	    		});

	    	}
		
			function counting(){
				$(document).on( "keydown", function(e){
					if(e.which == 70 && pushed == 74){
						count = count + 1;
						$('#count').empty().append(count);
						pushed = 70;
						e.which = null;
						console.log('count = '+count);
						console.log('pushed = '+pushed);
					}
					if(e.which == 74 && pushed == 70){
						count = count + 1;
						$('#count').empty().append(count);
						pushed = 74;
						e.which = null;
						console.log('count = '+count);
						console.log('pushed = '+pushed);
					}
				});
				console.log('interval = '+tid);
			}
		}
	 });	
   

	function  countdownloop(){
		countdownvalue = countdownvalue - 1;
		if(countdownvalue == 0){
			begin = 1;
		}
		console.log(begin);
		$('#countdown').empty().append(countdownvalue);
	}

	 $("#restart").click(function(){location.reload()});

	 $("#home").click(function(){window.location.href = 'http://eapicp.ezwebcreation.fr/';});

    
});
