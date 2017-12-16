<?php
session_start(); 

    if (!isset($_SESSION['username'])) {
        header('location: login.php');
    }

    if($_SESSION["username"] == 'admin'){
      header("Location: userPage.php");
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: preindex.php");
    }

$server="localhost";
$username="root";
$password="";
$uAccount = $_SESSION['username'];
$connect_mysql=mysqli_connect($server,$username,$password) or die ("Connection Failed!");
$mysql_db=mysqli_select_db($connect_mysql, "hoteldb") or die ("Could not Connect to Database");

$registration = "SELECT * FROM registration where username = '$uAccount'";
$users=mysqli_query($connect_mysql, $registration) or die("Query Failed : ".mysqli_error());

?>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
 <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
 </style>
<body bgcolor=grey>

	<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div id="MainContainer">
      					<div id="page-header">
      						<h1>
      							<a href="index.php"><img src="CHlogo.png" width=70px height=70px></a>
      						Hi, <b><?php echo $_SESSION['username']; ?></b>.</h1></div>
      						<div id="admin-wrapper" >
            				<div id="page-inner">
                
                  <div class="fluid-container" style="padding: 10px; margin-top: 0px;">

                    <center>
                    <ul class="nav nav-tabs" role="tablist">
                       <li class="active"><a href="account.php" ><h4 id="textcolor">Profile</h4></a></li>
                        <li><a href="accountAccept.php" ><h4 id="textcolor">Accepts</h4></a></li>
                        <li><a href="accountReject.php" ><h4 id="textcolor">Rejects</h4></a></li>
                        <li><a href="index.php?logout='1'" style="color: red;"><h4>logout</h4></a></li>
                        
                    </ul>
                    </center>
                </div>
                
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="profile" style="overflow: auto; padding: 0 55px;">
                        <table id="table" class="table table-hover">
                            <thead>
                              <tr id="panel-heading" bgcolor=#333 style="color: white">
                             	  <th>ID</th> 
                                <th width=10%></th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Contact</th>
                              </tr>
                            </thead>
                            <tbody>
                               <?php while($rows=mysqli_fetch_array($users)) { ?>
                                    <tr>
                                        <td><?php echo $rows['id'] ?></td>
                                  		  <td></td>
                                        <td><?php echo $rows['username'] ?></td>
                                        <td><?php echo $rows['email'] ?></td>
                                        <td><?php echo $rows['contact'] ?></td>

                                            <?php } ?>
                              			</font>
                                    </tr>
                            </tbody>
                          </table> 
                      </div>
                    </div>
                </div>
            </div>
                      
</div></div></div></div></div>          
</body>
</html>