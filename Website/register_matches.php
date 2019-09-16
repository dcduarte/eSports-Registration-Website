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
<form action="sql_register_matches.php" method="POST">

        <!--Team 1 Dropdown-->
        <select id="team1_id" name="team1_id">
            <option value="" disabled selected>Select the first team</option>
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

            <!--Team 2 Dropdown-->
        <select id="team2_id" name="team2_id">
            <option value="" disabled selected>Select the second team</option>
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

 <!--Winning team Dropdown-->
        <select id="winning_team" name="winning_team">
            <option value="" disabled selected>Select the winning team</option>
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
        <form action="login_2_admin.php">
        <input type="submit" value="Go back">
    </form>
    </div>
</body>
</html>