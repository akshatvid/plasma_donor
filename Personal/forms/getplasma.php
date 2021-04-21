<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die("Error Connecting to DB".mysqli_connect_error());
}
$db=mysqli_select_db($con,"VOLUNTEER");

$st = $_POST['p_state'];
$ci = $_POST['p_city'];
$bl = $_POST['p_blood'];

$sql = "SELECT * FROM Volunteer_Detail WHERE d_state='$st' and d_city='$ci' and blood_gp='$bl'";

$res = mysqli_query($con, $sql);

if ($res)
{
    if (mysqli_num_rows($res)>0)
    {
        // echo "$st, $ci, $bl";
        echo "  <link href='assets/css/style.css' rel='stylesheet'>        ";
        echo "<div style='overflow-x: auto;'> <table border='2'> <thead> <th>NAME</th> <th>PHONE NUMBER</th> <th>AGE</th> <th>E-MAIL</th> <th>STATE</th> <th>CITY</th> <th>BLOOD GROUP</th> <th>RECOVERED</th> </thead>";
        while($row = mysqli_fetch_array($res)) 
        {
            // print_r($row);
            echo "<tr>";
            echo "<td>". $row['full_name']."</td>";
            echo "<td>". $row['phone_no']."</td>"; 
            echo "<td>". $row['d_age']."</td>";
            echo "<td>". $row['e_mail']."</td>";
            echo "<td>". $row['d_state']."</td>";
            echo "<td>". $row['d_city']."</td>";
            echo "<td>". $row['blood_gp']."</td>";
            echo "<td>". $row['recovered']."</td>";
            echo "</tr>"; 
        }
        echo "</table></div>";
    }
    else
    {
        echo "Required Type Not Found <br>";
        echo "Don't Worry Apply For Requirement";
    }
    
}
else
{
    echo "Error:". mysqli_error($con);
}
mysqli_close($con);