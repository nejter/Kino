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

    <title>WSBKino</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
            <a class="navbar-brand js-scroll-trigger" href="#page-top">WSBKino.pl</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#repertoire">Repertuar</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Kontakt</a>
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
                </ul>
            </div>
        </div>
    </nav>


    <!-- Header -->
    <header class="masthead bg-primary">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-interval="3000" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block mx-auto w-60" margin="auto" src="img/baner1.png" alt="First">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto w-60" src="img/baner2.png" alt="Second">
                </div>
                <div class="carousel-item">
                    <img class="d-block mx-auto w-60" src="img/baner3.png" alt="Third">
                </div>
            </div>
        </div>
    </header>

    <!-- Books Grid Section -->
    <section class="portfolio pb-0" id="repertoire">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Repertuar</h2>
            <hr class="star-dark">
            <div class="text-center row">
                <div class="col-lg-3 mx-auto">
                    <form action="repertoire.php" method="post">
                        <div class="form-group">
                            <label>Data seansu</label>
                            <input class="form-control" name="performanceDate" type="text" id="performanceDate">
                        </div>

                        <div class="form-group">
                            <label for="city">Miasto</label>
                            <select class="form-control" id="city" name="city">
                                <option>Poznań</option>
                                <option>Swarzędz</option>
                                <option>Luboń</option>
                                <option>Tarnowo Podgórne</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-xl" id="searchMovieButton">Szukaj</button>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Napisz do nas!</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Imię</label>
                                <input class="form-control" id="name" type="text" placeholder="Imię" required="required" data-validation-required-message="Proszę wprowadzić imię.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Email Address</label>
                                <input class="form-control" id="email" type="email" placeholder="Adres email" required="required" data-validation-required-message="Proszę wprowadzić adres email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Wiadomość</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Wiadomość" required="required" data-validation-required-message="Proszę wprowadzić wiadomość."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Wyślij</button>
                        </div>
                    </form>
                </div>
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
                    <h4 class="text-uppercase mb-4">Najlepsza sieć kin</h4>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/index.js"></script>
    <script src="js/custom.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>