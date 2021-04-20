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
$s = $_POST['state'];
$c = $_POST['city'];
$b = $_POST['blood'];
$r = $_POST['recovery'];

$sql = "INSERT INTO Volunteer_Detail VALUES('$n', '$p', '$a', '$e', '$s', '$c', '$b', '$r')";

if (mysqli_query($con,$sql))
{
    echo "Database Updated <br>";
}
else
{
    echo "Error". mysqli_error($con);
}
mysqli_close($con);