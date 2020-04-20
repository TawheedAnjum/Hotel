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
</head>

<body>

    <div class="container">
        <div class="user" align="center">
            <div class="info" style="margin-top: 3rem; margin-bottom: 3rem;">
                <table>
                    <tr>
                        <th>email</th>
                        <th>dob</th>
                        <th>password</th>
                        <th>number</th>
                        <th>catagory</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    
                    <?php
                    $_COOKIE['loggemail'];
                    require 'admindb.php';

                    $conn = new mysqli('localhost', 'root', '', 'hotel') or die(mysqli_error($conn));

                    $sql = "SELECT * From user";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <th><?php echo $row['email']; ?></th>
                            <th><?php echo $row['date']; ?></th>
                            <th><?php echo $row['password']; ?></th>
                            <th><?php echo $row['number']; ?></th>
                            <th><?php echo $row['category']; ?></th>
                            <th> <a href="admin.php?edit=<?php echo $row['id'] ?>" class="save">Edit</a></th>
                            <th> <a href="admindb.php?delete=<?php echo $row['id'] ?>" class="delete"> Delete</a></th>
                        </tr>

                    <?php endwhile ?>
                </table>
            </div>

            <div class="form" align="center">

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
                        <tr style="margin-top: 10px">
                            <th>
                                <span> Choose category :</span>
                                <select id="category" name="category" value="<?php echo $category; ?>" class="category">
                                    <option value="emp" selected>---</option>
                                    <option value="viwer">viwer</option>
                                    <option value="hotel_owner">hotel owner</option>
                                    <option value="admin">admin</option>
                                </select>
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

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>