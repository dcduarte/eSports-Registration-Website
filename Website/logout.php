<?php
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
    <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
    <?php
    
    session_destroy();


    header("refresh:3;login.php");
    echo("<div>");
    echo("Logout Sucessful.");
    echo("<br>");
    echo("Thank you");
    echo("</div>");

    ?>
</body>
</html>