<?php
$conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

if (isset($_GET['redit'])) :
?>

    <?php
    $id = $_GET['redit'];
    $sql = "SELECT * FROM hroom WHERE id='$id'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $hname = $row['hname'];
    $room = $row['room'];
    $price = $row['price'];
    $start1 = $row['start1'];
    $end1 = $row['end1'];
    $name1 = $row['name1'];
    $start2 = $row['start2'];
    $end2 = $row['end2'];
    $name2 = $row['name2'];

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

        <div class="form" align="center">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table>
                    <tr>
                        <th>
                            <input type="hidden" name="id" value="<?php echo $id;  ?>" /><br>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="hidden" name="hname" value="<?php echo $hname;  ?>" /><br>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Enter Room number: <br>
                            <input type="text" name="room" value="<?php echo $room;  ?>" class="input" /><br>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Price: <br>
                            <input type="number" name="price" value="<?php echo $price;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Bokking1 From: <br>
                            <input type="date" name="start1" value="<?php echo $start1;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Bokking1 To: <br>
                            <input type="date" name="end1" value="<?php echo $end1;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Name1: <br>
                            <input type="text" name="name1" value="<?php echo $name1;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Bokking2 From: <br>
                            <input type="date" name="start2" value="<?php echo $start2;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Bokking2 To: <br>
                            <input type="date" name="end2" value="<?php echo $end2;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Name2: <br>
                            <input type="text" name="name2" value="<?php echo $name2;  ?>" class="input" />
                        </th>
                    </tr>
                    <tr>
                        <th>

                            <input type="submit" value="Update" name="update" class="save">

                        </th>
                    </tr>
                </table>
            </form>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php endif ?>

    <?php  
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $hname = $_POST['hname'];
        $room = $_POST['room'];
        $price = $_POST['price'];
        $start1 = $_POST['start1'];
        $end1 = $_POST['end1'];
        $name1 = $_POST['name1'];
        $start2 = $_POST['start2'];
        $end2 = $_POST['end2'];
        $name2 = $_POST['name2'];
        
        $sql = "UPDATE hroom SET hname='$hname', room='$room', price='$price', start1='$start1', end1='$end1', name1='$name1', start2='$start2', end2='$end2', name2='$name2' WHERE id='$id'";
        $result = $conn->query($sql);
    }

    ?>
    </body>

    </html>