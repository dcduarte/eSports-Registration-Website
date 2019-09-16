<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Player landing page</title>
    <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
<div>
<?php
$session_type = $_SESSION["login"];

if ($session_type == 'player'){
   echo' <h2>Login sucessful. Please select the page you want to use</h2>
    <form action="player_view_all_results.php">
    <input type="submit" value="View all matches">
    </form>
    <form action="player_view_team_info.php">
        <input type="submit" value="View team information">
    </form>
    <form action="player_view_other_team.php">
        <input type="submit" value="View other teams information">
    </form>
    <form action="player_update_information.php">
        <input type="submit" value="Update account information">
    </form>
    <form action="logout.php">
        <input type="submit" value="Log out">
        </form>
    </div>';
}
else{
    header("refresh:3;login.php");
    echo "<div>";
    echo "Only players can access this page";
    echo "<br>";
    echo "The page will refresh automatically";
    echo "</div>";}
?>
</body>
</html>