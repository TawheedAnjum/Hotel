<!doctype html>
<html lang="en">

<head>
    <title>Hotal ticket booking</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/index.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Marck+Script&family=Roboto&display=swap" rel="stylesheet">

</head>

<body>

    <!-- carsol -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="1000" style="text-align: center;">
                <img src="images/header1.jpg" class="d-block w-100 h-100 card-img" alt="...">
                <div class="carousel-caption d-none d-md-block card-img-overlay">
                    <h1 style="margin-bottom: 4rem;">Let's find your beautiful place to get lost</h1>
                    <a href="login.php" class="btn2">Login</a>
                    <a href="register.php" class="btn3">Register</a>
                </div>
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="images/header2.jpg" class="d-block w-100 h-100 card-img" alt="...">
                <div class="carousel-caption d-none d-md-block card-img-overlay">
                    <h1 style="margin-bottom: 3rem;">Don't quit your day dream </h1>
                    <a href="login.php" class="btn2">Login</a>
                    <a href="register.php" class="btn3">Register</a>
                </div>
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="images/header3.jpg" class="d-block w-100 h-100 card-img" alt="...">
                <div class="carousel-caption d-none d-md-block card-img-overlay">
                    <h1 style="margin-bottom: 3rem;">Don't quit your day dream</h1>
                    <a href="login.php" class="btn2">Login</a>
                    <a href="register.php" class="btn3">Register</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- header -->
    <div class="mainhead fixed-top">
        <div class="container">
            <div class="header">
                <div class="myNavbar">
                    <div class="logo">
                        <img src="images/logo.svg" alt="logo" height="40px" width="auto">
                    </div>
                    <div class="head2">
                        <div class="n-item"><a href="#">Home</a></div>
                        <div class="n-item"><a href="#" onclick="sweet()">Hotel Room</a></div>
                        <div class="n-item"><a href="" onclick="sweet()">Contact</a></div>
                        <div class="n-item button"><a href="login.php" class="btn1">Login/Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    if(isset($_SESSION['logemail'])){
    session_destroy();
    } ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function sweet() {
            swal("Please Login First", "", "error");
        }
    </script>
</body>

</html>