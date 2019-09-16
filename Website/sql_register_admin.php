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
        

        $player_tag = $_POST['player_tag'];
        $player_firstname = $_POST['player_firstname'];
        $player_surname = $_POST['player_surname'];
        $player_password = $_POST['player_password'];
        $team_id = $_POST['team_id'];
        
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO players (player_id, player_tag, player_firstname, player_surname, player_password, team_id, user_type) VALUES (0, '$player_tag', '$player_firstname', '$player_surname', '$player_password', '$team_id', 'admin')";
            
            $conn->exec($sql);
            
            echo "<div>";
            echo "Account created successfully";
           echo" <form action='register_admin.php'>
                    <input type='submit' value='Continue registering admins'>
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
       
        ?>


</body>
</html>