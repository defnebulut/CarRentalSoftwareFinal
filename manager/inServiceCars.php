<?php

use LDAP\Result;

if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <title>Customer & Reservations</title>
    <style>
        .ad-btn2 {
            text-transform: uppercase;
            width: 60%;
            height: 40px;
            border-radius: 80px;
            font-size: 16px;
            line-height: 35px;
            text-align: center;
            border: 3px solid black;
            display: block;
            text-decoration: none;
            margin: 1px auto 1px auto;
            color: whitesmoke;
            overflow: hidden;
            position: relative;
            background-color: black;
        }

        .ad-btn2:hover {
            color: #1e1717;
            border: 2px solid black;
            background: transparent;
            transition: all 0.3s ease;
            box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
        }
    </style>
</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php include "navbar.php"; ?>
    <div class="row g-0">
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu.php"; ?>
        </div>
        <div class="col-sm-6 col-md-8">
            <h2 style="text-align: center; margin:100px 0 40px 0">CARS IN REPAIR</h2>
            <div class="container1" style="margin-top: 5%;">
                <div class="table" style="margin-bottom:30%;">
                    <div class="table-header">
                        <div class="header__item">car id</div>
                        <div class="header__item">license plate</div>
                        <div class="header__item">city</div>
                    </div>
                    <?php $sql = "SELECT carID,licensePlate,city FROM car WHERE activationStatus=0";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="table-row">
                         <div class="table-data">' . $row["carID"] . '</div>
                            <div class="table-data">' . $row["licensePlate"] . '</div>
                            <div class="table-data">' . $row["city"] . '</div>

                         </div>';
                    } ?>

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