<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

if (isset($_POST['room_update'])) {

    $hotel_id = $_POST['hotel_id'];
    $room_id = $_POST['room_id'];
    $room_name = $_POST['room_name'];
    $price = $_POST['price'];
    $bed = $_POST['bed'];
    $wifi = $_POST['wifi'];

    $sql = "UPDATE room SET room_name='$room_name', price='$price', bed='$bed', wifi='$wifi' WHERE room_id='$room_id'";
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
        header("location: editroom.php?redit=" . $hotel_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if (isset($_GET['room_delete'])) {
    $room_id = $_GET['room_delete'];

    $sql = "DELETE FROM room WHERE room_id='$room_id'";
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {

        header("location: profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// date
if (isset($_POST['date_update'])) {

    $date_id = $_POST['date_id'];
    $hotel_id = $_POST['hotel_id'];
    $user_name = $_POST['user_name'];
    $start = $_POST['checkin'];
    $end = $_POST['checkout'];

    $checkin = date('Y-m-d', strtotime($start));
    $checkout = date('Y-m-d', strtotime($end));

    $sql = "UPDATE date SET user_name='$user_name', checkin='$checkin', checkout='$checkout' WHERE date_id='$date_id'";
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
        header("location: editroom.php?redit=" . $hotel_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['date_delete'])) {
    $date_id = $_GET['date_delete'];

    $sql = "DELETE FROM date WHERE date_id='$date_id'";
    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {

        header("location: profile.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
