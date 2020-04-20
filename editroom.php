<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));
require 'editroomdb.php';


if (isset($_GET['redit'])) :
?>

    <?php
    $id = $_GET['redit'];
    $hsql = "SELECT * From hprofile WHERE id='$id'";
    $hresult = $conn->query($hsql);
    $hrow = $hresult->fetch_assoc();
    $hname = $hrow['hname'];
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
        <link rel="stylesheet" href="css/editroom.css">

        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
        <!-- font-family: 'Roboto', sans-serif;
    font-family: 'Cookie', cursive;
    font-family: 'Norican', cursive;
    font-family: 'Montez', cursive; -->


    </head>

    <body>
        <div class="container">
            <div class="user" align="center">
                <div class="info" style="margin-top: 3rem; margin-bottom: 3rem;">
                    <table>
                        <tr>
                            <th>room name:</th>
                            <th>Price</th>
                            <th>Bokking1 From</th>
                            <th>Bokking1 To</th>
                            <th>Booking1 name:</th>
                            <th>Bokking2 From</th>
                            <th>Bokking2 To</th>
                            <th>Booking2 name:</th>
                            <th>edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php

                        $sql = "SELECT * From hroom WHERE hname='$hname'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) :
                        ?>
                            <tr>
                                <th><?php echo $row['room']; ?></th>
                                <th><?php echo $row['price']; ?></th>
                                <th><?php echo $row['start1']; ?></th>
                                <th><?php echo $row['end1']; ?></th>
                                <th><?php echo $row['name1']; ?></th>
                                <th><?php echo $row['start2']; ?></th>
                                <th><?php echo $row['end2']; ?></th>
                                <th><?php echo $row['name2']; ?></th>
                                <th> <a href="editroom2.php?redit=<?php echo $row['id'] ?>" class=save>edit</a></th>
                                <th> <a href="editroomdb.php?rdelete=<?php echo $row['id'] ?>" class="delete"> Delete</a></th>
                            </tr>
                        <?php endwhile ?>

                    </table>
                </div>





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