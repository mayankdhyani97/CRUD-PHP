<?php
session_start();
include('config.php');
$id=0;
$update=false;
$username='';
$location='';

if(isset($_POST['save']))
{
    $username=$_POST['username'];
    $location=$_POST['location'];
    $query="INSERT INTO hello (username,location) VALUES('$username','$location');";
    $result=mysqli_query($con,$query);
    $_SESSION['message']="Record saved Successfully!";
    $_SESSION['msg_type']="success";
    header('location:index.php');
}   

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $query="DELETE FROM hello WHERE id=$id";
    $result=mysqli_query($con,$query);
    if($result)
    {

        $_SESSION['message']="Record Deleted Successfully!";
        $_SESSION['msg_type']="danger";
        // header('location:index.php');
    }
}

if(isset($_GET['edit']))
{   
    $id=$_GET['edit'];
    $update=true;
    $query="SELECT * FROM hello WHERE id=$id";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    $count=mysqli_num_rows($result);
    if($count==1)
    {
        $username=$row['username'];
        $location=$row['location'];
    }
    
}


if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $username=$_POST['username'];
    $location=$_POST['location'];
    $query="UPDATE hello SET username='$username',location='$location' WHERE id=$id";
    $result=mysqli_query($con,$query);   
    $_SESSION['message']="Record updated Successfully!";
    $_SESSION['msg_type']="warning";
    header('location:index.php');


}

?>