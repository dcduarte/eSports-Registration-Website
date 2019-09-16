<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="stylesheet" href="stylesheet.css" >
    <title>Delete Matches</title>
</head>
<body>
<div>
<form action="sql_delete_matches.php" method="POST">
        <!--Delete Teams dropdown-->
        <p>Delete a match</p>
        <select id="match_id" name="match_id">
            <option value="default" selected>Select the match id to delete</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "esports";

            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $conn->prepare("SELECT match_id FROM matches");

                $sql -> execute();
    
                if($sql->rowCount()) {

                     while ($row = $sql->fetch()) 
                    {
                         echo '<option value="' .  $row['match_id']  . '">' . $row['match_id'] . '</option><br>';

                    } 
                }
                else
                {
                    echo 'No matches found on the database'; 
                }
             }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
            ?>
            </select>
            <input type="submit" value="Delete selected match" onclick="return confirm('Are you sure you want to delete this player?')">
</form>
<form action="admin_remove.php">
           <input type="submit" value="Go Back">
           </form>
</div>
</body>
</html>