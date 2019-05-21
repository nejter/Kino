<?php
session_start();
include('db.php');
if(isset($_COOKIE["error"])) {
    $error = $_COOKIE["error"];
    setcookie("error", '', time() - 3600);
}
else {
    $error = "";
}
if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $connection = mysqli_connect($dbServername, $dbUsername, $dbPassword);
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $db = mysqli_select_db($connection, $dbName);
        $password = md5($password);
        $query = mysqli_query($connection, "select * from users where password='$password' AND username='$username'");
        $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
        $count = mysqli_num_rows($query);
        if($count == 1) {
        $_SESSION["login_user"] = $username;
        header("location: myAccount.php");
        }else {
        $error = "Login lub hasło nieprawidłowe";
    }
    mysqli_close($connection);
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link href="css/login.css" rel="stylesheet">

</head>
<body class="bg-primary">
    <div class="form form-group">
        <p class="h5 text-center"> <?php
            echo $error; ?> </p>
        <form class="login-form d-inline p-2" id="loginForm" method="POST">
            <input type="text" placeholder="Użytkownik" id="username" name="username" required/>
            <input type="password" placeholder="Hasło" id="password" name="password" required/>
            <button type="submit" name="submit">Zaloguj</button>
            <p class="message">Nie masz konta? <a href="register.php">Zarejestruj</a></p>
        </form>

</div>
</body>
</html>