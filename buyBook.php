<?php
session_start();

include('db.php');

$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword);
date_default_timezone_set('Europe/Warsaw');
if (isset($_SESSION['login_user'])) {
    $db = mysqli_select_db($connection, $dbName);
    $username = $_SESSION["login_user"];
    $title = $_COOKIE["title"];
    $price = $_COOKIE["price"];
    $isbn = $_COOKIE["isbn"];
    $today = date("d.m.y G:i:s");
    $checkQuery = mysqli_query($connection, "SELECT * FROM books WHERE title='$title' AND username='$username'");
    $row = mysqli_fetch_array($checkQuery, MYSQLI_ASSOC);
    $count = mysqli_num_rows($checkQuery);

    if($count == 0) {
        $query = "INSERT INTO books (username, title, price, isbn, buyDate)
                    VALUES('$username', '$title', '$price', '$isbn', '$today' )";
        mysqli_query($connection, $query);
        mysqli_close($connection);
        setcookie("boughtBook", true);
        header('location: myAccount.php');
    } else {
        setcookie("bookAlreadyBought", true);
        header('location: myAccount.php');
    }
} else {
    setcookie("error", "Proszę się najpierw zalogować");
    header('location: login.php');
}
