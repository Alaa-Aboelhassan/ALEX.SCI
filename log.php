<?php 

require "database.php";

$email= $_POST["Email"];
$pass= $_POST["PASSWORD"];

$query="select * from sign where email='$email' and password='$pass'";
$res=mysqli_query($con, $query);

if(mysqli_num_rows($res)>=1)
{
    echo'<script> alert("you are validated user. logged in successfully") </script>';
    require "index.html";
}
else {
    echo'<script> alert("Invalid User name or password") </script>';
    require "SignIn.html";

}

?>