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
<div>
<form action="sql_delete_players.php" method="POST">
        <!--Edit Player dropdown-->
        <h3>Delete an admin or player</h3>
        <select id="player_id" name="player_id">
            <option value="default" selected>Select the player tag to delete</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "esports";

            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $conn->prepare("SELECT player_id, player_tag FROM players");

                $sql -> execute();
    
                if($sql->rowCount()) {

                     while ($row = $sql->fetch()) 
                    {
                         echo '<option value="' .  $row['player_id']  . '">' . $row['player_tag'] . '</option><br>';

                    } 
                }
                else
                {
                    echo 'No players found on the database'; 
                }
             }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
            ?>
            </select>
            <input type="submit" value="Delete selected player" onclick="return confirm('Are you sure you want to delete this player?')">
</form>
<form action="admin_remove.php">
           <input type="submit" value="Go Back">
           </form>
</div>
</body>
</html>