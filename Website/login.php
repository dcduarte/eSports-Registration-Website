<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link  rel="stylesheet" href="stylesheet.css" >

</head>
<body>
        <div>
    <h1>Login below:</h1>
    <form action="login_verification.php" method="POST">
        <label for="player_tag">Player Tag: </label>
        <input type="text" id="player_tag" name="player_tag" required>
        <br />
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required>
        <br />
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>