<?php 
	session_start(); 

	if($_SESSION["username"] != 'admin'){
      header("Location: index.php");
    }
	
	if (!isset($_SESSION['username'])) {
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: preindex.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
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
            $(document).ready(function(){           
                $("a").on('click', function(event) {
                    if (this.hash !== "") {  
                            event.preventDefault();
                            var hash     = this.hash;
                            $('html, body').animate({
                            scrollTop: $(hash).offset().top
                            }, 1500, function(){            
                             window.location.hash = hash;
                            });
                        } 
                });
            });
        </script>

<body class="bg">
	<p id="login"></p>
	<div id="nav"><div id="navshadow"><div id="logo">
	<table style="width:100%">
			<tr align="center">
		
			<td width=45%><a href="adminIndex.php">CAPSULE HOTEL</td></a>
			<td width=10%><a href="#login">Home</td></a> 
			<td width=10%><a href="#about">About</td></a>
			<td width=10%><a href="contact.php">Contact</td></a>
			<td width=10%><a href="account.php">Account</td></a>
			<td width=8%></td>
			</tr>
		</table></div></div></div>
	<div>
		<table width=100%>
			<tr height=130px></tr>
			<tr>
			<td rowspan=2 width=5%></td>
			<td align="center" 
			bgcolor=white width=20% height=300px class="radius" valign="top" style="opacity: 0.95"><font size=7px><br><div class="opac">
				<a href="index.php">Welcome</a></font><br>
			</div><br>
						<div class="index">

							<!-- notification message -->
							<?php if (isset($_SESSION['success'])) : ?>
						<div class="error success" >
							<h3>
								<?php 
								echo $_SESSION['success']; 
								unset($_SESSION['success']);
								?>
							</h3>
						</div>
								<?php endif ?>

								<!-- logged in user information -->
								<?php  if (isset($_SESSION['username'])) : ?>
						<div>Welcome <strong><?php echo $_SESSION['username']; ?></strong></div>
						<div> <a href="index.php?logout='1'" style="color: red;">logout</a> </div>

								<?php endif ?>
						</div>
			</td>
			</td>
			<td width=3%></td>
			<td width=50% valign="top" align="left">
				<div class="animated fadeIn">
				<p class="animated slideInRight psize">
				<font color="white">Capsule Hotel</font></p>
				<p class="animated slideInUp"><font size=5px color=white>
					A place for you to sleep<br>
					Capsule Hotel Astil Dotonbori, Osaka, Japan</font></p></p>
				</div></div>
			</td></tr>
		</table><table><tr><td height=100px></td></tr></table>
	</div>
		<br><br><br id="about">			
				<div class="about">
					<h1>About Capsule Hotel</h1>
					Capsule Hotel also known as a pod hotel, is a type of hotel developed in Japan that features a large number of extremely small "rooms" (capsules) intended to provide cheap, basic overnight accommodation for guests who do not require or who cannot afford the services offered by more conventional hotels.<br><br>

					The benefit of these hotels is convenient and price friendly, rooms ranged from P600-P1,000 a night. They provide an alternative for those who (especially on weeknights) may be too drunk to return home safely, or too embarrassed to face their spouses.

					The rooms has different design depends on the room type and accomodations which will vary the room price.<br><br> 

				</div>
	<br><br><br><br>
		<div class="hbg">
			 <font color="white">
			 	<br><br><br>
				<div style="margin-right: 200px; text-align: justify; ">
                                
                                <img src="Type 3.jpg" width="700px" height="400px" style="float: left; margin-left: 50px; margin-right: 20px; margin-bottom: 50px;">
                               
                                <p><h4><b><br>Type 1: Rustic Room</b><h4><b>PHP 999 per room/night</b></h4></h4><br>Type 1 rooms are fully sound proof for a complete privacy. Each is equipped with a twin bed, a folding wall table and chair. Air Conditioning System, a 40-inch LED HDTV with cable channels, media panel with HDMI, USB and audio-visual connectivity, Wi-Fi and a Mini-Refrigerator. Upon entry is given with a pajama, pair of slippers and a towel. 
                                <br><br><br><br><br><br><br></p>
                </div>


               	<div style="margin-left: 200px; text-align:justify; ">
                                
                                <img src="Type 2.jpg" width="700px" height="400px" style="float: right; margin-right: 50px; margin-left: 20px; margin-bottom: 50px;">
                                <br><br><br><br><br><br>	
                                <p> <h4 style="text-align:right;"><b><br><br>Type 2: Vintage Room</b><h4 style="text-align:right;"><b>PHP 730 per room/night</b></h4></h4><br>Type 2 Rooms offers a single bed, reading materials with different genres, free afternoon snacks, room service, Wi-Fi, foldable working table, Air Conditioning System, 30-inch LED HDTV with a selected channels, and a warm coffee/milk every morning.<br><br><br><br><br><br><br><br><br>
                </div>


                <div style="margin-right: 200px; text-align: justify; ">
                                
                                <img src="Type 1.jpg" width="700px" height="400px" style="float: left; margin-left: 50px; margin-right: 20px; margin-bottom: 50px;">
                               	<br><br><br><br><br><br><br>
                                <p><h4><b><br>Type 3: Modern Room</b><h4><b>PHP 600 per room/night</b></h4></h4><br>Type 3 Rooms are mostly chosen for the people who want to spend a night and leave in the morning. Each room offers a single bed, Wi-Fi, tables are available outside of the room where everyone shares a wide table. 
                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
                </div>
                </font>		
		</div>
		<br><br><br>

<table width=100%>
  <tr>
    <td rowspan="4" width="15%"></td>
    <td align=left colspan=2><b>Privacy Policy</b>
    </br>We respect your privacy</td>
    <td></td>
  </tr>
  <tr>
    <td width=3%>
		<br><img src="user.png" width=25px height=25px></td>
    <td>
    	<br><b>Collects Personal Information</b><br> 
		Name and Address</td>
  </tr>
  <tr>
    <td><br><br><img src="pay.png" width=25px height=25px></td>
    <td><b><br><br>Full-payment upon reservation</b><br>
    	No refund policy</td>
  </tr>
  <tr>
    <td><br><br><img src="account.png" width=25px height=25px></td>
    <td><br><br><b>Accounts</b><br>
    	Email and Password</td>
  </tr>
</table>
<br><br><br>
<table class=hbg width=100%>
	<tr><td>
<div style="text-align: center">
	      <p style="bottom: 0; width:100%;">
		  <font color="white" size="2px">
		  <b>Copyright © 2017</b></br>Capsule Hotel. All Rights Reserved</font></p>
</div>
</td></tr>
</table>

</body>
</html>