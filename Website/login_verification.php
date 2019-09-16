<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Verification</title>
    <link  rel="stylesheet" href="stylesheet.css">
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
                
                
                $player_tag = $_POST['player_tag'];
                $password = $_POST['password'];
                
                
                $sql = $conn->prepare("SELECT * FROM players WHERE player_tag = ? AND player_password = ?");
                $sql -> bindValue(1, "$player_tag");
                $sql -> bindValue(2, "$password");
                $sql -> execute();
   
                
                if($sql->rowCount()) 
                    { 
                        
                        $row = $sql -> fetch();

                        if ($row['user_type'] == 'admin'){
                            
                            $_SESSION["login"] = "admin";

                            $_SESSION["player_tag"] = $row['player_tag'];
                            $_SESSION["player_id"] = $row['player_id'];
                            $_SESSION["team_id"] = $row['team_id'];
                            

                            header('Location: login_2_admin.php'); 
                        }
                        else if ($row['user_type'] == 'player'){
                            
                            $_SESSION["login"] = "player";
                           
                            $_SESSION["player_tag"] = $row['player_tag'];
                            $_SESSION["player_id"] = $row['player_id'];
                            $_SESSION["team_id"] = $row['team_id'];

                            header('Location: login_2_player.php'); 
                        }
                    
                    
                    
                    
                    }
                else
                    {
                        header("refresh:5;login.php");
                        echo ("<div>");
                        echo("Player Tag/Password combination does not exist. Try again"); 
                        echo("<br>");
                        echo("The page will refresh automaticaly");
                        echo("</div>");
                    }
                
            }
            else 
            {
               header("refresh:5;login.php");
               echo("Please login before accessing the page"); 
            }
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        ?>


</body>
</html>