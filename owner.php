<?php

session_start();

// define variables and initialize with empty values

if (isset($_POST['submit'])) {

  // viwer email
  if ($_POST['vemail'] == "") {
    $error_msg['vemail'] = "Viwer Email is required";
  } else {
    $vemail = test_input($_POST['vemail']);
    // check if e-mail address is well-formed
    if (!filter_var($vemail, FILTER_VALIDATE_EMAIL)) {
      $error_msg['vemail'] = "Invalid email format";
    }
  }

  // hotel email
  if ($_POST['hemail'] == "") {
    $error_msg['hemail'] = "Hotel Email is required";
  } else {
    $hemail = test_input($_POST['hemail']);
    // check if e-mail address is well-formed
    if (!filter_var($hemail, FILTER_VALIDATE_EMAIL)) {
      $error_msg['hemail'] = "Invalid email format";
    }
  }

  // header
  if ($_POST['hheader'] == "") {
    $error_msg['hheader'] = "Name is required";
  } else {
    $hheader = test_input($_POST['hheader']);
    // check if e-mail address is well-formed
    if (!preg_match("/^[a-zA-Z ]*$/", $hheader)) {
      $error_msg['hname'] = "Invalid header name format";
    }
  }

  // adress
  if ($_POST['adress'] == "") {
    $error_msg['adress'] = "Adress is required";
  }

  // room1
  if ($_POST['room1'] == "") {
    $error_msg['room1'] = "Room price is required";
  } else {
    $hheader = test_input($_POST['room1']);
    // check if e-mail address is well-formed
    if ((strlen($_POST['room1'])) > 3) {
      $error_msg['room1'] = "maximum 3 digitt";
    }
  }

  // room2
  if ($_POST['room2'] == "") {
    $error_msg['room2'] = "Room price is required";
  } else {
    $hheader = test_input($_POST['room2']);
    // check if e-mail address is well-formed
    if ((strlen($_POST['room2'])) > 3) {
      $error_msg['room2'] = "maximum 3 digitt";
    }
  }

  // room3
  if ($_POST['room3'] == "") {
    $error_msg['room3'] = "Room price is required";
  } else {
    $hheader = test_input($_POST['room3']);
    // check if e-mail address is well-formed
    if ((strlen($_POST['room3'])) > 3) {
      $error_msg['room3'] = "maximum 3 digitt";
    }
  }

  // description
  if ($_POST['description'] == "") {
    $error_msg['description'] = "description is required";
  }

  //img1
  if (empty($_FILES['img1']['name'])) {
    $error_msg['img1'] = "image is required";
  } else {
    $img1 = $_FILES['img1']['name'];
    $allowed =  array('jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
    $ext = pathinfo($img1, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
      $error_msg['img1'] = "image is not valid";
    }
  }

  //img2
  if (empty($_FILES['img2']['name'])) {
    $error_msg['img2'] = "image is required";
  } else {
    $img2 = $_FILES['img2']['name'];
    $allowed =  array('jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
    $ext = pathinfo($img2, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
      $error_msg['img2'] = "image is not valid";
    }
  }

  //img3
  if (empty($_FILES['img3']['name'])) {
    $error_msg['img3'] = "image is required";
  } else {
    $img3 = $_FILES['img3']['name'];
    $allowed =  array('jpeg', 'jpg', "png", "gif", "bmp", "JPEG", "JPG", "PNG", "GIF", "BMP");
    $ext = pathinfo($img3, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
      $error_msg['img3'] = "image is not valid";
    }
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// err
if (isset($error_msg) == true) {
  echo "die";
} else {
  include 'ownerdb.php';
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
              <label for="vemail">Viwer Email:</label><br>
              <input type="email" id="vemail" name="vemail" style="width: 250px; margin-right: 10px">
            </th>
            <th>
              <label for="hemail">Hotel Email:</label><br>
              <input type="email" id="hemail" name="hemail" style="width: 250px;">
            </th>
          </tr>
          <tr>
            <th style="color: red">
              <?php if (isset($error_msg['vemail'])) {
                echo $error_msg['vemail'];
              }  ?>
            </th>
            <th style="color: red">
              <?php if (isset($error_msg['hemail'])) {
                echo $error_msg['hemail'];
              }  ?>
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
          <tr>
            <th style="color: red">
              <?php if (isset($error_msg['hheader'])) {
                echo $error_msg['hheader'];
              }  ?>
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
          <tr>
            <th style="color: red">
              <?php if (isset($error_msg['adress'])) {
                echo $error_msg['adress'];
              }  ?>
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
          <tr>
            <th style="color: red">
              <?php if (isset($error_msg['room1'])) {
                echo $error_msg['room1'];
              }  ?>
            </th>
            <th style="color: red">
              <?php if (isset($error_msg['room2'])) {
                echo $error_msg['room2'];
              }  ?>
            </th>
            <th style="color: red">
              <?php if (isset($error_msg['room3'])) {
                echo $error_msg['room3'];
              }  ?>
            </th>
          </tr>
        </table>

        <table class="tab6">
          <tr>
            <th>
              <label for="description">Hotel Description:</label><br>
              <textarea name="description" rows="5" cols="50" style="width: 510px"></textarea>
            </th>
          </tr>
          <tr>
            <th style="color: red">
              <?php if (isset($error_msg['description'])) {
                echo $error_msg['description'];
              }  ?>
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
              <input type="file" id="img3" name="img3" style="width: 166.67px;">
            </th>
          </tr>
          <tr>
            <th style="color: red">
              <?php if (isset($error_msg['img1'])) {
                echo $error_msg['img1'];
              }  ?>
            </th>
            <th style="color: red">
              <?php if (isset($error_msg['img2'])) {
                echo $error_msg['img2'];
              }  ?>
            </th>
            <th style="color: red">
              <?php if (isset($error_msg['img3'])) {
                echo $error_msg['img3'];
              }  ?>
            </th>
          </tr>
        </table>
        <table>
          <tr>
            <th><input type="submit" value="Publish" class="publish" name="submit"></th>
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

  <?php

  ?>
</body>

</html>