<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit information</title>
    <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
    <div>
    <p>Edit your account details</p>
    <form action="player_update_information.php" method ="POST">
        <label for="player_tag">PLayer Tag</label>
        <input type="text" name="player_tag" id="player_tag" required value="<?php echo $player_tag;?>">
        <br>
        <label for="player_firstname">First Name</label>
        <input type="text" name="player_firstname" id="player_firstname" required value="<?php echo $player_firstname;?>">
        <br>
        <label for="player_surname">Surname</label>
        <input type="text" name="player_surname" id="player_surname" required value="<?php echo $player_surname;?>">
        <br>
        <label for="team_id">Team ID</label>
        <input type="text"  name="team_id" disabled id="team_id" value="<?php echo $team_id;?>">
        <br>
        <label for="player_password">Password</label>
        <input type="password" name="player_password" required id="player_password">
        <br>
        <label for="player_confirm_password">Confirm Password</label>
        <input type="password" name="player_confirm_password" required id="player_confirm_password">
        <br>
        <input type="submit" value="Edit my account">
    </form>
    <form action='login_2_player.php'>
        <input type='submit' value='Go Back'>
        </form>

</div>
    
</body>
</html>