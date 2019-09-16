<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >
    <title>Delete Players</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "esports";
    $player_id = $_POST['player_id'];
    if($player_id == 'default'){
        echo "<div>";
        header("refresh:5;delete_players.php");
        echo "No selection made";
        echo "<br>";
        echo "The page will refresh automaticaly";
        echo "</div>";
     }
     else{
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = $conn->prepare("DELETE FROM players WHERE player_id LIKE ?");
    $sql -> bindValue(1, "%$player_id%"); 
    $sql -> execute(); 

    echo "<div>";
    header("refresh:5;login_2_admin.php");
    echo "Player deleted";
    echo "<br>";
    echo "The page will refresh automaticaly";
    echo "</div>";
}
catch(PDOException $e)
                    {
                    echo $sql . "<br>" . $e->getMessage(); 
                    }
                
                
                
            }
                        
            ?>      
    
</body>
</html>