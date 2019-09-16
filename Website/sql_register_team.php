<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css">  
    <title>Register team</title>
</head>
<body>
    <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports"; 
        

        $team_name = $_POST['team_name'];
        $team_captain = $_POST['team_captain'];
       
        
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO teams (team_id, team_name, team_captain) VALUES (0, '$team_name', '$team_captain')";
            
            $conn->exec($sql);
            
            echo "<div>";
            echo "Account created successfully";
           echo" <form action='register_team.php'>
                    <input type='submit' value='Continue registering teams'>
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