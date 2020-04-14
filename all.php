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
  <link rel="stylesheet" href="css/viwer.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
  <!-- font-family: 'Roboto', sans-serif;
    font-family: 'Cookie', cursive;
    font-family: 'Norican', cursive;
    font-family: 'Montez', cursive; -->


</head>

<body>

  <!-- main -->
  <main class="container">

    <?php

    // $given=$_GET['a'];

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
    $sql = "SELECT * FROM hprofile";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {

      echo "
    <div class='box'>
      <img src='db_image/" . $row['img1'] . "' height='250px' width='100%' alt=''>
      <div class='info'>
        <div align='right' style='margin:.5rem'>
          <a href='viwer_hotel_profile.php?id=" . $row['id'] . "'>Booking</a>
        </div>
        <h4>" . $row['hname'] . "</h4>
        <p style='color:black'>" . $row['adress'] . "</p>
      </div>
    </div> ";
    }
    ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>