<?php
if (!isset($_SESSION)) {
    session_start();
    $_SESSION["loggedIn"] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d540061d63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="customerCss/customerStylecss.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="customerMain.php">
                <img src="../logo.png" alt="Daphne Rental logo" width="60" height="48" style="margin-right: 20px" />
                <span class="text" style="margin-right: 1px">DAPHNE RENTAL</span></a>
            <div class="vl"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-image: url('../toggler.png')"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-top: 10px;">
                    <li class="nav-item">
                        <a class="nav-link" href="customerMain.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fleet.php">FLEET</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="FAQ.php">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contactUs.php">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutUs.php">ABOUT US</a>
                    </li>
                </ul>
                <?php
                if ($_SESSION["loggedIn"] == 1) { ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <?php
                            echo $_SESSION['customerName'];
                            ?>
                            <i class="fa-solid fa-circle-user" style="margin-left: 5px;"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-lg-end" style="width: 90%; margin-right: 40px;">
                            <li><a class="dropdown-item" href="cAccountSettings.php">Account Settings</a></li>
                            <li><a class="dropdown-item" href="myReservations.php">My Reservations</a></li>
                            <li><a class="dropdown-item">
                                    <?php
                                    echo '<a href="logOut.php?login=0" style="color:black;">
                                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 25px;"></i>
                                    Log Out</a>';
                                     ?>
                                </a></li>
                        </ul>
                    </div>
                <?php
                } else {
                    echo '<form class="form-inline my-2 my-lg-0" action="cLogin.php">
                    <button class="button-74" role="button">
                        <span class="text">LOGIN/SIGNUP</span>
                    </button>
                </form>';
                }
                ?>

            </div>
        </div>
    </nav>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../manager/js/main.js"></script>
</body>

</html>