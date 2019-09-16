<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>Player Registration</title>
</head>
<body>
    <div>
    <form action="sql_register_admin.php" method="POST">
        <label for="player_tag">Player Tag: </label>
        <input type="text" id="player_tag" name="player_tag" required>
        <br />
        <label for="player_firstname">First Name: </label>
        <input type="text" id="player_firstname" name="player_firstname" required>
        <br />
        <label for="player_surname">Player Surname: </label>
        <input type="text" id="player_surname" name="player_surname" required>
        <br />       
        <label for="player_password">Password: </label>
        <input type="password" id="player_password" name="player_password" required>
        <br />

        <!--Team selection Dropdown-->
        <select id="team_id" name="team_id">
            <option value="" disabled selected>Select the player's team</option>
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
        <br />
        <input type="submit" value="Register">
    </form>
    <form action="admin_registrations.php">
        <input type="submit" value="Go back">
    </form></div>
</body>
</html>