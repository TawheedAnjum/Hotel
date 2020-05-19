<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));
if (isset($_GET['room_id'])) :
?>

    <?php
    $room_id = $_GET['room_id'];
    ?>

    <!-- valitation -->
    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['date_update'])) {

        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $today = date("Y-m-d");
        $target_date = date('Y-m-d', strtotime($today . ' + 30 days'));

        // checkin
        if ($checkin == "") {
            $error_msg['checkin'] = "Select Checkin date";
        } elseif ($checkin < date("Y-m-d") || $checkin >= $checkout) {
            $error_msg['checkin'] = "Select valid date/month";
        } elseif ($checkin > $target_date) {
            $error_msg['checkin'] = "You Can not book this day";
        }

        $sql = "SELECT * FROM date WHERE room_id='$room_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {

            if ($checkin >= $row['checkin'] && $checkin <= $row['checkout']) {
                $error_msg['checkin'] = "Date Booked";
            }

            if ($checkout >= $row['checkin'] && $checkout <= $row['checkout']) {
                $error_msg['checkout'] = "Date Booked";
            }
        }

        // checkout
        if ($checkout == "") {
            $error_msg['checkout'] = "Select Checkout date";
        } elseif ($checkout < date("Y-m-d") || $checkout <= $checkin) {
            $error_msg['checkout'] = "Select valid date/month";
        } elseif ($checkout > $target_date) {
            $error_msg['checkout'] = "You Can not book this day";
        }

        $d1 = date('d', strtotime($checkin));
        $d2 = date('d', strtotime($checkout));

        $m1 = date('m', strtotime($checkin));
        $m2 = date('m', strtotime($checkout));

        if ($m1 == $m2) {
            if ($d2 - $d1 > 10) {
                $error_msg['checkout'] = "You Can not book this day";
            }
        }

        // name
        if ($_POST['name'] == "") {
            $error_msg['name'] = "Name is required";
        } else {
            $name = test_input($_POST['name']);
            // check if e-mail address is well-formed
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $error_msg['name'] = "Invalid name format";
            }
        }
    }

    if (isset($error_msg) != true) {
        include 'bookingdb.php';
    }

    ?>

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
        <link rel="stylesheet" href="css/calender.css">

        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    </head>

    <body onload="curr_date()">
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
            <div class="booking">
                <div class="booking_form">
                    <div class="booking_date card">
                        <!-- php -->
                        <?php
                        $sql = "SELECT * FROM room WHERE room_id='$room_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $hotel_id = $row['hotel_id'];

                        ?>
                        <!-- end -->
                        <form action="" method="POST">
                            <table>
                                <tr>
                                    <th><input type="hidden" name="room_id" value="<?php echo $room_id ?>"> </th>
                                    <th><input type="hidden" name="hotel_id" value="<?php echo $hotel_id ?>"> </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="checkin">Enter checkin date:</label> <br>
                                        <input type="date" name="checkin" id="checkin">
                                        <span style="color: red">
                                            <?php if (isset($error_msg['checkin'])) {
                                                echo "<br />";
                                                echo $error_msg['checkin'];
                                            }  ?>
                                        </span>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="checkout">Enter checkout date:</label> <br>
                                        <input type="date" name="checkout" id="checkout">
                                        <span style="color: red">
                                            <?php if (isset($error_msg['checkout'])) {
                                                echo "<br />";
                                                echo $error_msg['checkout'];
                                            }  ?>
                                        </span>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="name">Booking name:</label> <br>
                                        <input type="text" name="name" id="name">
                                        <span style="color: red">
                                            <?php if (isset($error_msg['name'])) {
                                                echo "<br />";
                                                echo $error_msg['name'];
                                            }  ?>
                                        </span>
                                    </th>
                                </tr>
                                <tr>
                                    <th> <input type="submit" name="date_update" value="Booking" class="update"> </th>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="cal_book">
                    <div class="calender">
                        <div class="inner_cal">
                            <div class="back" onclick="moveDate('back')"> <i class="fas fa-chevron-left rounded-circle">
                                </i>
                            </div>
                            <div class="month">
                                <h1 id="month"></h1> <br>
                                <p id="time"></p>
                            </div>
                            <div class="next" onclick="moveDate('next')"> <i class="fas fa-chevron-right rounded-circle">
                                </i>
                            </div>
                        </div>
                        <div class="date">
                            <div class="week">
                                <div>Su</div>
                                <div>Mo</div>
                                <div>Tu</div>
                                <div>We</div>
                                <div>Th</div>
                                <div>Fr</div>
                                <div>Sa</div>
                            </div>
                            <div class="day" id="day">

                            </div>
                        </div>
                    </div>
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
                        </div>

                        <div class="footer-logo">
                            <img src="images/logo.svg" alt="" height="60px" width="auto">
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- room_cal  -->
        <?php

        function start_date()
        {
            global $room_id;
            $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

            $sql = "SELECT * FROM date WHERE room_id='$room_id'";
            $result = $conn->query($sql);

            $push = array();

            while ($row = $result->fetch_assoc()) {
                $start = $row['checkin'];
                $end = $row['checkout'];

                $start_day_num = date('d', strtotime($start));
                $end_day_num = date('d', strtotime($end));

                $m = date('m', strtotime($start));
                $e = date('m', strtotime($end));

                $month = date('m');
                $day = date('d');

                // last day
                $month = date('m');
                $dateToTest = "2020-" . $month . "-01";
                $lastday = date('t', strtotime($dateToTest));
                $find_date = "2020-" . $month . "-" . $lastday;

                if ($m == $month) {
                    if ($start_day_num >= $day && $end_day_num > $day && $m == $e) {
                        for ($i = $start_day_num; $i <= $end_day_num; $i++) {
                            array_push($push, $i);
                        }
                    } elseif ($start_day_num <= $day && $end_day_num >= $day && $m == $e) {
                        for ($i = $day; $i <= $end_day_num; $i++) {
                            array_push($push, $i);
                        }
                    } elseif ($m != $e) {
                        for ($i = $start_day_num; $i <= $lastday; $i++) {
                            array_push($push, $i);
                        }
                    }
                }
            }
            return $push;
        }

        ?>


        <script>
            var d = new Date();
            var m = 5;

            function curr_date() {
                d.setDate(1);
                var day = d.getDay();

                var endDate = new Date(
                    d.getFullYear(),
                    d.getMonth() + 1,
                    0
                ).getDate();

                var prevDate = new Date(
                    d.getFullYear(),
                    d.getMonth(),
                    0
                ).getDate();

                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                document.getElementById("month").innerHTML = months[d.getMonth()];
                document.getElementById("time").innerHTML = d.toDateString();

                var cells = "";

                var start_date = <?php echo json_encode(start_date()) ?>;
                s = 0;

                // prev month
                for (x = day; x > 0; x--) {
                    cells += "<div class='past'>" + (prevDate - x + 1) + "</div>";
                }

                // corrent month
                for (i = 1; i <= endDate; i++) {

                    if (i == start_date[s]) {
                        cells += "<div style='color:red;'>" + i + "</div>";
                        s++;
                    } else {
                        cells += "<div>" + i + "</div>";
                    }
                }

                document.getElementsByClassName("day")[0].innerHTML = cells;

            }

            function moveDate(p) {
                if (p == 'next') {
                    next_date();
                }
                if (p == 'back') {
                    curr_date();
                }
            }
        </script>



        <?php

        function end_date()
        {
            global $room_id;
            $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

            $sql = "SELECT * FROM date WHERE room_id='$room_id
            '";
            $result = $conn->query($sql);

            $push = array();

            while ($row = $result->fetch_assoc()) {
                $start = $row['checkin'];
                $end = $row['checkout'];

                $start_day_num = date('d', strtotime($start));
                $end_day_num = date('d', strtotime($end));

                $m = date('m', strtotime($start));
                $e = date('m', strtotime($end));
                $month = date('m');

                // $monthNum = $m;
                // $dateObj = DateTime::createFromFormat('!m', $monthNum);
                // $monthName = $dateObj->format('F');

                if ($m == $month + 1) {
                    if ($m == $e) {
                        for ($i = $start_day_num; $i <= $end_day_num; $i++) {
                            array_push($push, $i);
                        }
                    } else {
                        for ($i = 1; $i <= $end_day_num; $i++) {
                            array_push($push, $i);
                        }
                    }
                }
            }
            return $push;
        }


        ?>


        <script>
            function next_date() {
                var year = d.getFullYear();
                var month = d.getMonth() + 2;
                var day = new Date(year + "-" + month + "-01").getDay();

                var endDate = new Date(
                    d.getFullYear(),
                    d.getMonth() + 2,
                    0
                ).getDate();

                var prevDate = new Date(
                    year,
                    d.getMonth() + 1,
                    0
                ).getDate();

                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                document.getElementById("month").innerHTML = months[d.getMonth() + 1];
                document.getElementById("time").innerHTML = d.toDateString();

                var cells = "";

                var start_date = <?php echo json_encode(end_date()) ?>;
                s = 0;

                // prev month
                for (x = day; x > 0; x--) {
                    cells += "<div class='past'>" + (prevDate - x + 1) + "</div>";
                }

                // corrent month
                for (i = 1; i <= endDate; i++) {

                    if (i == start_date[s]) {
                        cells += "<div style='color:red;'>" + i + "</div>";
                        s++;
                    } else {
                        cells += "<div>" + i + "</div>";
                    }
                }

                document.getElementsByClassName("day")[0].innerHTML = cells;

            }
        </script>
        <!-- room_cal end  -->

    </body>

    </html>

<?php endif ?>