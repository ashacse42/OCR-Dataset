<?php include('connection.php');?>
<?php


$char_id=$_POST['get_char_id'];
$selection=$_POST['materialExampleRadios'];

$query1 ="SELECT * FROM image_info WHERE img_serial ='$char_id'";

$result = mysqli_query($db, $query1);
 while($row = mysqli_fetch_assoc($result)){
   
   $check_value=$row['character_value'];                         
}

if($check_value==$selection)
{
	$decision=1;
}
	else{
		$decision=0;
	}

$sqlquery="INSERT INTO result (char_id,char_value,decision)
VALUES
('$char_id','$selection','$decision')";
if (!mysqli_query($db,$sqlquery))

  {

   echo '<script type="text/javascript">alert("ERROR . Unsuccessfull.")</script>';

  }

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Result Succesfully Recorded.');
    window.location.href='index.php';
    </script>");
mysqli_close($db);
?>