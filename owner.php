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
  <link rel="stylesheet" href="css/ower.css">

  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
  <!-- font-family: 'Roboto', sans-serif;
    font-family: 'Cookie', cursive;
    font-family: 'Norican', cursive;
    font-family: 'Montez', cursive; -->


</head>

<body>


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

  // db

  // define variables and initialize with empty values
  $hnameErr = "";
  $hname = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $hnameErr = "Name is required";
    } else {
      $hname = test_input($_POST["name"]);
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  mysqli_close($conn);
  ?>
  <!-- php end -->

  <!-- header  -->
  <header>
    <div class="container">
      <div class="myNavbar">
        <div class="logo">
          <img src="images/logo.svg" alt="logo" height="40px" width="auto">
        </div>
        <div class="head2">
          <div class="n-item"><a href="index.html">Home</a></div>
          <div class="n-item"><a href="#">Hotel Room</a></div>
          <div class="n-item"><a href="">Contact</a></div>
          <div class="n-item button"><a href="register.php" class="btn1">Register</a></div>
        </div>
      </div>
      <div class="page-header" style="color:white; text-align:center; margin-top:8rem">
        <h1>
          The Best Hotel Ticket From The Web
        </h1>
        <h4 style="margin-top: 2rem">
          The biggest source of hotel ticket online
        </h4>
      </div>
    </div>
  </header>



  <!-- main -->
  <main class="container">

    <?php


    ?>

    <div class="form-body">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

        <table class="tab1">
          <tr>
            <th>
              <label for="hname">Hotel Name:</label><br>
              <input type="text" id="hname" name="hname" style="width: 250px; margin-right: 10px"><br>
              <span class="error"> <?php echo $hnameErr; ?></span>
            </th>
            <th>
              <label for="hemail">Hotel Email:</label><br>
              <input type="email" id="hemail" name="hemail" style="width: 250px;">
            </th>
          </tr>
        </table>

        <table class="tab2">
          <tr>
            <th>
              <label for="hheader">Header:</label><br>
              <input type="text" id="hheader" name="hheader" style="width:510px">
            </th>
          </tr>
        </table>

        <table class="tab3">
          <tr>
            <th>
              <label for="adress">Adreess:</label><br>
              <input type="text" id="adress" name="adress" style="width: 510px">
            </th>
          </tr>
        </table>

        <table class="tab4">
          <tr>
            <th>
              <label for="room1">Room 1 Price:</label><br>
              <input type="number" id="room1" name="room1" style="width: 166.67px; margin-right:5px;">
            </th>
            <th>
              <label for="room2">Room 2 Price:</label><br>
              <input type="number" id="room2" name="room2" style="width: 166.67px; margin-right:5px;">
            </th>
            <th>
              <label for="room3">Room 3 Price</label><br>
              <input type="number" id="room3" name="room3" style="width: 166.67px;">
            </th>
          </tr>
        </table>

        <table class="tab6">
          <tr>
            <th>
              <label for="adress">Hotel Description:</label><br>
              <textarea name="description" rows="5" cols="50" style="width: 510px"></textarea>
            </th>
          </tr>
        </table>

        <table class="tab5">
          <tr>
            <th>
              <p style="background-color: #65C386; padding:5px; color:white; font-size:1rem; margin-top:10px;">Upload image</p>
            </th>
          </tr>
          <tr>
            <th>
              <input type="file" id="img1" name="img1" style="width: 166.67px; margin-right:5px;">
            </th>
            <th>
              <input type="file" id="img2" name="img2" style="width: 166.67px; margin-right:5px;">
            </th>
            <th>
              <input type="file" id="img2" name="img2" style="width: 166.67px;">
            </th>
          </tr>
        </table>
        <table>
          <tr>
            <th><input type="submit" value="Publish" class="publish"></th>
          </tr>
        </table>

      </form>
    </div>

    <div class="travel-image">
      <img src="images/undraw_travelers_qlt1.svg" alt="" height="400px" width="auto">
    </div>

  </main>

  <!-- footer -->
  <footer>
    <div class="contact">
      <div class="container">
        <div class="footer-info">
          <div class="information">
            <h4> Contact Us</h4>
            <p>
              Email: hotel@gmail.com <br>
              Phone: 0123456789 <br>
            </p>
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-rss"></i>
            <i class="fa fa-youtube"></i>
            <i class="fa fa-linkedin"></i>
            <i class="fa fa-github"></i>
          </div>

          <div class="footer-logo">
            <img src="images/logo.svg" alt="" height="60px" width="auto">
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>