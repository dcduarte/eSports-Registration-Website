<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit my account</title>
        <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>

<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "esports";
 $team_id = $_POST["team_id"]; 

 if($team_id == 'default'){
    echo "<div>";
    header("refresh:5;admin_edit_details.php");
    echo "No selection made";
    echo "<br>";
    echo "The page will refresh automaticaly";
    echo "</div>";
 }
 else{
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = $conn->prepare("SELECT * FROM teams WHERE team_id = ?");
    $sql -> bindValue(1, "$team_id");
    $sql -> execute(); 

    $row = $sql->fetch();

 
    $team_name = $row['team_name'];
   

?>
    <div>
    <p>Edit player details</p>
    <form action="sql_edit_team.php?team_id=<?php echo $team_id;?>" method ="POST">
        <label for="team_name">Team Name</label>
        <input type="text" name="team_name" id="team_name" required value="<?php echo $team_name;?>">
        <br>
        <!--Edit Player dropdown-->
        <p>Team Captain</p>
        <select id="player_tag" name="player_tag">
            <option value="" disabled selected>Change team Captain</option>
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
           
          echo' </select>
        <input type="submit" value="Edit team details" onclick="return confirm(\'Are you sure you want to edit this team?\')">
    </form>
    <form action="login_2_admin.php">
           <input type="submit" value="Go Back">
           </form>
    </div>';

}
            
            ?>  
</body>
</html>