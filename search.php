<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>ALEX.SCI</title>
    <link rel="stylesheet" href="ALEX.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <img class="logo" src="logo.jpg" height="50px" width="80px" />

            <span style="font-size: 25px;font-weight: 700;font-style: italic ;">
                ALEX.SCI </span>

            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;

            <ul class="list">
                <li><a href="index.html">HOME</a></li>
                <li><a href="SignIn.html">SIGN IN</a></li>
                <li><a href="signup.html">SIGN UP</a></li>


            </ul>

            <div class="links">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>

                <ul>
                    <li><a href="#all">Departments</a></li>
                    <li><a href="#d2">CONTACT US</a></li>
                    <li><a href="#d2">ABOUT US</a></li>

                </ul>
            </div>
        </div>
    </div>



<?php
require "database.php";
$nme= $_POST["search"];
if($nme=="")
{
    echo '<script> alert("Empty Field") </script>';
    require "index.html";
}
else
{
    $sql="select * from subjects where id= '$nme'";
    $res=mysqli_query($con,$sql);
    $rows=mysqli_num_rows($res);
    if($rows>0)
    {
        print " <table border=1 width=100% height=300px style=\"color:#646403;text-align:center;font-size:20px;padding:20px;margin:20px;margin-left:0;\"> <tr> <th> ID </th> <th> Name </th> <th> Dr.Name </th> <th> Hours </th> <th> Prev. Requirment </th> <th> Require To </th> <th> Semester </th><th> State </th></tr> ";
        for($r=1;$r<=$rows; $r++ )
        {
            $ro=mysqli_fetch_array($res);
            print "<tr><td>".$ro["id"];
            print "</td><td>".$ro["name"];
            print "</td><td>".$ro["drname"];
            print "</td><td>".$ro["nohrs"];
            print "</td><td>".$ro["requirment"];
            print "</td><td>".$ro["requirto"];
            print "</td><td>".$ro["sem"];
            print "</td><td>".$ro["state"];
            print "</td></tr>";
        }
        print "</table>";
    }
    else
    {
        echo '<script> alert("Not Exist") </script>';
        require "index.html";
    }
}

?>
