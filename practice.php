<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php


        session_start();
        echo $_SESSION['vemail'];
    // if (!isset($_COOKIE['hotel'])) {

        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = 'hotel';

        // // Create connection
        // $conn = mysqli_connect($servername, $username, $password, $dbname);

        // //Check connection
        // if (!$conn) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }


        // $sql = "SELECT * FROM hprofile";
        // $result = mysqli_query($conn, $sql);
        // while ($row3 = mysqli_fetch_array($result)) {
        //     echo $row3['hheader'];
        //     echo "<img src='db_image/" . $row3['img1'] . "' height='200px' weight='auto' >";
        // }

        echo "ok";

        //  mysqli_close($conn);
        session_destroy();
    // }
    ?>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>