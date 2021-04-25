<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"VOLUNTEER");

$sql = "CREATE table Volunteer_Detail (date_up date, full_name varchar(25), phone_no bigint(10), d_age int(2), e_mail varchar(30), d_state varchar(20), d_city varchar(15), blood_gp varchar(4), recovered varchar(12))";


if (mysqli_query($con, $sql) )
{
    echo "Table Created";
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);