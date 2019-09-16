<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrations</title>
    <link  rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
$session_type = $_SESSION["login"];

if ($session_type == 'admin'){
    echo'<div>
    <form action="delete_players.php">
        <input type="submit" value="Delete players and admins">
    </form>
    <form action="delete_teams.php">
    <input type="submit" value="Delete Teams">
    </form>
    <form action="delete_matches.php">
    <input type="submit" value="Delete Matches">
    </form>
    <form action="login_2_admin.php">
        <input type="submit" value="Go back">
    </form>
    </div>';
}

else{
    header("refresh:3;login.php");
    echo "<div>";
    echo "Only admins can access this page";
    echo "<br>";
    echo "The page will refresh automatically";
    echo "</div>";}
?>
</body>
</html>