<?php
include('../connection.php');
if(isset($_POST['save']))
{
$email=$_POST['uname'];
$uname=$_POST['email'];;
$pass=$_POST['pass'];
$password=md5($pass);

$sql=mysqli_query($db,"select * from user where email='$email'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This E-mail already exists</font>";
}
else
{
$query="INSERT INTO user (name,password,email) VALUES ('$uname','$password','$email')";
mysqli_query($db,$query);
$err="<font color='blue'>Registration successfull !!</font>";

}
}
?>

<h2><b>USER REGISTRATION FORM</b></h2>

<div class="pt">
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td colspan="2"><?php echo @$err;?></td>
				</tr>
				
				
				<tr>
					<td>Name</td>
					<td><input  type="text" placeholder="User Name" class="form-control" name="uname" required /></td>
				</tr>
				<tr>
					<td>Email </td>
					<td><input type="email"  class="form-control" placeholder="User E-mail" name="email" required /></td>
				</tr>

				<tr>
					<td>Password </td>
				<td><input type="password"  class="form-control" placeholder="User Password" name="pass" required /></td>
				</tr>

				<td colspan="2" align="center">
					<input type="submit" class="btn btn-success" value="Save" name="save"/>
					<input type="reset" class="btn btn-success" value="Reset"/>

				</td>
				
			</table>
		</form>
</div>
	