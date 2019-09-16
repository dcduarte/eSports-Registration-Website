<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >  
    <title>Register player</title>
</head>
<body>
    <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports"; 
        

        $team1_id = $_POST['team1_id'];
        $team2_id = $_POST['team2_id'];
        $result = $_POST['winning_team'];
       
        //Check if winning team is playing the match
        if ($result == $team1_id || $result == $team2_id){
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql = "INSERT INTO matches(match_id, team1_id, team2_id, result) VALUES (0, '$team1_id', '$team2_id', '$result')";
                
                $conn->exec($sql);
                
                echo "<div>";
                echo "Match created successfully";
               echo" <form action='register_matches.php'>
                        <input type='submit' value='Continue registering matches'>
                    </form>
                    <form action='login_2_admin.php'>
                        <input type='submit' value='Go back to the admin homepage'>
                    </form>";
                echo "</div>";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage(); 
                }
        }
        
        else{
        echo "<div>";
        header("refresh:5;register_matches.php");
        echo "The winning team must be a participating team";
        echo "<br>";
        echo "The page will refresh automaticaly";
        echo "</div>";
        }
       
        ?>


</body>
</html>