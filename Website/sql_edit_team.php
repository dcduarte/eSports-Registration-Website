<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit user information</title>
    <link  rel="stylesheet" href="stylesheet.css" >  

</head>
<body>
    <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "esports";
        
        try {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {

               
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $team_id = $_GET['team_id'];
                $team_name = $_POST['team_name'];
                $team_captain = $_POST['player_tag'];

                $sql = $conn->prepare("UPDATE teams SET team_name = ?, team_captain = ? WHERE team_id = ?");
                $sql -> bindValue(1, "$team_name");
                $sql -> bindValue(2, "$team_captain");
                $sql -> bindValue(3, "$team_id");
               
                $sql -> execute();


                
                    header("refresh:3;login_2_admin.php");
                    echo "<div>";
                    echo "Details changed sucessfully";
                    echo "<br>";
                    echo "The page will refresh automatically";
                    echo "</div>";
                
            
            
                }
            else{
                echo "Please select the player you want to change";
            }

                
                
            
        }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        ?>


</body>
</html>