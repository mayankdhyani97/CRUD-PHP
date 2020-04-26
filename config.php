<?php

$hostname='localhost';
$username='root';
$password='';
$database='pop';
$con=mysqli_connect($hostname,$username,$password,$database);
if(!$con)
{
    mysqli_error($con) or die('Connection Error');
}

?>