<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>Update player information</title>
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

                $player_password = $_POST['player_password'];
                $player_confirm_password = $_POST['player_confirm_password'];

                if ($player_password == $player_confirm_password){
               
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $player_id = $_SESSION["player_id"];           
                $player_tag = $_POST["player_tag"];
                $player_firstname = $_POST["player_firstname"];
                $player_surname = $_POST["player_surname"];

                $sql = $conn->prepare("UPDATE players SET player_tag = ?, player_firstname = ?, player_surname = ?, player_password = ? WHERE player_id =?");

                $sql -> bindValue(1, "$player_tag"); 
                $sql -> bindValue(2, "$player_firstname");
                $sql -> bindValue(3, "$player_surname");
                $sql -> bindValue(4, "$player_password");
                $sql -> bindValue(5, "$player_id");
               
                $sql -> execute(); 

                
          
                header("refresh:3;login_2_player.php");
                echo "<div>";
                echo "Details changed sucessfully";
                echo "<br>";
                echo "The page will refresh automatically";
                echo "</div>";
                }
            
            else{
                header("refresh:3;player_update_information.php");
                echo "<div>";
                echo "Passwords don't match";
                echo "<br>";
                echo "The page will refresh automatically";
                echo "</div>";
            }
            }

            else{

                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); 
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $player_id = $_SESSION["player_id"];  
                $sql = $conn->prepare("SELECT * FROM players WHERE player_id = ?");
                $sql -> bindValue(1, "$player_id");
                $sql -> execute(); 

                $row = $sql->fetch();

                
                $player_tag = $row['player_tag'];
                $player_firstname = $row['player_firstname'];
                $player_surname = $row['player_surname'];
                $team_id = $row['team_id'];



                include "player_update_information_form.php";
            }

                
                
            
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        ?>
</body>
</html>