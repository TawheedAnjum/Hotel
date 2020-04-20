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



    <!-- login frame -->
    <div class="container">
        <div class="login-frame">
            <form action="registerdb.php" onsubmit="return validation()" method="post">
                <table>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="email" name="email" id="email" placeholder="email" autofocus /><br>
                                <span id="erremail" style="color: red">
                                </span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="password" id="password" name="password" placeholder="password" />
                                <span id="errpassword" style="color: red"></span>

                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="password" name="conpassword"  id="conpassword" placeholder="confirm password" />
                                <span id="errconpassword" style="color: red">
                                </span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="date" id="date" name="date" placeholder="date of birthd" />
                                <span id="errdate" style="color: red">
                                </span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="tab">
                                <input type="number" id="number" name="number" placeholder="phone number" />
                                <span id="errnumber" style="color: red">
                                </span>
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
                                <span id="errcategory" style="color: red">
                                </span>
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
                            <input type="submit" value="Register" name="submit" class="register">
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

    <script>
        function validation() {

            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var conpassword = document.getElementById('conpassword').value;
            var date = document.getElementById('date').value;
            var number= document.getElementById('number').value;
            var category= document.getElementById('category').value;


            if (email == "") {
                document.getElementById('erremail').innerHTML="Enater email";
                return false;
            }

            if (password == "") {
                document.getElementById('errpassword').innerHTML="Enater password";
                return false;
            }

            if (password.length<4) {
                document.getElementById('errpassword').innerHTML="Enater 4 degit password";
                return false;
            }

            if (conpassword == "") {
                document.getElementById('errconpassword').innerHTML="Enater confirm password";
                return false;
            }

            if (password != conpassword) {
                document.getElementById('errconpassword').innerHTML="Confirm password do not match";
                return false;
            }

            if (date == "") {
                document.getElementById('errdate').innerHTML="Enater date";
                return false;
            }

            if (number == "") {
                document.getElementById('errnumber').innerHTML="Enater Mobile Number";
                return false;
            }

            if (number.length != 11) {
                document.getElementById('errnumber').innerHTML="Enater 11 digit";
                return false;
            }

            if (category == "---") {
                document.getElementById('errcategory').innerHTML="Select catagory";
                return false;
            }
            
        }
    </script>

</body>

</html>