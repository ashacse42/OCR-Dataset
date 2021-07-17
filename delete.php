<?php 
include('../connection.php');
$param=$_GET['param'];
$q=mysqli_query($db,"DELETE FROM result where char_id='$param'");
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Result Deleted Recorded.');
    window.location.href='compiledresult.php';
    </script>");
?>