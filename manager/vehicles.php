<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <title>Vehicles</title>
</head>

<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "daphnerental";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    <?php include "navbar.php"; ?>
    <div class="row g-0">
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu.php"; ?>
        </div>

        <div class="col-sm-6 col-md-8">
            <h2 style="text-align: center; margin: 100px 0 40px 0">VEHICLES</h2>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin: auto">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-a-tab" data-bs-toggle="pill" data-bs-target="#pills-a" type="button" role="tab" aria-controls="pills-a" aria-selected="true">
                        See Cars
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">
                        Add Car
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Delete Car
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        Update Car
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
                    <h3 style="margin: 20px 0 10px 0">See Cars:</h3>
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table">
                            <div class="table-header">
                                <div class="header__item">license plate</div>
                                <div class="header__item">car id</div>
                                <div class="header__item">status</div>
                                <div class="header__item">price</div>
                            </div>
                            <div class="table-content">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h3 style="margin: 20px 0 40px 0">Add New Car:</h3>
                    <div class="container">

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table">
                            <div class="table-header">
                                <div class="header__item">license plate</div>
                                <div class="header__item">car id</div>
                                <div class="header__item"></div>
                            </div>
                            <div class="table-content">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table">
                            <div class="table-header">
                                <div class="header__item">license plate</div>
                                <div class="header__item">car id</div>
                                <div class="header__item">status</div>
                                <div class="header__item">price</div>

                                <div class="header__item"></div>
                                <div class="header__item"></div>
                            </div>
                            <div class="table-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu2.php"; ?>
        </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="js/main.js"></script>
</body>

</html>