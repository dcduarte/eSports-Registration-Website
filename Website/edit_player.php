<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit my account</title>
        <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "esports";
 $player_id = $_POST["player_id"];  

 if($player_id == 'default'){
    echo "<div>";
    header("refresh:5;admin_edit_details.php");
    echo "No selection made";
    echo "<br>";
    echo "The page will refresh automaticaly";
    echo "</div>";
 }
 else{

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("SELECT * FROM players WHERE player_id = ?");
     $sql -> bindValue(1, "$player_id");
    $sql -> execute();

    $row = $sql->fetch();

 
    $player_tag = $row['player_tag'];
    $player_firstname = $row['player_firstname'];
    $player_surname = $row['player_surname'];
    $player_password = $row['player_password'];
    $team_id = $row['team_id'];

?>
    <div>
    <p>Edit player details</p>
    <form action="sql_edit_player.php?player_id=<?php echo $player_id;?>" method ="POST">
        <label for="player_tag">Player Tag</label>
        <input type="text" name="player_tag" id="player_tag" required value="<?php echo $player_tag;?>">
        <br>
        <label for="player_firstname">Player First Name</label>
        <input type="text" name="player_firstname" id="player_firstname" required value="<?php echo $player_firstname;?>">
        <br>
        <label for="player_surname">Player Surname</label>
        <input type="text" name="player_surname" id="player_surname" required value="<?php echo $player_surname;?>">
        <br>

     <!--Team selection Dropdown-->
 <p>Select the player's team</p>
        <select id="team_id" name="team_id">
            <option value="" disabled selected>Select the team</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "esports";

            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $conn->prepare("SELECT team_id, team_name FROM teams");

                $sql -> execute();
    
                if($sql->rowCount()) {

                     while ($row = $sql->fetch()) 
                    {
                         echo '<option value="' .  $row['team_id']  . '">' . $row['team_name'] . '</option><br>';

                    } 
                }
                else
                {
                    echo 'No teams found on the database'; 
                }
             }

                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
 
            echo '</select>
        <br>
        <input type="submit" value="Edit details" onclick="return confirm(\'Are you sure you want to edit this player?\')">
    </form>
    <form action="admin_edit_details.php">
        <input type="submit" value="Go back">
    </form>
    </div>';
}
            
?>
    
</body>
</html>