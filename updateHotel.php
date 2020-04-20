<?php

$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

if (isset($_GET['hedit'])) :
?>

  <?php
  $id = $_GET['hedit'];
  $sql = "SELECT * FROM hprofile WHERE id='$id'";
  $result = $conn->query($sql);

  $row = $result->fetch_assoc();
  $id = $row['id'];
  $vemail = $row['vemail'];
  $hemail = $row['hemail'];
  $hname = $row['hname'];
  $hphone = $row['hphone'];
  $adress = $row['adress'];
  $area = $row['area'];
  $rmax = $row['rmax'];
  $rmin = $row['rmin'];
  $description = $row['description'];
  $img1 = $row['img1'];
  $img2 = $row['img2'];
  $img3 = $row['img3'];

  if (isset($_POST['update'])) {
    $vemail = $_POST['vemail'];
    $hemail = $_POST['hemail'];
    $hname = $_POST['hname'];
    $hphone = $_POST['hphone'];
    $adress = $_POST['adress'];
    $area = $_POST['area'];
    $rmax = $_POST['rmax'];
    $rmin = $_POST['rmin'];

    $sql = "UPDATE hprofile SET vemail='$vemail', hemail='$hemail', hname='$hname', hphone='$hphone' , adress='$adress'. area='$area', rmax='$rmax', rmin='$rmin' WHERE id='$id'";
    $result = $conn->query($sql);
  }


  ?>

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
      <div class="form-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

          <table class="tab1">
            <tr>
              <th>
              <input type="hidden" id="" name="id" value="<?php echo $id ?>">
                <label for="vemail">Viwer Email:</label><br>
                <input type="email" id="vemail" name="vemail" value="<?php echo $vemail ?>" style="width: 250px; margin-right: 10px">
              </th>
              <th>
                <label for="hemail">Hotel Email:</label><br>
                <input type="email" id="hemail" name="hemail" value="<?php echo $hemail; ?>" style="width: 250px;">
              </th>
            </tr>
          </table>

          <table class="tab2">
            <tr>
              <th>
                <label for="hname">Hotel Name:</label><br>
                <input type="text" id="hname" name="hname" value="<?php echo $hname; ?>" style="width: 250px; margin-right: 10px">
              </th>
              <th>
                <label for="hphone">Phone Number:</label><br>
                <input type="number" id="hphone" name="hphone" value="<?php echo $hphone; ?>" style="width: 250px;">
              </th>
            </tr>
          </table>

          <table class="tab3">
            <tr>
              <th>
                <label for="adress">Adreess:</label><br>
                <input type="text" id="adress" name="adress" value="<?php echo $adress; ?>" style="width: 510px">
              </th>
            </tr>
          </table>

          <table class="tab4">
            <tr>
              <th>
                <label for="area">Area / State:</label><br>
                <input type="text" id="area" name="area" value="<?php echo $area; ?>" style="width: 166.67px; margin-right:5px;">
              </th>
              <th>
                <label for="rmax">Maximum Price:</label><br>
                <input type="number" id="rmax" name="rmax" value="<?php echo $rmax; ?>" style="width: 166.67px; margin-right:5px;">
              </th>
              <th>
                <label for="rmin">Minimum Price:</label><br>
                <input type="number" id="rmin" name="rmin" value="<?php echo $rmin; ?>" style="width: 166.67px;">
              </th>
            </tr>
          </table>
          <table class="tab5">
            <tr>
              <th>
                <input type="submit" value="Update" class="publish" name="update">
              </th>
            </tr>
          </table>
      </div>
      </form>

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

  <?php
endif
  ?>
  </body>

  </html>