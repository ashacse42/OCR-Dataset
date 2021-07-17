<?php 
session_start();
include('../connection.php');
$admin= $_SESSION['admin'];
if($admin=="")
{
header('location:login.php');
}
$q=mysqli_query($db,"select * from user WHERE email='$admin'");
$rr=mysqli_num_rows($q);
if($rr)
{
while($row=mysqli_fetch_assoc($q))
	{
$uid=$row['user_id'];
$uname=$row['name'];
$umail=$row['email'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
<title>Admin Dashboard</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<script src="js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Welcome <?php echo"$uname"; ?>!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
			
			<li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=manage_users"><span class="glyphicon glyphicon-user"></span> Manage Users</a></li>
            <li><a href="index.php?page=New_user"><span class="glyphicon glyphicon-pushpin"></span> Add User</a></li>
            <li><a href="preparedata.php"><span class="glyphicon glyphicon-pushpin"></span> Add knowledge base</a></li>
            <li><a href="compiledresult.php"><span class="glyphicon glyphicon-pushpin"></span> Submitted Result</a></li>
			
		  </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">