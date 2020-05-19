<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));


if(isset($_POST['add'])){
    $hotel_id=$_POST['hotel_id'];
    $room=$_POST['room'];
    $price=$_POST['price'];
    $bed=$_POST['bed'];
    $wifi=$_POST['wifi'];

    $sql = "SELECT * FROM room WHERE hotel_id='$hotel_id' AND room_name='$room'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

    if($count > 0 ){
        header('Location: ' . 'profile.php?error');
    }
    else{
        $sql = "INSERT INTO room (hotel_id, room_name, price, bed, wifi) VALUES('$hotel_id', '$room', '$price', '$bed', '$wifi' )";
         $result = $conn->query($sql);
         header('Location: ' . 'profile.php');
    }

}


?>