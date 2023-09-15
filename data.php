<?php

require "database.php";

$username= $_POST["NAME"];
$email= $_POST["Email"];
$phone= $_POST["PHONE"];
$password= $_POST["PASSWORD"];
$repassword= $_POST["rePASSWORD"];

if($email=="")
{
     echo '<script> alert("empty field") </script>';
    require "signup.html";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    echo '<script> alert("Invalid Email") </script>';
    require "signup.html";
}
else{
    $sql="select * from sign where name= '$username'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($res)>=1)
{
    echo '<script> alert("username already taken") </script>';
    require "signup.html";
}
else 
{
    mysqli_query($con,"insert into sign (name, password, email, phone) values('$username','$password','$email','$phone')");
    echo '<script> alert("account is ready") </script>';
    require "SignIn.html";
} 
}
mysqli_close($con);

?>