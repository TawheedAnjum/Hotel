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
    <link rel="stylesheet" href="css/html.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
    <!-- font-family: 'Roboto', sans-serif;
    font-family: 'Cookie', cursive;
    font-family: 'Norican', cursive;
    font-family: 'Montez', cursive; -->
</head>

<body>

    <main class="container">
        <!-- hotel image -->
        <div class="img_body ">
            <div class="header_img">
                <?php
                    echo "<img src='db_image/" . $row3['img1'] . "' width='680' height='480'> ";
                ?>
            </div>
            <div class="other_img">
                <?php 
                echo "<img src='db_image/" . $row3['img2'] . "' width='420' height='235' style='margin-bottom: 10px; margin-left: 10px;'> ";
                echo "<img src='db_image/" . $row3['img3'] . "' height='235px' width='420px' style='margin-left: 10px;'>"; 
                ?>
            </div>
        </div>

        <!-- Information -->
        <div class="info">
            <div class="body1">
                <div class="header">
                    <div align="right">
                        <a href="#" style="background-color: rgb(230, 230, 230); color: black; margin-right: 5px;">Free
                            Wifi</a>
                        <?php echo "<a href='#'>Booking</a>"; ?> </div>
                    <h4><?php echo $row3['hheader'];?></h4>
                    <p><?php echo $row3['adress'];?></p>
                </div>
                <div class="description">
                    <h4>Hotel Description</h4>
                    <p><?php echo $row3['description'];?></p>
                </div>
            </div>
            <div class="body2">
                <b>Hotel Contact:</b>
                <p style="margin-bottom: 1rem;">
                    Email: <?php echo $row3['hemail'];?> <br>
                    Phone: <?php echo $row3['vemail'];?> <br>
                    Adress: <?php echo $row3['adress'];?>
                </p>
                <b>Room price</b>
                <p style="margin-bottom: 1rem;">
                    Room1: $<?php echo $row3['room1'];?> <br>
                    Room1: $<?php echo $row3['room2'];?> <br>
                    Room1: $<?php echo $row3['room3'];?>
                </p>

                <hr style="margin-bottom: .5rem;">
                Parking: Availabe <br>
                <hr style="margin-Top: .5rem;">
            </div>
        </div>

    </main>

    <!-- footer -->
    <footer>
        <div class="contact">
            <div class="container">
                <div class="footer-info">
                    <div class="information">
                        <h4> Contact Us</h4>
                        <p class="foot_p">
                            Email: hotel@gmail.com <br>
                            Phone: 0123456789 <br>
                        </p>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-rss"></i>
                        <i class="fa fa-youtube"></i>
                        <i class="fa fa-linkedin"></i>
                        <i class="fa fa-github"></i>
                    </div>

                    <div class="footer-logo">
                        <img src="images/logo.svg" alt="" height="60px" width="auto">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>