<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>PHP Form</title>
    <meta name="description" content="Form based on PHP">
    <meta name="author" content="Luca Vaccani">
    <link rel="stylesheet" type="text/css" href="style/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400" rel="stylesheet">
</head>

<body>
<?php
    echo "<pre>", print_r($_POST, true),"<pre>";
    if (isset($_POST['submit']));
    {
        $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);

        $to = 'luca_vaccani@emerson.edu';
        $subject = 'My Form Submission yoo';
        $message = "This is my submission\n\n"
                 ."Name: $firstname $lastname\n"
                 ."Username: $username\n"
                 ."Email: $email\n";

        //$result = mail ($to, $subject, $message);

        //connection to database - lvmediae_userform - sunset1995
            $dbhostname = 'localhost';
            $dbusername = 'lvmediae_Luca';
            $dbpassword = 'sunset1995';
            $dbdatabase = 'lvmediae_userform';

        $mysqli = new mysqli($hostname, $dbusername, $dbpassword, $dbdatabase);

            if ($mysqli->connect_errno)
            {
                echo "<p>MySQL Error".$mysqli->error;
            }

            else
            {
                echo "<p id='success'> SUCCESS &#9673<p>";
            }

        $firstname = $mysqli->real_escape_string($firstname);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `email` (`accountid`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES (NULL, '$username', '$password', '$firstname', '$lastname', '$email')";

        if ($mysqli->query($query))
        {
            echo "<p id='success'> SUCCESS &#9673 </p>";
        }
        else
        {
            echo "<p>Insert Error" .$mysqli->error ."</p>";
        }


     }
?>

<div class ="container">
<form method="post">

<div class=row>
    <div class="col-25"><label for="uname">USERNAME</label></div>
    <div class="col-75"><input type="text" name="username" placeholder="ENTER USERNAME">
    </div>
</div>


<div class=row>
    <div class="col-25"><label for= "password">PASSWORD</label></div>
    <div class="col-75"><input type="text" id="password" name="password" placeholder="ENTER PASSWORD"></div>
</div>


<div class=row>
    <div class="col-25"><label for= "fname">FIRST NAME</label></div>
    <div class="col-75"><input type="text" id="fname" name="firstname" placeholder="ENTER FIRST NAME"></div>
</div>


<div class=row>
    <div class="col-25"><label for= "lname">LAST NAME</label></div>
    <div class="col-75"><input type="text" id="lname" name="lastname" placeholder="ENTER LAST NAME"></div>
</div>


<div class=row>
    <div class="col-25"><label for= "email">E-MAIL</label></div>
    <div class="col-75"><input type="text" id="email" name="email" placeholder="ENTER E-MAIL"></div>
</div>

<div class=row><input type="submit" name="submit" value="SUBMIT"></div>

<div class=row><div id="copyright">©LUCA VACCANI</div></div>

</form>
</div>


</body>
</html>
