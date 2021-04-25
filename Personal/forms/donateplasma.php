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
$d_up = date('Y-m-d');

$sql = "INSERT INTO Volunteer_Detail VALUES('$d_up', '$n', '$p', '$a', '$e', '$s', '$c', '$b', '$r')";

$sql1 = "SELECT * FROM Volunteer_Detail WHERE phone_no='$p' AND full_name='$n'";
$res = mysqli_query($con,$sql1);
$row = mysqli_num_rows($res);

if ($row >= 1)
{
    echo "Details already exists";
}
else
{
    if (mysqli_query($con,$sql))
    {
        echo "Database Updated <br>";
    }
    else
    {
        echo "Error". mysqli_error($con);
    }
}

mysqli_close($con);