<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
date_default_timezone_set('Asia/Kolkata');
$db=mysqli_select_db($con,"VOLUNTEER");

// $sqln = "SELECT convert(varchar, date_up, 3) AS [DD/MM/YY]";
$sql = "SELECT * FROM plasma_req ORDER BY date_up desc";

// $re = mysqli_query($con, $sqln);
$res = mysqli_query($con, $sql);

if ($res)
{
    if (mysqli_num_rows($res)>0)
    {
        // echo "$st, $ci, $bl";
        // echo "  <link href='assets/css/style.css' rel='stylesheet'>        ";
        echo "<div style='overflow-x: auto;'> <table border='2'> <thead> <th>DATE UPDATED</th> <th>PATIENT NAME</th> <th>ATTENDANT NAME</th> <th>ATTENDANT CONTACT</th> <th>PATIENT AGE</th> <th>ATTENDANT E-MAIL</th> <th>STATE</th> <th>CITY</th> <th>HOSPITAL</th> <th>BLOOD GROUP</th> </thead>";
        while($row = mysqli_fetch_array($res)) 
        {
            // print_r($row);
            echo "<tr>";
            echo "<td>". $row['date_up']."</td>";
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