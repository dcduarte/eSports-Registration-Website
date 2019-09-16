<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit user information</title>
    <link  rel="stylesheet" href="stylesheet.css" >  

</head>
<body>
    <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports";
        
        try {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {

            
               
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $player_id = $_GET['player_id'];
                $player_tag = $_POST['player_tag'];
                $player_firstname = $_POST['player_firstname'];
                $player_surname = $_POST['player_surname'];
                $team_id = $_POST['team_id'];

                $sql = $conn->prepare("UPDATE players SET player_tag = ?, player_firstname = ?, player_surname = ?, team_id = ? WHERE player_id = ?");
                $sql -> bindValue(1, "$player_tag");
                $sql -> bindValue(2, "$player_firstname");
                $sql -> bindValue(3, "$player_surname");
                $sql -> bindValue(4, "$team_id");
                $sql -> bindValue(5, "$player_id");
               
                $sql -> execute();


               
                
               
                    header("refresh:3;admin_edit_details.php");
                
                    echo "<div>";
                    echo "Details changed sucessfully";
                    echo "<br>";
                    echo "The page will refresh automatically";
                    echo "</div>";
                }
            
            else{
                echo "Please select the player you want to change";
            }

                
                
            
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        ?>


</body>
</html>