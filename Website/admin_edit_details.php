<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>Update information</title>
</head>
<body>
<div>
<form action="edit_player.php" method="POST">
        <!--Edit Player dropdown-->
        <h3>Edit a player</h3>
        <select id="player_id" name="player_id">
            <option value="default" selected>Select the player tag to edit</option>
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
            <input type="submit" value="Edit selected player">
</form>

<form action="edit_team.php" method="POST">
        <!--Edit team dropdown-->
        <h3>Edit a team</h3>
        <select id="team_id" name="team_id">
            <option value="default" selected>Select the team name to edit</option>
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
            ?>
            </select>
            <input type="submit" value="Edit selected team">
</form>
<form action="login_2_admin.php">
        <input type="submit" value="Go back">
    </form>
</div>
</body>
</html>