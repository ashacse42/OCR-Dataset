<?php 
include('../connection.php');
$param=$_GET['param'];
$param2=$_GET['param'];


// mysqli_query($db,"UPDATE result SET flag ='1' WHERE char_id='$param'");

// header('location:compiledresult.php');

 $sql ="SELECT * from result WHERE char_id='$param' AND flag=0";
$result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($result)){

       $char_id=$row['char_id'];
       $char_value=$row['char_value'];
       $decision=$row['decision'];
       $set_flag=1;

$sqlquery="INSERT INTO final_result (character_id,character_value,decision,flag_status)
VALUES
('$char_id','$char_value','$decision','$set_flag')";
if (mysqli_query($db,$sqlquery))

  {

   $delq=mysqli_query($db,"DELETE FROM result WHERE char_id=$param2");
   if($delq==TRUE){
   	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Result Succesfully Recorded.');
    window.location.href='compiledresult.php';
    </script>");}

    else{echo '<script type="text/javascript">alert("ERROR . Unsuccessfull-1.")</script>';}

  }else{

 echo '<script type="text/javascript">alert("ERROR . Unsuccessfull-2.")</script>';}

//mysqli_close($db);

}
?>