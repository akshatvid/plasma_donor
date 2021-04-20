<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"VOLUNTEER");
$n = $_POST['name'];
$p = $_POST['phone'];
$a = $_POST['age'];
$e = $_POST['email'];
$m = $_POST['mobile'];
$fi = $_POST['id'];
$fn = $_POST['f_name'];
$fe = $_POST['femail'];
$fm = $_POST['fmobile'];
$sql = "INSERT INTO Student VALUES('$r', '$n', '$d', '$e', '$m')";
$sql1 = "INSERT INTO Faculty VALUES('$fi', '$fn', '$fe', '$fm')";

if (mysqli_query($con,$sql))
{
    echo "Inserion 1 Success <br>";
}
else
{
    echo "Error". mysqli_error($con);
}
if (mysqli_query($con,$sql1))
{
    echo "Inserion 2 Success <br>";
}
else
{
    echo "Error". mysqli_error($con);
}
mysqli_close($con);