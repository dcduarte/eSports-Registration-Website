<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>Team Registration</title>
</head>
<body>
    <div>
    <form action="sql_register_team.php" method="POST">
    <label for="team_name">Team Name: </label>
    <input type="text" id="team_name" name="team_name" required>
        <br />   
        <select id="team_captain" name="team_captain">
            <option value="" disabled selected>Select the team captain</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "esports";

            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $conn->prepare("SELECT player_tag FROM players");

                $sql -> execute();
    
                if($sql->rowCount()) {

                     while ($row = $sql->fetch()) 
                    {
                         echo '<option value="' .  $row['player_tag']  . '">' . $row['player_tag'] . '</option><br>';

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
            <br />
        <input type="submit" value="Register">
        </form>
        
</div>
</body>
</html>