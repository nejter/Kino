<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Repertuar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body id="page-top" class="bg-primary">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">WSBKINO.PL</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Strona główna</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['login_user'])) {
                        echo
                            "<li class=\"nav-item mx-0 mx-lg-1\">
                        <a href=\"login.php\" class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\">Zaloguj</a>
                    </li>
                    <li class=\"nav-item mx-0 mx-lg-1\">
                        <a href=\"register.php\" class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\">Zarejestruj</a>
                    </li>
                    ";
                    } else {
                        echo
                            "<li class=\"nav-item mx-0 mx-lg-1\">
                        <a href=\"myAccount.php\" class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\">Moje konto</a>
                    </li>
                    ";
                    }
                    ?>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php">Wyloguj</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary pb-lg-5">
    </header>

    <div class="container bg-primary pt-5 pb-lg-5">

        <div class="row">

            <div class="col-lg-3">

                <div class="my-5"></div>
                <div class="dropdown">
                    <input class="list-group-item" href="#" role="button" id="cities" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="<?php
                                                                                                                                                                if (isset($_POST['city'])) {
                                                                                                                                                                    echo $_POST['city'];
                                                                                                                                                                } else echo 'Poznań' ?>" style="color: #18BC9C">
                    <div class="dropdown-menu" aria-labelledby="cities">
                        <a class="dropdown-item" href="#" id="poznan">Poznań</a>
                        <a class="dropdown-item" href="#" id="swarzedz">Swarzędz</a>
                        <a class="dropdown-item" href="#" id="lubon">Luboń</a>
                        <a class="dropdown-item" href="#" id="tarnowo">Tarnowo Podgórne</a>
                    </div>
                </div>
                <input class="list-group-item" role="button" name="performanceDate" type="text" id="performanceDate" value="<?php
                                                                                                                            if (isset($_POST['performanceDate'])) {
                                                                                                                                echo $_POST['performanceDate'];
                                                                                                                            } else echo date("Y-m-d") ?>" style="color: #18BC9C">
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9 pt-5">

                <div class="row" id="bookBox">

                    <div class="col-lg-4 col-md-6 mb-4" id="exampleBox" style="display: none">
                        <div class="card h-100">
                            <a><img id="photo" class="card-img-top" height="300"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <p id="title"></p>
                                </h4>
                                <h5 id="price"></h5>
                                <p class="card-text" id="description"></p>
                            </div>
                            <form action="buyBook.php" id="buyBookForm" method="POST">
                                <div class="card-footer" id="buyButton">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>

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
                            <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://www.facebook.com">
                                <i class="fab fa-fw fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://www.google.com">
                                <i class="fab fa-fw fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light btn-social text-center rounded-circle" href="http://www.twitter.com">
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
            <small>Copyright &copy; wsbkino.pl 2019</small>
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
    <script src="js/repertoire.js"></script>
    <script src="js/custom.js"></script>

    <!-- Custom scripts for this template -->

</body>

</html>