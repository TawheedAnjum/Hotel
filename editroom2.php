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
    <link rel="stylesheet" href="css/editroom2.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Volkhov:wght@700&display=swap" rel="stylesheet">
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
                    <div class="n-item"><a href="profile.php">Profile</a></div>
                    <!-- <div class="n-item"><a href="">Contact</a></div> -->
                    <div class="n-item button"><a href="index.php" class="btn1" style="color: white;">logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <main class="container d-flex justify-content-center">
        <?php
        $room_name = $price = "";
        $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

        if (isset($_GET['room_edit'])) :

        ?>

            <?php
            $room_id = $_GET['room_edit'];

            $sql = "SELECT * FROM room WHERE room_id='$room_id'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            $room_name = $row['room_name'];
            $price = $row['price'];
            $hotel_id = $row['hotel_id'];
            $bed = $row['bed'];
            $wifi = $row['wifi'];

            ?>

            <div class="edit_room card">
                <form action="edit_room_db.php" method="POST">
                    <table>
                        <tr>
                            <th><input type="hidden" name="room_id" id="room_id" value="<?php echo $room_id ?>"> </th>
                        </tr>
                        <tr>
                            <th><input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>"> </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="room_name">Enter Room Name:</label> <br>
                                <input type="text" name="room_name" id="room_name" value="<?php echo $room_name; ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="price">Price:</label> <br>
                                <input type="number" name="price" id="price" value="<?php echo $price; ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="bed">Bed & Persons:</label> <br>
                                <input type="text" name="bed" id="bed" value="<?php echo $bed; ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="wifi">Wifi:</label> <br>
                                <select id="category" name="wifi" class="category">
                                    <option value="Free" <?php if($wifi=="Free") echo 'selected="selected"'; ?>>Free</option>
                                    <option value="No" <?php if($wifi=="No") echo 'selected="selected"'; ?>>No</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th> <input type="submit" name="room_update" value="Update" class="update"> </th>
                        </tr>
                    </table>
                </form>
            </div>

        <?php endif ?>

        <!-- date -->
        <?php
        if (isset($_GET['date_edit'])) :
        ?>

            <?php
            $date_id = $_GET['date_edit'];

            $sql = "SELECT * FROM date WHERE date_id='$date_id'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);

            $hotel_id = $row['hotel_id'];
            $user_name = $row['user_name'];
            $checkin = $row['checkin'];
            $checkout = $row['checkout'];

            ?>

            <div class="edit_room card">
                <form action="edit_room_db.php" method="POST">
                    <table>
                        <tr>
                            <th><input type="hidden" name="date_id" id="room_id" value="<?php echo $date_id ?>"> </th>
                            <th><input type="hidden" name="hotel_id" id="hotel_id" value="<?php echo $hotel_id ?>"> </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="user_name">Enter User Name:</label> <br>
                                <input type="text" name="user_name" id="room_name" value="<?php echo $user_name; ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="checkin">Checkin date:</label> <br>
                                <input type="date" name="checkin" id="checkin" value="<?php echo $checkin; ?>">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <label for="checkout">Checkout date:</label> <br>
                                <input type="date" name="checkout" id="checkout" value="<?php echo $checkout; ?>">
                            </th>
                        </tr>
                        <tr>
                            <th> <input type="submit" name="date_update" value="Update" class="update"> </th>
                        </tr>
                    </table>
                </form>
            </div>
        <?php endif ?>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>



</html>