<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- my css -->
    <link rel="stylesheet" href="css/register.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Cookie|Montez|Norican|Roboto&display=swap" rel="stylesheet">
    <!-- font-family: 'Roboto', sans-serif;
font-family: 'Cookie', cursive;
font-family: 'Norican', cursive;
font-family: 'Montez', cursive; -->
</head>

<body>

    <!-- carsol -->
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="2000">
                <img src="images/header1.jpg" class="d-block w-100 h-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="images/header2.jpg" class="d-block w-100 h-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="3000">
                <img src="images/header3.jpg" class="d-block w-100 h-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- header -->
    <div class="mainhead fixed-top">
        <div class="container">
            <div class="header">
                <div class="myNavbar">
                    <div class="logo">
                        <img src="images/logo.svg" alt="logo" height="40px" width="auto">
                    </div>
                    <div class="head2">
                        <div class="n-item"><a href="index.php">Home</a></div>
                        <div class="n-item"><a href="#">Hotel Room</a></div>
                        <div class="n-item"><a href="">Contact</a></div>
                        <div class="n-item button"><a href="login.php" class="btn1">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- php start -->
    <?php

    if (isset($_POST['register'])) {
        // viwer email
        if ($_POST['email'] == "") {
            $error_msg['email'] = "Email is required";
        } else {
            $email = test_input($_POST['email']);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_msg['email'] = "Invalid email format";
            }
        }

        // password
        if ($_POST['password'] == "") {
            $error_msg['password'] = "Password is required";
        }

        // conpassword
        if ($_POST['conpassword'] == "") {
            $error_msg['conpassword'] = "Confirm Password is required";
        } elseif ($_POST['password'] != $_POST['conpassword']) {

            $error_msg['conpassword'] = "Password not match";
        } 

        // date
        if ($_POST['date'] == "") {
            $error_msg['date'] = "Date is required";
        }

        // number
        if ($_POST['number'] == "") {
            $error_msg['number'] = "Number is required";
        } else {
            $number = test_input($_POST['number']);
            // check if e-mail address is well-formed
            if ((strlen($_POST['number'])) != 11) {
                $error_msg['number'] = "maximum 11 digitt";
            }
        }

        // catagory
        if ($_POST['category'] == "emp") {
            $error_msg['category'] = "Select category";
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <!-- php end -->

    <!-- login frame -->
    <div class="container">
        <div class="login-frame">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="email" name="email" id="email" placeholder="email" autofocus /><br>
                                <span style="color: red">
                                    <?php if (isset($error_msg['email'])) {
                                        echo $error_msg['email'];
                                    }  ?></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="password" id="passwod" name="password" placeholder="password" />
                                <span style="color: red">
                                    <?php if (isset($error_msg['password'])) {
                                        echo $error_msg['password'];
                                    }  ?></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="password" name="conpassword" placeholder="confirm password" />
                                <span style="color: red">
                                    <?php if (isset($error_msg['conpassword'])) {
                                        echo $error_msg['conpassword'];
                                    }  ?></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="date" id="date" name="date" placeholder="date of birthd" />
                                <span style="color: red">
                                    <?php if (isset($error_msg['date'])) {
                                        echo $error_msg['date'];
                                    }  ?></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="number" id="number" name="number" placeholder="phone number" />
                                <span style="color: red">
                                    <?php if (isset($error_msg['number'])) {
                                        echo $error_msg['number'];
                                    }  ?></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <span class="choose"> Choose your category :</span>
                                <select id="category" name="category" class="category">
                                    <option value="emp" selected>---</option>
                                    <option value="viwer">viwer</option>
                                    <option value="hotel_owner">hotel owner</option>
                                </select>
                                <span style="color: red">
                                    <?php if (isset($error_msg['category'])) {
                                        echo $error_msg['category'];
                                    }  ?></span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab"> <input type="checkbox" name="check" class="message" required /> <span> I accept the Privecy & Pollicy</span></div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="submit" value="Register" name="register" class="register">
                        </th>
                    </tr>
                </table>
            </form>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- massage check -->
    <?php
    if (isset($error_msg) == true) {
        die();
    } else {
        include 'registerdb.php';
    }
    ?>
</body>

</html>