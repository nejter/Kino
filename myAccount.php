<?php
session_start();
include('db.php');

$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword);
$db = mysqli_select_db($connection, $dbName);
$username = $_SESSION["login_user"];
$query = mysqli_query($connection, "select * from books where username='$username'");

if (isset($_COOKIE["boughtBook"])&& $_COOKIE["boughtBook"] == true) {
    $title = $_COOKIE["title"];
}
if (isset($_COOKIE["bookAlreadyBought"])&& $_COOKIE["bookAlreadyBought"] === "1") {
    $bookAlreadyBoughtTitle = $_COOKIE["title"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Moje konto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">WSBKINO.PL</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button"
                data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="repertoire.php">Repertuar</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">Wyloguj</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary" style="height: 50px">
</header>

<div class="modal fade" id="bookAlreadyBoughtModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <blockquote class="blockquote text-center">
                    Już wcześniej kupiłeś <?php echo $bookAlreadyBoughtTitle ?>
                </blockquote>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Pokaż</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="boughtBook" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <blockquote class="blockquote text-center">
                    Kupiłeś <?php echo $title ?>
                    <i class="far fa-smile"></i>
                </blockquote>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalLoginFirst" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <blockquote class="blockquote text-center">
                    Tutaj powinno nastąpić pobranie ebooka
                </blockquote>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>

<section class="portfolio bg-primary">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-lg-5">Twoje bilety</h2>
        <div class="table-responsive">
            <table class="table table-responsive w-100 d-block d-md-table table-hover text-center">
                <tr class="header">
                    <?php if (mysqli_num_rows($query) != 0)
                        echo "<td class=\"font-weight-bold\" >Tytuł</td>
                <td class=\"font-weight-bold\">ISBN</td>
                <td class=\"font-weight-bold\">Data</td>
                <td class=\"font-weight-bold\">Cena</td>
                <td class=\"font-weight-bold\">PDF</td>
                    " ?>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["isbn"] . "</td>";
                    echo "<td>" . $row["buyDate"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td><button type='submit' class='btn-secondary' data-toggle='modal' data-target='#modalLoginFirst'>Pobierz</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Lokalizacja</h4>
                <p class="lead mb-0">61-813 Poznań
                    <br>Ratajczaka 5</p>
            </div>
            <div class="col-md-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">Znajdź nas w internecie</h4>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light btn-social text-center rounded-circle"
                           href="http://www.facebook.com">
                            <i class="fab fa-fw fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light btn-social text-center rounded-circle"
                           href="http://www.google.com">
                            <i class="fab fa-fw fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light btn-social text-center rounded-circle"
                           href="http://www.twitter.com">
                            <i class="fab fa-fw fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4 class="text-uppercase mb-4">Najlepsze kino</h4>
                <p class="lead mb-0">Poleć nas swoim znajomym!</p>
            </div>
        </div>
    </div>
</footer>

<div class="copyright py-4 text-center text-white">
    <div class="container">
        <small>Copyright &copy; WSBKino 2019</small>
    </div>
</div>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Bootstrap core JavaScript -->

<!-- Plugin JavaScript -->

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>
<script src="js/bookApi.js"></script>
<script src="js/custom.js"></script>

<!-- Custom scripts for this template -->

</body>

</html>
