<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/login.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <!-- carsol -->
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="2000">
                <img src="images/header1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="images/header2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="images/header3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <?php if (isset($_GET['error'])): ?>
        <script>
           swal("invalid login", "", "error");
        </script>
    <?php endif ?>

    <!-- header -->
    <div class="mainhead fixed-top">
        <div class="container">
            <div class="header">
                <div class="myNavbar">
                    <div class="logo">
                        <img src="images/logo.svg" alt="logo" height="40px" width="auto">
                    </div>
                    <div class="head2">
                        <div class="n-item"><a href="index.php">Home</a></div>
                        <div class="n-item"><a href="#" onclick="sweet()">Hotel Room</a></div>
                        <div class="n-item"><a href="#" onclick="sweet()">Contact</a></div>
                        <div class="n-item button"><a href="register.php" class="btn1">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- login frame -->
    <div class="container">
        <div class="login-frame">
            <form action="logindb.php" method="POST">
                <table>
                    <tr>
                        <th> <input type="text" name="email" placeholder="username" /></th>
                    </tr>
                    <tr>
                        <th> <input type="password" name="password" placeholder="password" /></th>
                    </tr>
                    <tr>
                        <th style="color: white"><input type="submit" value="Login" class="login"></th>
                    </tr>

                    <tr>
                        <th>
                            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

    <script>
        function sweet() {
            swal("Please Login First", "", "error");
        }
    </script>
</body>

</html>