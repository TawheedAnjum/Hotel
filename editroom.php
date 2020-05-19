<?php
$room_name = $price = "";
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));
require 'edit_room_db.php';

if (isset($_GET['redit'])) :

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
        <link rel="stylesheet" href="css/editroom.css">

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

        <main class="">
            <div class="container mt-5 d-flex justify-content-center">
                <div class="room_info card d-flex justify-content-center">
                    <table class="">
                        <tr>
                            <th class="he tab1">Room Name:</th>
                            <th class="he price">Price:</th>
                            <th class="he bed">Bed & Person:</th>
                            <th class="he price">WIFI:</th>
                            <th class="he e_btn">Edit:</th>
                            <th class="he d_btn">Delete:</th>
                            <!-- <th class="">wifi:</th>
                            <th class="">Edit:</th>
                            <th class="">Delete:</th> -->
                        </tr>
                    </table>
                    <hr>

                    <!-- php -->
                    <?php
                    $hotel_id = $_GET['redit'];

                    $sql = "SELECT * FROM room WHERE hotel_id='$hotel_id'";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) : ?>

                        <table class="">
                            <tr>
                                <th class="tab1"><?php echo $row['room_name']; ?></th>
                                <th class="price"><?php echo $row['price']; ?></th>
                                <th class="bed"><?php echo $row['bed']; ?></th>
                                <th class="price"><?php echo $row['wifi']; ?></th>
                                <th class="e_btn"><a href="editroom2.php?room_edit=<?php echo $row['room_id'] ?>" class="save"> Edit</a></th>
                                <th class="d_btn"><a href="edit_room_db.php?room_delete=<?php echo $row['room_id'] ?>" class="delete"> Delete</a></th>
                                
                            </tr>
                        </table>
                        <hr>

                    <?php endwhile ?>

                </div>
            </div>

            <!-- date -->
            <div class="container mt-5 ">
                <div class="date card">
                    <div class="tab-2">
                        <table>
                            <tr>
                                <th class="tab_head2">Room Name:</th>
                                <th class="tab_head2">User Name</th>
                                <th class="tab_head2">Checkin:</th>
                                <th class="tab_head2">Checkout:</th>
                                <th class="tab_head2 date_btn">Edit:</th>
                                <th class="tab_head2 date_btn">Delete:</th>
                            </tr>
                        </table>
                        <hr>

                        <!-- php -->
                        <?php

                        $sql = "SELECT * FROM date WHERE hotel_id='$hotel_id'";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) : ?>

                            <!-- room name select -->
                            <?php
                            $room_id = $row['room_id'];
                            $sql1 = "SELECT * FROM room WHERE room_id='$room_id'";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            $room_name=$row1['room_name'];
                            ?>

                            <table>
                                <tr>
                                    <th class="date_row"><?php echo $room_name; ?></th>
                                    <th class="date_row"><?php echo $row['user_name']; ?></th>
                                    <th class="date_row"><?php echo $row['checkin']; ?></th>
                                    <th class="date_row"><?php echo $row['checkout']; ?></th>
                                    <th class=""><a href="editroom2.php?date_edit=<?php echo $row['date_id'] ?>" class="date_save"> Edit</a></th>
                                    <th class=""><a href="edit_room_db.php?date_delete=<?php echo $row['date_id'] ?>" class="date_delete"> Delete</a></th>
                                </tr>
                            </table>
                            <hr>

                        <?php endwhile ?>

                    </div>
                </div>
            </div>
        </main>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php endif ?>
    </body>

    </html>