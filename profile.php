<?php if (isset($_GET['error'])) {
    echo "<script>alert('Room already register');;</script>";
}  ?>
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
    <link rel="stylesheet" href="css/profile.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">

<body>

    <header>
        <div class="container">
            <div class="myNavbar">
                <div class="logo">
                    <img src="images/logo.svg" alt="logo" height="40px" width="auto">
                </div>
                <div class="head2">
                    <!-- <div class="n-item"><a href="index.html">Home</a></div> -->
                    <div class="n-item"><a href="login.php">Login</a></div>
                    <!-- <div class="n-item"><a href="">Contact</a></div> -->
                    <div class="n-item button"><a href="index.php" class="btn1" style="color: white;">logout</a>
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

    session_start();
    if (isset($_SESSION["logemail"])) {
        $viwer_email = $_SESSION["logemail"];
    }

    $sql3 = "SELECT * FROM hotel_profile WHERE viwer_email='$viwer_email'";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);

    echo "
    <main class='container'>
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
                        <a href='editroom.php?redit=" . $row3['id'] . "' style='background-color: rgb(230, 230, 230); color: black; margin-right: 5px;'>Edit Room</a>
                        <a href='updateHotel.php?hedit=" . $row3['id'] . "'>Edit</a></div>
                    <h4>" . $row3['name'] . "</h4>
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
                    Area: " . $row3['area'] . "<br>
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
    ?>

    <div class="conatiner">
        <div class="room_div">
            <div class="room_picture">
                <!-- <img src="images/room_picture.jpg" alt=""  height="100%" weidth="100%"> -->
            </div>

            <div class="room">
                <form action="profiledb.php" onsubmit="return validation()" method="post">
                    <Table>
                        <tr>
                            <th><input type="hidden" name="hotel_id" value="<?php echo $row3['id']; ?>"> </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="room">Enter Room Name:</label> <br>
                                <input type="text" id="room" name="room" style="width: 200px">

                                <br><span id="errroom" style="color: red"></span>
                            </th>
                            <th>
                                <label for="room" style="margin-left:5px; width: 80px;">Price:</label> <br>
                                <input type="number" name="price" id="price" style="margin-left:5px; width: 80px;">

                                <br><span id="errprice" style="color: red"></span>
                            </th>
                        </tr>
                    </Table>
                    <table>
                        <tr>
                            <th>
                                <label for="room" style="margin-top:1rem">Bed and person allow:</label> <br>
                                <input type="text" name="bed" id="bed" style="width: 285px">

                                <br><span id="errbed" style="color: red"></span>
                            </th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>
                                <span style="margin-top:1rem;"> WIFI availability: </span>
                                <input type="radio" id="Free" name="wifi" value="Free" style="margin-right: 5px; margin-left:10px; margin-top:1rem;" checked>Free
                                <input type="radio" id="No" name="wifi" value="No" style="margin-right: 5px; margin-left:10px; margin-top:1rem;"> No
                            </th>
                        </tr>
                    </table>
                    <Table>
                        <tr>
                            <th> <input type="submit" name="add" value="Add Room" class="publish" style="margin-top: 1rem"> </th>
                        </tr>
                    </Table>
                </form>
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

    <!-- room valitation -->
    <script>
        function validation() {

            var room = document.getElementById('room').value;
            var price = document.getElementById('price').value;
            var bed = document.getElementById('bed').value;
            
            if (room == "") {
                document.getElementById('errroom').innerHTML = "Enater room name";
                return false;
            }

            if (price == "") {
                document.getElementById('errprice').innerHTML = "Enater price";
                return false;
            }

            if (bed == "") {
                document.getElementById('errbed').innerHTML = "Enater bed";
                return false;
            }

            return (true);

        }
    </script>

</html>