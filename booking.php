<!-- php start -->
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hotel';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    // start
    if ($_POST['start'] == "") {
        $error_msg['start'] = "Checkin Date is required";
    } else {
        $start = $_POST['start'];
        $today = date("Y-m-d");
        if ($start < $today) {
            $error_msg['start'] = "Input valid Data";
        }
    }

    // end
    if ($_POST['end'] == "") {
        $error_msg['end'] = "Checkin Date is required";
    } else {
        $end = $_POST['end'];
        if ($end <= $start) {
            $error_msg['end'] = "Input valid checkout Data";
        }
    }

    // room
    if ($_POST['room'] == "") {
        $error_msg['room'] = "input room";
    }

    // name
    if ($_POST['name'] == "") {
        $error_msg['name'] = "input name";
    }
}


//err
if (isset($error_msg) == true) {
    echo "die";
} else {
    include 'bookingdb.php';
}




?>

<!-- php end -->

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/booking.css">

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
                    <!-- <div class="n-item"><a href="index.html">Home</a></div> -->
                    <div class="n-item"><a href="viwer.php">Hotel</a></div>
                    <!-- <div class="n-item"><a href="">Contact</a></div> -->
                    <div class="n-item button"><a href="index.php" class="btn1" style="color: white;">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <h2 style="text-align: center; margin-bottom:2rem;">Booking Room</h2>
        <div class="booking">
            <div class="frm">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <table style="margin-bottom: .8rem">
                        <tr>
                            <th>
                                <input type="hidden" name="hname" value="<?php echo $_GET['hname']; ?>">
                            </th>
                        </tr>
                </table>
                    <table style="margin-bottom: .8rem">
                        <tr>
                            <th>
                                <b>Checkin:</b> <br>
                                <input type="date" name="start">
                            </th>
                        </tr>
                        <tr>
                            <th style="color: red">
                                <?php if (isset($error_msg['start'])) {
                                    echo $error_msg['start'];
                                }  ?>
                            </th>
                        </tr>
                    </table>
                    <table style="margin-bottom: .8rem">
                        <tr>
                            <th>
                                <b>Checkout:</b> <br>
                                <input type="date" name="end">
                            </th>
                        </tr>
                        <tr>
                            <th style="color: red">
                                <?php if (isset($error_msg['end'])) {
                                    echo $error_msg['end'];
                                }  ?>
                            </th>
                        </tr>
                    </table>
                    <table style="margin-bottom: .8rem">
                        <tr>
                            <th>
                                <b>Room Number:</b> <br>
                                <input type="text" name="room">
                            </th>
                        </tr>
                        <tr>
                            <th style="color: red">
                                <?php if (isset($error_msg['room'])) {
                                    echo $error_msg['room'];
                                }  ?>
                            </th>
                        </tr>
                    </table>
                    <table style="margin-bottom: .8rem">
                        <tr>
                            <th>
                                <b>Your Name:</b> <br>
                                <input type="text" name="name">
                            </th>
                        </tr>
                        <tr>
                            <th style="color: red">
                                <?php if (isset($error_msg['name'])) {
                                    echo $error_msg['name'];
                                }  ?>
                            </th>
                        </tr>
                    </table>
                        <tr>
                            <th>
                                <input type="submit" value="Book" name="submit" class="publish">
                            </th>
                        </tr>
                    </table>
                </form>

            </div>
            <div class="room">
                <tr>
                    <?php
                    if (isset($_GET['hname'])) {
                        $hname = $_GET['hname'];

                        $sql = "SELECT * From hroom WHERE hname='$hname'";
                        $result = $conn->query($sql);
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {
                            echo "<table>
                                <tr>
                                    <th style='border: solid 1px black; padding: .5rem .8rem'>Room</th>
                                    <th style='border: solid 1px black; padding: .5rem .8rem'>Price</th>
                                    <th style='border: solid 1px black; padding: .5rem .8rem'>First booking</th>
                                    <th style='border: solid 1px black; padding: .5rem .8rem'>Second booking</th>
                                </tr>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                if(($row['end1']!= NULL) && ($row['end2'] != NULL)){
                                    echo "all room is booked";
                                    break;
                                }
                                echo "<tr>
                                    <td style='border: solid 1px black; padding: .5rem .8rem'>" . $row["room"] . "</td>
                                    <td style='border: solid 1px black; padding: .5rem .8rem'>" . $row["price"] . "</td>
                                    <td style='border: solid 1px black; padding: .5rem .8rem'>" . $row["start1"] . " <b>To</b> " . $row["end1"] . "</td>
                                    <td style='border: solid 1px black; padding: .5rem .8rem'>" . $row["start2"] . " <b>To</b> " . $row["end2"] . "</td>
                                    </tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                    }
                    ?>

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

</body>

</html>