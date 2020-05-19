<?php isset($_COOKIE['logemail']); ?>
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
    <link rel="stylesheet" href="css/admin.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Crete+Round&family=Ubuntu&display=swap" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="user">
            <div class="info">
                <table style="background-color: #343A40; margin-bottom:20px; font-family: 'Crete Round', serif;" class="tab-1">
                    <tr>
                        <th class="head" style="max-width: 190px; min-width:190px;">Email</th>
                        <th class="head">DOB</th>
                        <th class="head">Password</th>
                        <th class="head">Number</th>
                        <th class="head">Catagory</th>
                        <th class="head">Edit</th>
                        <th class="head"> Delete</th>
                    </tr>
                </table>

                <?php
                require 'admindb.php';

                $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

                $sql = "SELECT * From user";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) :
                ?>
                    <table>
                        <tr>
                            <th style="max-width: 190px; min-width:190px;"><?php echo $row['email']; ?></th>
                            <th><?php echo $row['date']; ?></th>
                            <th><?php echo $row['password']; ?></th>
                            <th><?php echo $row['number']; ?></th>
                            <th><?php echo $row['category']; ?></th>
                            <th> <a href="admin.php?edit=<?php echo $row['id'] ?>" class="save">Edit</a></th>
                            <th> <a href="admindb.php?delete=<?php echo $row['id'] ?>" class="delete"> Delete</a></th>
                        </tr>
                    </table>
                    <hr>

                <?php endwhile ?>

            </div>
        </div>

        <div class="get_info">
            <div class="form">

                <form action="admindb.php" method="post">
                    <table>
                        <tr>
                            <th>
                                <input type="hidden" name="id" value="<?php echo $id; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Enter name: <br>
                                <input type="email" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" class="input" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                password: <br>
                                <input type="password" id="passwod" name="password" placeholder="password" value="<?php echo $password; ?>" class="input" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Date of birth: <br>
                                <input type="date" id="date" name="date" placeholder="date of birthd" value="<?php echo $date; ?>" class="input" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Number: <br>
                                <input type="number" id="number" name="number" placeholder="phone number" value="<?php echo $number; ?>" class="input" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <span style="margin: 10px 0px;"> Choose category :</span>
                                <?php if ($update == true) : ?>
                                    <select id="category" name="category" value="<?php echo $category; ?>" class="category" style="margin: 10px 0px;">
                                        <option value="emp" <?php if ($category == "emp") echo 'selected="selected"'; ?>>None</option>
                                        <option value="viwer" <?php if ($category == "viwer") echo 'selected="selected"'; ?>>viwer</option>
                                        <option value="hotel_owner" <?php if ($category == "hotel_owner") echo 'selected="selected"'; ?>>hotel owner</option>
                                        <option value="admin" <?php if ($category == "admin") echo 'selected="selected"'; ?>>admin</option>
                                    </select>
                                <?php else : ?>
                                    <select id="category" name="category" value="<?php echo $category; ?>" class="category" style="margin: 10px 0px;">
                                        <option value="emp" selected>None</option>
                                        <option value="viwer">viwer</option>
                                        <option value="hotel_owner">hotel owner</option>
                                        <option value="admin">admin</option>
                                    </select>
                                <?php endif ?>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <?php if ($update == true) : ?>
                                    <input type="submit" value="Update" name="update" class="save">
                                <?php else : ?>
                                    <input type="submit" value="Save" name="save" class="save">
                                <?php endif ?>
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <!-- hotel -->
        <div class="container">
            <div class="hotel">
                <div class="table_info">
                    <table class="h_tab1" style="background-color: #343A40; margin-bottom:20px; font-family: 'Crete Round', serif;">
                        <tr>
                            <th class="h_head" style="min-width: 190px; max-width: 190px;">viwer Email</th>
                            <th class="h_head" style="min-width: 190px; max-width: 190px;">Hotel Name</th>
                            <th class="h_head">Area</th>
                            <th class="h_head">Hotel Phone</th>
                            <th class="h_head" style="min-width: 100px; max-width: 100px;">Room Number</th>
                            <th class="h_head">Edit</th>
                            <th class="h_head">Delete</th>
                        </tr>
                    </table>
                    <hr>

                    <?php
                    $sql = "SELECT * From hotel_profile";
                    $result = $conn->query($sql);
                    $room_number = 0;
                    while ($row = $result->fetch_assoc()) :
                    ?>

                        <?php
                        $r_sql = "SELECT * From room WHERE hotel_id=" . $row['id'];
                        $r_result = $conn->query($r_sql);
                        while ($r_row = $r_result->fetch_assoc()) {
                            $room_number++;
                        }
                        ?>

                        <table class="h_tab2">
                            <tr>
                                <th style="min-width: 190px; max-width: 190px;"><?php echo $row['viwer_email']; ?></th>
                                <th style="min-width: 190px; max-width: 190px;"><?php echo $row['name']; ?></th>
                                <th><?php echo $row['area']; ?></th>
                                <th><?php echo $row['phone'] ?></th>
                                <th style="min-width: 100px; max-width: 100px;"><?php echo $room_number ?></th>
                                <th><a href="admin.php?h_edit=<?php echo $row['id'] ?>" class="save">Edit</a></th>
                                <th><a href="admindb.php?h_delete=<?php echo $row['id'] ?>" class="delete"> Delete</a></th>
                            </tr>
                        </table>
                        <hr>

                    <?php endwhile ?>
                </div>
            </div>
            <div class="form_midle">
                <div class="hotel_input">
                    <form action="admindb.php" method="post">
                    <table>
                        <tr>
                            <th>
                                <input type="hidden" name="hotel_id" value="<?php echo $id; ?>" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Hotel Email: <br>
                                <input type="email" name="hote_email" value="<?php echo $hotel_email; ?>" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Phone: <br>
                                <input type="number" name="phone" value="<?php echo $phone; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Hotel Name: <br>
                                <input type="text" name="name" value="<?php echo $name; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                adress: <br>
                                <input type="text" name="adress" value="<?php echo $adress; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Area: <br>
                                <input type="text" name="area" value="<?php echo $area; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Max Price: <br>
                                <input type="number" name="rmax" value="<?php echo $rmax; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Min Price: <br>
                                <input type="number" name="rmin" value="<?php echo $rmin; ?>" /><br>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                description: <br>
                                <textarea name="description" rows="4" cols="10" style="width: 250px">
                                    <?php echo $description ?>
                                </textarea>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="submit" value="Update" name="hotel_update" class="save">
                            </th>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
