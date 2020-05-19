<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

if (isset($_POST['submit'])) {

    $viwer_email = $_POST['viwer_email'];
    $hotel_email = $_POST['hotel_email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $adress = $_POST['adress'];
    $area = $_POST['area'];
    $rmax = $_POST['rmax'];
    $rmin = $_POST['rmin'];
    $description = $_POST['description'];
    $img1 = $_FILES['img1']['name'];
    $img2 = $_FILES['img2']['name'];
    $img3 = $_FILES['img3']['name'];

    $target1 = "db_image/" . basename($img1);
    $target2 = "db_image/" . basename($img2);
    $target3 = "db_image/" . basename($img3);

    $sql = "INSERT INTO hotel_profile (viwer_email, hotel_email, phone, name, adress, area, rmax, rmin, description, img1, img2, img3 ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $conn->prepare($sql);
    $stmtinsert->bind_param("ssssssssssss", $viwer_email, $hotel_email, $phone, $name, $adress, $area, $rmax, $rmin, $description, $img1, $img2, $img3);
    $result = $stmtinsert->execute();

   
    //img upload
    if (move_uploaded_file($_FILES['img1']['tmp_name'], $target1) && move_uploaded_file($_FILES['img2']['tmp_name'], $target2) && move_uploaded_file($_FILES['img3']['tmp_name'], $target3)) {
        session_start();
        $_SESSION["vemail"] = $vemail;
        header('Location: ' . 'profile.php');
    } else {
        echo "Failed to upload image";
    }
}
