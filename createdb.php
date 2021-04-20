<?php
$con = mysqli_connect("localhost","root","");
if(!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$query = "CREATE DATABASE VOLUNTEER";
if (mysqli_query($con,$query))
{
    echo "Database Created";
}
else
{
    echo "Error".mysqli_error($con);
}
mysqli_close($con);
?>