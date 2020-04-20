<!-- php strt  -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'hotel';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['vemail']) && isset($_POST['hemail']) && isset($_POST['hname']) && isset($_POST['hphone']) && isset($_POST['adress']) && isset($_POST['area']) && isset($_POST['rmax']) && isset($_POST['rmin']) && isset($_POST['description']) && isset($_FILES['img1']['name']) && isset($_FILES['img2']['name']) && isset($_FILES['img3']['name'])) {
            
            $vemail = $_POST['vemail'];
            $hemail = $_POST['hemail'];
            $hname = $_POST['hname'];
            $hphone = $_POST['hphone'];
            $adress = $_POST['adress'];
            $area = $_POST['area'];
            $rmax = $_POST['rmax'];
            $rmin = $_POST['rmin'];
            $description = $_POST['description'];
            $img1 = $_FILES['img1']['name'];
            $img2 = $_FILES['img2']['name'];
            $img3 = $_FILES['img3']['name'];
        }

        $target1 = "db_image/" . basename($img1);
        $target2 = "db_image/" . basename($img2);
        $target3 = "db_image/" . basename($img3);

        $sql = "INSERT INTO hprofile (vemail, hemail, hname, hphone, adress, area, rmax, rmin, description, img1, img2, img3 ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $stmtinsert->bind_param("ssssssssssss", $vemail, $hemail, $hname, $hphone, $adress, $area, $rmax, $rmin, $description, $img1, $img2, $img3);
        $result = $stmtinsert->execute();

        //img upload
        if (move_uploaded_file($_FILES['img1']['tmp_name'], $target1) && move_uploaded_file($_FILES['img2']['tmp_name'], $target2) && move_uploaded_file($_FILES['img3']['tmp_name'], $target3)) {
            header('Location: ' . 'profile.php');
            $_SESSION['vemail'] = $vemail;
        } else {
            echo "Failed to upload image";
        }
    }


    mysqli_close($conn);

?>
<!-- php end -->


<div class="conatiner">
    <div class="room_div">
      <div class="room_picture">
        <!-- <img src="images/room_picture.jpg" alt=""  height="100%" weidth="100%"> -->
      </div>
      <div class="room">
          <form action="">
            <Table>
              <tr>
                <th>
                  <label for="room">Enter Room1 Name:</label> <br>
                  <input type="text" name="hroom1" style="width: 200px">
                </th>
                <th>
                  <label for="room" style="margin-left:5px; width: 80px;">Price:</label> <br>
                  <input type="number" name="price1" style="margin-left:5px; width: 80px;">
                </th>
              </tr>
            </Table>
            <Table>
              <tr>
                <th>
                  <label for="hroom2" >Enter Room1 Name</label> <br>
                  <input type="text" name="hroom2" style="width: 200px;">
                </th>
                <th>
                  <label for="room" style="margin-left:5px; width: 80px;">Price:</label> <br>
                  <input type="number" name="price2" style="margin-left:5px; width: 80px;">
                </th>
              </tr>
            </Table>
            <Table>
              <tr>
                <th>
                  <label for="hroom2">Enter Room1 Name</label> <br>
                  <input type="text" name="hroom2" style="width: 200px;">
                </th>
                <th>
                  <label for="room" style="margin-left:5px; width: 80px;">Price:</label> <br>
                  <input type="number" name="price3" style="margin-left:5px; width: 80px;">
                </th>
              </tr>
              </tr>
            </Table>
        </div>
      </div>
    </div>


    <div class="submit container">

</form>
</div>
</div>
