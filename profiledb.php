<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));


if(isset($_POST['add'])){
    $hname=$_POST['hname'];
    $room=$_POST['room'];
    $price=$_POST['price'];

    $sql = "SELECT * FROM hroom WHERE hname='$hname' AND room='$room'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);

    if($count > 0 ){
        echo "not possible";
    }
    else{
        $sql = "INSERT INTO hroom (hname, room, price) VALUES('$hname', '$room', '$price' )";
         $result = $conn->query($sql);
         header('Location: ' . 'profile.php');
    }

}


?>