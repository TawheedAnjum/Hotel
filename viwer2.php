<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = 'hotel';

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);

   //Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }

    if (isset($_GET['q'])) {
        $str = $_GET['q'];


        $sql = "SELECT * FROM hotel_profile WHERE area ='$str' or area LIKE '%$str' or area LIKE '$str%' or area LIKE '%$str%'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        
        if($count>0){
        while ($row = mysqli_fetch_array($result)) {

            echo "
        <div class='box'>
      <img src='db_image/" . $row['img1'] . "' height='250px' width='100%' alt=''>
      <div class='info'>
        <div align='right' style='margin:.5rem'>
          <a href='viwer_hotel_profile.php?id=" . $row['id'] . "'>Select</a>
        </div>
        <h4>" . $row['name'] . "</h4>
        <p style='color:black'>" . $row['adress'] . "</p>
      </div>
    </div> ";
        }
    }
    else{
        echo "<p style='font-size: 1rem; text-align: center;'>Hotel not found</p>";
    }
    } else {
        echo "not";
    }

    $conn->close();
    ?>