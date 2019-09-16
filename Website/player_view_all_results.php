<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >
    <title>View all matches</title>
</head>
<body>
<?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports";
        

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      
                $sql = $conn->prepare("SELECT * FROM matches");
                $sql -> execute();


                
                echo "<div>
                <table border=1>
                <tr>
                <th>Match ID:</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Result</th>
                </tr>
                </div>";

                if($sql->rowCount()) {

                    while ($row = $sql->fetch()) 
                    {   
                        $team1_id = $row['team1_id'];
                        $team2_id = $row['team2_id'];
                        $result = $row['result'];

                        $team1_name = $conn->prepare("SELECT team_name FROM teams WHERE team_id LIKE ?");
                        $team1_name -> bindValue(1, "%$team1_id%");
                        $team1_name -> execute();

                         $team_1_name_row = $team1_name->fetch();

                        $team1_name = $team_1_name_row["team_name"];

                        $team2_name = $conn->prepare("SELECT team_name FROM teams WHERE team_id LIKE ?");
                        $team2_name -> bindValue(1, "%$team2_id%");
                        $team2_name -> execute();

                        $team_2_name_row = $team2_name->fetch();

                        $team2_name = $team_2_name_row["team_name"];

                        $winning_team_name = $conn->prepare("SELECT team_name FROM teams WHERE team_id LIKE ?");
                        $winning_team_name -> bindValue(1, "%$result%");
                        $winning_team_name -> execute();

                        $winning_team_name_row = $winning_team_name->fetch();

                        $winning_team_name = $winning_team_name_row["team_name"];

                        echo "<tr>";
                        echo '<td> ' . $row['match_id'] . '</td>';
                        echo '<td> ' . $team1_name . '</td>';
                        echo '<td> ' . $team2_name . '</td>';
                        echo '<td> ' . $winning_team_name . '</td>';
                        echo "</tr>";

                    }
        
        echo"</table>";
            
                    }
                else
                    {
                        echo 'No matches found';
                    }
                   
                }
                
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage(); 
                }
        

        ?>

<form action="login_2_player.php">
        <input type="submit" value="Go Back">
    </form>
</body>
</html>