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

<body onload='search(this.value)'>

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
          <div class="n-item button"><a href="index.php" class="btn1">logout</a></div>
        </div>
      </div>
      <div class="page-header" style="color:white; text-align:center; margin-top:9rem">
        <h1>
          The Best Hotel Ticket From The Web
        </h1>
        <h4 style="margin-top: 1rem">
          The biggest source of hotel ticket online
        </h4>
        <form autocomplete="off">
          <input type="text" class="search" placeholder="Enter hotel booking area" name="name" id="name" onkeyup="search(this.value)">
          <input type="submit" value="Search" class="submit ">
        </form>
      </div>
    </div>
  </header>



  <!-- main -->
  <main class="container" id="output">

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

    session_start();
    if(isset($_SESSION['logemail'])){
      $email= $_SESSION['logemail'];
    }

    $sql = "SELECT * FROM hotel_profile";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {

      echo "
    <div class='box'>
      <img src='db_image/" . $row['img1'] . "' height='250px' width='100%' alt=''>
      <div class='info'>
        <div align='right' style='margin:.5rem'>
          <a href='viwer_hotel_profile.php?id=" . $row['id'] . "'>Booking</a>
        </div>
        <h4>" . $row['name'] . "</h4>
        <p style='color:black'>" . $row['adress'] . "</p>
      </div>
    </div> ";
    }
    ?>
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

  <!-- live search -->
  <script>
    if (window.XMLHttpRequest) {
      // code for modern browsers
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for old IE browsers
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    function search(str) {
      // var str =  document.getElementById('name');
      if (str.value == '') {
        document.getElementById("output");
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("output").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "viwer2.php?q=" + str, true);
        xmlhttp.send(null);
      }
    }
  </script>
</body>

</html>