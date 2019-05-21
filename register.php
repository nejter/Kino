<?php
include('db.php');
session_start();
$username = "";
$email    = "";
$errors = array();
$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword);

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $username = $_POST['username'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  $email = $_POST['email'];

  $username = stripslashes($username);
  $password1 = stripslashes($password1);
  $password2 = stripslashes($password2);
  $email= stripslashes($email);
  $username = mysqli_real_escape_string($connection, $username);
  $password1 = mysqli_real_escape_string($connection, $password1);
  $password2 = mysqli_real_escape_string($connection, $password2);
  $email = mysqli_real_escape_string($connection, $email);
  $db = mysqli_select_db($connection, $dbName);

    if ($password1 != $password2) {
      array_push($errors, "Hasła nie są takie same.");
  }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
        array_push($errors, "Nazwa użytkownika jest zajęta.");
    }

    if ($user['email'] === $email) {
        array_push($errors, "Email jest już zajęty.");
    }
  }

    if (count($errors) == 0) {
    $password = md5($password1);

    $query = "INSERT INTO users (username, password, email) 
  			  VALUES('$username', '$password', '$email')";
    mysqli_query($connection, $query);
    mysqli_close($connection);

    $_SESSION['login_user'] = $username;
    header('location: myAccount.php');
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarejestruj</title>
    <link href="css/login.css" rel="stylesheet">

</head>
<body class="bg-primary">
    <div class="form form-group">
        <p class="h5 text-center"> <?php  if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
        <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
    <?php  endif ?> </p>
        <form class="login-form" id="registerForm" method="POST">
            <input type="text" placeholder="Użytkownik" id="username" name="username" minlength=5 required/>
            <input type="password" placeholder="Hasło" id="password1" name="password1" minlength=5 required/>
            <input type="password" placeholder="Powtórz hasło" id="password2" name="password2" minlength=5 required/>
            <input type="email" placeholder="Email" id="email" name="email" required/>
            <button type="submit" name="submit">Zarejestruj</button>
            <p class="message">Masz już konto? <a href="login.php">Zaloguj</a></p>
        </form>
</div>
</body>
</html>