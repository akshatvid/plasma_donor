<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"VOLUNTEER");

$sql = "CREATE table plasma_req (p_name varchar(25), a_name varchar(25), a_phone bigint(10), p_age int(2), a_email varchar(30), p_state varchar(20), p_city varchar(15), p_hospital varchar(20), p_blood varchar(3))";


if (mysqli_query($con, $sql) )
{
    echo "Table Created";
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);