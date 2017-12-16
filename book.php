<?php 
include('server.php'); 

  if($_SESSION["username"] == 'admin'){

      echo "<script>
      alert('Admin doesnt need to book');
      window.location.href='adminIndex.php';
      </script>";
      
    }

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: preindex.php");
	}

    if(isset($_POST['submit'])){
    

    $troom=$_POST['troom'];
    $cin=$_POST['cin'];
    $cout=$_POST['cout'];
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $nroom=$_POST['nroom'];
    $meal=$_POST['meal'];
    print_r($_POST);
    
        
    $_SESSION['troom'] = $troom;
    $_SESSION['cin'] = $cin;
    $_SESSION['cout'] = $cout;
    $_SESSION['fname'] = $fname;
    $_SESSION['email'] =$email;
    $_SESSION['phone'] = $phone;
    $_SESSION['nroom'] = $nroom;
    $_SESSION['meal'] = $meal;
    
    header("location:confirmation.php");
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Reserve a Room</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<script>
$(document).ready(function() {
	$(window).scroll(function() {
  	if($(document).scrollTop() > 10) {
    	$('#nav').addClass('shrink');
    }
    else {
    $('#nav').removeClass('shrink');
    }
  });
});
</script>
<body class="bg" style="background-repeat: repeat-y;">
<div id="login"></div>
	<div id="nav"><div id="navshadow"><div id="logo">
	<table style="width:100%">
			<tr align="center">
			<td width=45%><a href="index.php">CAPSULE HOTEL</td></a>
      <td width=10%><a href="index.php#login">Home</td></a> 
      <td width=10%><a href="index.php#about">About</td></a>
      <td width=10%><a href="contact.php">Contacts</td></a>
      <td width=10%><a href="book.php">Book Now!</td></a>
      <td width=10%><a href="account.php">Account</td></a>
			<td width="8%"></td>
      </tr>
		</table></div></div></div><br><br><br><br>
<div class="header2">   
    	<h2>Reserve a Room</h2>
	</div> 
<div class="content">   
           
    	Select Dates
			<form name="form" > 
				<div class="input-group">

                           <label>Type of Room *</label>
                           <select name="troom" id ="room_type" class="form-control" onchange ="getType(this.value)" required> 
                           <option value"" selected></option>
                           <option value="TYPE1">P999/night-Type1: Rustic</option>
                           <option value="TYPE2">P730/night-Type2: Vintage</option>
                           <option value="TYPE3">P600/night-Type3: Mordern</option>
                           </select>
                </div>
                <div class="input-group">
                           <label>Check-In</label>
                           <input name="cin" type ="date" id ="check-in" class="form-control" onchange="GetDays()" >
                </div>
                <div class="input-group">
                     	    <label>Check-Out</label>
                     		<input name="cout" type ="date" class="form-control" id = "check-out" onchange="GetDays()">
                </div> 
                                            
               	<div class="input-group">
                           	<label>Name of Guest</label>
                           	<input name="fname" class="form-control" required>   
                </div>
                <div class="input-group">
                           	<label>Email</label>
                           	<input name="email" type="email" class="form-control" required>
                </div>
                	<div class="input-group">
                           	<label>Phone Number</label>
                           	<input name="phone" type ="text" class="form-control" required>
				        </div>
                <div class="input-group">
                			<label>Meal</label>
                	<select name="meal" class="form-control" id ="meal_plan" onchange="getMeal()" required>
                			<option value="None" selected>None</option>
                			<option value="Breakfast">P100-Breakfast</option>
                			<option value="Breakfast & Lunch">P200-Breakfast & Lunch</option>
                			<option value="Breakfast,Lunch & Dinner">P300-Breakfast,Lunch & Dinner</option>
            		</select>
            	</div>
               	<div class="input-group">
                            <label>No.of Rooms *</label>
                    <select name="nroom" class="form-control" onchange ="getRoomNum(this.value)" required>   
                    		<option value="" selected></option>         
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                   	</select>
              	</div>
				<div class = "input-group">
                          	<label><h4>Total:</h4></label>
                            	<input type="text" name="roomprice" id="total"  size="5px" readonly="" placeholder="Pesos">
                </div>  
                <div>
              					<input type="submit" name="submit" id="btn-primary"  formmethod="post" class="btn" formaction="book.php"> 
                </div></form>
</div>
</body>
</html>
<script src = "jquery.js" type="text/javascript"> </script>
<?php// para ni siya sa mag solve sa total na bayad sa customer ?>
<script type="text/javascript">
var roomType ="";
var roomNum =0;

    function getType(str){
        roomType = str;
        if(roomNum!=0){getTotal();}
    }

    function getRoomNum(roomnum){
        roomNum = roomnum;
        getTotal();
    }

function getTotal(){ 
    var planPrice = getMeal();
    if(roomType == "TYPE1"){
        var numDays= GetDays();
        document.getElementById('total').value = (roomNum * 999 * numDays + (numDays * planPrice));
        }
    else if (roomType == "TYPE2"){ 
        var numDays= GetDays();
        document.getElementById('total').value = (roomNum * 730 * numDays + (numDays * planPrice)); 
     }
    else if(roomType == "TYPE3"){
        var numDays= GetDays();
        document.getElementById('total').value = (roomNum * 600 * numDays + (numDays * planPrice));
        total = document.getElementById('total');
        }
    }

var planPrice;
function getMeal(){
    var plan = document.getElementById("meal_plan").value;

    if(plan=="None"){
        planPrice = 0;
        return planPrice;
    }
    else if (plan=="Breakfast"){
        planPrice = 100;
        return planPrice;
    }
    else if (plan=="Breakfast & Lunch") {
        planPrice =200;
        return planPrice;
    }
    else if (plan=="Breakfast, Lunch & Dinner") {
        planPrice =300;
        return planPrice;
    }
}

// calculate number of days
var numDays;
 function GetDays(){
                var cin = new Date(document.getElementById("check-in").value);
                var cout = new Date(document.getElementById("check-out").value);
                numDays = parseInt((cout - cin) / (24 * 3600 * 1000));
                return numDays;
        }
 
</script>
