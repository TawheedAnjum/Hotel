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
    <link rel="stylesheet" href="css/viwer_hotel_profile.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
    <!-- font-family: 'Roboto', sans-serif;
    font-family: 'Cookie', cursive;
    font-family: 'Norican', cursive;
    font-family: 'Montez', cursive; -->
</head>

<body>
    <header>
        <div class="container">
            <div class="myNavbar">
                <div class="logo">
                    <img src="images/logo.svg" alt="logo" height="40px" width="auto">
                </div>
                <div class="head2">
                    <div class="n-item"><a href="viwer.php">Hotel</a></div>
                    <div class="n-item button"><a href="index.php" class="btn1" style="color: white;">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'hotel';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_GET['id'])) :
    ?>

        <?php
        $id = $_GET['id'];

        $sql3 = "SELECT * FROM hotel_profile WHERE id='$id'";
        $result3 = mysqli_query($conn, $sql3);
        while ($row3 = mysqli_fetch_array($result3)) {

            echo "
    <main class='container'>
        <!-- hotel image -->
        <div class='img_body'>
            <div class='header_img'>                
                    <img src='db_image/" . $row3['img1'] . "' width='680' height='480'>
              
            </div>
            <div class='other_img'>
                <img src='db_image/" . $row3['img2'] . "' width='420' height='235' style='margin-bottom: 10px; margin-left: 10px;'>
                <img src='db_image/" . $row3['img3'] . "' height='235px' width='420px' style='margin-left: 10px;'>
            </div>
        </div>

        <!-- Information -->
        <div class='info'>
            <div class='body1'>
                <div class='header'>
                    <div align='right'>
                        <a href='#' style='background-color: rgb(230, 230, 230); color: black; margin-right: 5px;'>Free Wifi</a>
                        <a href='#'>Parking</a></div>";
            echo "<h4>" . $row3['name'] . "</h4>
                    <p>" . $row3['adress'] . "</p>
                </div>
                <div class='description'>
                    <h4>Hotel Description</h4>
                    <p>" . $row3['description'] . "</p>
                </div>
            </div>
            <div class='body2'>
                <b>Hotel Contact:</b>
                <p style='margin-bottom: 1rem;'>
                    Email: "  . $row3['hotel_email'] . " <br>
                    Phone: " . $row3['phone'] . "<br>
                    Phone: " . $row3['area'] . "<br>
                    Adress:" . $row3['adress'] . "
                </p>
                <b>Room price</b>
                <p style='margin-bottom: 1rem;'>
                    Maximum Price:" . $row3['rmax'] . "<br>
                    Minimum Price:" . $row3['rmin'] . "
                </p>

                <hr style='margin-bottom: .5rem;'>
                Parking: Availabe <br>
                <hr style='margin-Top: .5rem;'>
            </div>
        </div>

    </main>
    ";
        }
        ?>

        <!-- room -->
        <div class="container room_flex mt-5">
            <div class="room_position">
                <!-- php -->
                <?php
                // image
                $sql3 = "SELECT * FROM hotel_profile WHERE id='$id'";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_array($result3);
                $img1 = $row3['img1'];

                // room
                $room_sql = "SELECT * FROM room WHERE hotel_id='$id'";
                $room_result = mysqli_query($conn, $room_sql);
                while ($room_row = mysqli_fetch_array($room_result)) :
                ?>
                    <a href="booking.php?room_id=<?php echo $room_row['room_id']; ?>">
                        <div class="room_info m-4">

                            <div class="photo" style="padding: 10px;">
                                <?php
                                echo "<img src='db_image/" . $img1 . "' height='100px' width='140px' alt=''>";
                                ?>
                            </div>

                            <div class="info_of_room">
                                <div class="room_name">
                                    <img src="images/room.svg" height="20px" width="20px" alt="" style="margin-right:5px;">
                                    <?php echo $room_row['room_name'];  ?>
                                </div>
                                <div class="bed">
                                    <img src="images/bed.svg" height="20px" width="20px" alt="" style="margin-right:5px;">
                                    <?php echo $room_row['bed'];  ?>
                                </div>
                                <div class="wifi">
                                    <img src="images/wifi.svg" height="20px" width="20px" alt="" style="margin-right:5px;">
                                    <?php echo $room_row['wifi'] . " WIFI";  ?>
                                </div>
                            </div>

                        </div>
                    </a>
                <?php endwhile ?>

            </div>

        </div>
        </div>


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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function sweet() {
            swal("Room Bookeds", "You clicked the button!", "success");
        }
    </script>

</body>
<?php endif  ?>

</html>