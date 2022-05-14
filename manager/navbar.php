<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/d540061d63.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="../logo.png" alt="Daphne Rental logo" width="60" height="48" style="margin-right: 20px" />
                <span class="text" style="margin-right: 1px">DAPHNE RENTAL</span></a>
            <div class="vl"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-image: url('../toggler.png')"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-top: 10px">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">HOME</a>
                    </li>
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <?php
                        echo $_SESSION['name'];
                        ?>
                        <i class="fa-solid fa-circle-user" style="margin-left: 5px;"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-lg-end" style="width: 90%; margin-right: 40px;">
                        <li><a class="dropdown-item" href="accountSettings.php">Account Settings</a></li>
                        <li><a class="dropdown-item" href="login.php">Log Out
                                <i class="fa-solid fa-right-from-bracket" style="margin-left: 10px;"></i>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>