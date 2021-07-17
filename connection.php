<?php

$db = mysqli_connect("localhost","root","","ocrmit");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>