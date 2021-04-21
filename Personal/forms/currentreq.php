<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"VOLUNTEER");

$d_st = $_POST['donor_state'];
$d_ci = $_POST['donor_city'];
$d_bl = $_POST['donor_blood'];

$sql = "SELECT * FROM plasma_req WHERE p_state='$d_st' and p_city='$d_ci' and p_blood='$d_bl'";

$res = mysqli_query($con, $sql);

if ($res)
{
    if (mysqli_num_rows($res)>0)
    {
        // echo "$st, $ci, $bl";
        // echo "  <link href='assets/css/style.css' rel='stylesheet'>        ";
        echo "<div style='overflow-x: auto;'> <table border='2'> <thead> <th>PATIENT NAME</th> <th>ATTENDANT NAME</th> <th>ATTENDANT CONTACT</th> <th>PATIENT AGE</th> <th>ATTENDANT E-MAIL</th> <th>STATE</th> <th>CITY</th> <th>HOSPITAL</th> <th>BLOOD GROUP</th> </thead>";
        while($row = mysqli_fetch_array($res)) 
        {
            // print_r($row);
            echo "<tr>";
            echo "<td>". $row['p_name']."</td>";
            echo "<td>". $row['a_name']."</td>";
            echo "<td>". $row['a_phone']."</td>"; 
            echo "<td>". $row['p_age']."</td>";
            echo "<td>". $row['a_email']."</td>";
            echo "<td>". $row['p_state']."</td>";
            echo "<td>". $row['p_city']."</td>";
            echo "<td>". $row['p_hospital']."</td>";
            echo "<td>". $row['p_blood']."</td>";
            echo "</tr>"; 
        }
        echo "</table></div>";
    }
    else
    {
        echo "No Requirement Of Your Type Found <br>";
        echo "Please Volunteer And Save Lives";
    }
    
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);