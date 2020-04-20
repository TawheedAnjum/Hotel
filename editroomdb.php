<?php

$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));
$hname = '';
$room = '';
$price = '';
$start1 = '';
$end1 = '';
$name1 = '';
$start2 = '';
$end2 = '';
$name2 = '';
$update = false;

if (isset($_GET['rdelete'])) {
    $id = $_GET['rdelete'];

    $sql = "DELETE FROM hroom WHERE id='$id'";
    $result = $conn->query($sql);
    header('Location: ' . 'editroom.php');
}

if (isset($_POST['update'])) {

    $sql = "SELECT * FROM hroom WHERE id='$id'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

    if($count==1){
        $row = $result->fetch_assoc();
        $hname = $row['hname'];
        $room = $row['room'];
        $price = $row['price'];
        $start1 = $row['start1'];
        $end1 = $row['end1'];
        $name1 = $row['name1'];
        $start2 = $row['start2'];
        $end2 = $row['end2'];
        $name2 = $row['name2'];
        $update = true;
        echo "ok";
    }else{
    echo "not";
    }
}
