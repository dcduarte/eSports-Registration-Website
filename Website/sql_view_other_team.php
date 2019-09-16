<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>View other team info</title>
</head>
<body>
<?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports";
        $team_id = $_POST['team_id'];

        if($team_id == 'default'){
            echo "<div>";
            header("refresh:5;player_view_other_team.php");
            echo "No selection made";
            echo "<br>";
            echo "The page will refresh automaticaly";
            echo "</div>";
         }
         else{
            try {



                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               

                $team_name = $conn->prepare("SELECT team_name FROM teams WHERE team_id LIKE ?");
                $team_name -> bindValue(1, "%$team_id%");
                $team_name -> execute();

                $row = $team_name->fetch();

                $team_name = $row["team_name"];


                $team_games_played = $conn->prepare("SELECT count(*) AS team_games_played FROM matches WHERE team1_id LIKE ? OR team2_id LIKE ?");
                $team_games_played -> bindValue(1, "%$team_id%");
                $team_games_played -> bindValue(2, "%$team_id%");
                $team_games_played -> execute();

                $row = $team_games_played->fetch();

                $team_games_played = $row["team_games_played"];



                $total_games_won = $conn->prepare("SELECT count(*) AS total_games_won FROM matches WHERE result LIKE ?");
                $total_games_won -> bindValue(1, "%$team_id%");
                $total_games_won -> execute();

                $row = $total_games_won->fetch();

                $total_games_won = $row["total_games_won"];

                $win_percentage = ($total_games_won / $team_games_played) * 100;

                
                $sql = $conn->prepare("SELECT * FROM teams INNER JOIN players ON teams.team_id=players.team_id WHERE team_name LIKE ?");
                $sql -> bindValue(1, "%$team_name%");
                $sql -> execute();
                
                
                
                echo "<div>
                <table border=1>
                <tr>
                <th>Team ID:</th>
                <th>Team Name</th>
                <th>Team Captain</th>
                <th>Player ID</th>
                <th>Player Tag</th>
                <th>Player First Name</th>
                <th>Player Surname</th>
                </tr>
                </div>";

                if($sql->rowCount()) {

                    while ($row = $sql->fetch())
                    {   
                        echo "<tr>";
                        echo '<td> ' . $row['team_id'] . '</td>';
                        echo '<td> ' . $row['team_name'] . '</td>';
                        echo '<td> ' . $row['team_captain'] . '</td>';
                        echo '<td> ' . $row['player_id'] . '</td>';
                        echo '<td> ' . $row['player_tag'] . '</td>';
                        echo '<td> ' . $row['player_firstname'] . '</td>';
                        echo '<td> ' . $row['player_surname'] . '</td>';
                        echo "</tr>";

                    }
        
        echo"</table>";
        echo"Team Win Rate:". round($win_percentage,2) . "%";
            
                    }
                else
                    {
                        echo 'No team found';
                    }
                   
                }
                
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage(); 
                }
        

            }
                       echo '<form action="player_view_other_team.php">
                       <input type="submit" value="Previous Page">
                   </form>'    ; 
            ?> 
        

</body>
</html>