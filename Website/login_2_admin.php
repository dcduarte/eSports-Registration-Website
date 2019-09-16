<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link  rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
$session_type = $_SESSION["login"];

if ($session_type == 'admin'){
    echo'<div>
    <h2>Login sucessful. Please select the page you want to use</h2>
    <form action="admin_registrations.php">
        <input type="submit" value="Register players,admins and teams">
    </form>
    <form action="register_matches.php">
    <input type="submit" value="Create a new match">
</form>
    <form action="admin_edit_details.php">
        <input type="submit" value="Edit information">
    </form>
    <form action="admin_remove.php">
        <input type="submit" value="Delete players,admins, teams and matches">
    </form>
    <form action="logout.php">
        <input type="submit" value="Log out" onclick="return confirm(\'Are you sure you want to log out?\')">
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