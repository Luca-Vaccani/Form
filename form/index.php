<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>PHP Form</title>
    <meta name="description" content="Form based on PHP">
    <meta name="author" content="Luca Vaccani">
    <link rel="stylesheet" type="text/css" href="style/global.css">
</head>

<body>
<?php  
    echo "<pre>", print_r($_POST, true),"<pre>";
    if (isset($_POST['submit'])); {
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
            
        $result = mail ($to, $subject, $message);
        
        \\connection to database - lvmediae_userform - sunset1995
            $hostname = 'localhost';
            $username = 'Luca';
            $password = 'sunset1995';
            $database = 'lvmediae_Luca';
        
        $mysqli = new mysqli($hostname, $username, $password, $database)
            
            if ($mysqli->connect_errno){
                echo "<p>MySQL Error".$mysqli->error;
            } else {
                echo 'database connection success!!!';
            }
        
        }     
?>

            
<form method="post">
        
    <div class="row">    
        <div class="label">Username:</div>                               
            <input class="formbox" type="text" name="username">    <br>       
    </div>
        
    <div class="row">      
        <div class="label">Password:</div>                            
        `   <input class="formbox" type="text" name="password">    <br>
    </div>
        
        
    <div class="row">
        <span class="label">First name:</span>                        
            <input class="formbox" type="text" name="firstname"> <br>   
    </div>    
        
    <div class="row">
        <div class="label">Last name:</div>                         
            <input class="formbox" type="text" name="lastname">   <br>
    </div>    
        
    <div class="row">    
        <div class="label">Email:</div>                         
            <input class="formbox" type="text" name="email">          <br>
    </div>
        

      <input type="submit" name="submit" value="Submit"> 
        
</form>  

   
    
    
        <!--<option value="red">Red</option>
            <option value="green">Green</option>
            <option value="aqua">Aqua</option>
            <option value="fuchsia">Fuchsia</option>
            <option value="black">Black</option>
        -->  
            

</body>
</html>