<?php

$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

if (isset($_POST['submit'])) {
    $hname = $_POST['hname'];
    $df = $_POST['start'];
    $de = $_POST['end'];
    $room = $_POST['room'];
    $name = $_POST['name'];

    $start = date('Y-m-d', strtotime($df));
    $end = date('Y-m-d', strtotime($de));

    $sql2 = "SELECT * FROM hroom WHERE hname='$hname' AND room='$room'";
    $result2 = $conn->query($sql2);
    $count2 = mysqli_num_rows($result2);

    $row = $result2->fetch_assoc();
    $start1 = $row['start1'];
    $end1 = $row['end1'];

    if ($start1 == NULL) {
        $sql = "UPDATE hroom SET  start1='$start', end1='$end', name1='$name' WHERE hname='$hname' AND room='$room' ";
        $result = $conn->query($sql);
        header('Location: ' . 'booking.php');
    } else {
        if (($start1 <= $start) && ($end1 >= $start)) {
            echo "Sorry check in date is booked";
        } else {
            if (($start1 <= $end) && ($end1 >= $end)) {
                echo "date in";
            } else {
                $sql = "UPDATE hroom SET  start2='$start', end2='$end', name2='$name' WHERE hname='$hname' AND room='$room' ";
                $result = $conn->query($sql);
                header('Location: ' . 'booking.php');
            }
        }
    }
}
