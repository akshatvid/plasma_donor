<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"VOLUNTEER");
$pn = $_POST['pname'];
$an = $_POST['aname'];
$ap = $_POST['aphone'];
$p_a = $_POST['p_age'];
$a_e = $_POST['a_email'];
$p_s = $_POST['p_state'];
$p_c = $_POST['p_city'];
$hos = $_POST['hospital'];
$p_b = $_POST['p_blood'];


$sql = "INSERT INTO plasma_req VALUES('$pn', '$an', '$ap', '$p_a', '$a_e', '$p_s', '$p_c', '$hos', '$p_b')";

$sql1 = "SELECT * FROM plasma_req WHERE a_phone='$ap' AND p_name='$pn'";
$res = mysqli_query($con,$sql1);
$row = mysqli_num_rows($res);

if ($row >= 1)
{
    echo "Requirement already exists";
}
else
{
    if (mysqli_query($con,$sql))
    {
        echo "Requirement Updated <br>";
    }
    else
    {
        echo "Error". mysqli_error($con);
    }
}

mysqli_close($con);