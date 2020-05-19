<?php

$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

if(isset($_POST['date_update'])){

    $room_id=$_POST['room_id'];
    $hotel_id=$_POST['hotel_id'];
    $user_name=$_POST['name'];
    $start=$_POST['checkin'];
    $end=$_POST['checkout'];

    $checkin = date('Y-m-d', strtotime($start));
    $checkout = date('Y-m-d', strtotime($end));

    $sql = "INSERT INTO date (hotel_id, room_id, user_name, checkin, checkout ) VALUES('$hotel_id', '$room_id', '$user_name', '$checkin', '$checkout')";
    $result = $conn->query($sql);
    
    header('Location: ' . 'viwer_hotel_profile.php?id='.$hotel_id);
}
