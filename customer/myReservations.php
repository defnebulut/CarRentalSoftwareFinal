<?php
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
    <title>My Reservations</title>
    <link href="customerCss/fleet.css" rel="stylesheet">
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
    <?php
    $custID = $_SESSION["customerID"];
    ?>
    <?php include "customerNavbar.php"; ?>
    <h3 style="margin: 80px 0 40px 800px" style="text-align: center;">My Reservations</h3>
    <div class="container1" style="margin-top: 5%;">
        <div class="table" style="margin-bottom: 30px">
            <div class="table-header">
                <div class="header__item">order ref</div>
                <div class="header__item">city</div>
                <div class="header__item">license plate</div>
                <div class="header__item">date from</div>
                <div class="header__item">date to</div>
                <div class="header__item">cost</div>
                <div class="header__item"></div>
            </div>
            <div class="table-content">
                <?php
                $date_now = date("Y-m-d");
                $sql = "SELECT r.orderRef,r.city,c.licensePlate,r.dateFrom,r.dateTo,r.totalCost FROM reservation r,car c WHERE customerID='$custID' AND r.carID=c.carID ORDER BY orderRef DESC;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="table-row">
                        <div class="table-data">' . $row["orderRef"] . '</div>
                        <div class="table-data">' . $row["city"] . '</div>
                        <div class="table-data">' . $row["licensePlate"] . '</div>
                 <div class="table-data">' . $row["dateFrom"] . '</div>
                 <div class="table-data">' . $row["dateTo"] . '</div>
                 <div class="table-data">' . $row["totalCost"] . '</div>'; ?> <?php
                 if($date_now>$row["dateFrom"]){
                    echo '
                    <div class="table-data"><a class="ad-btn2" disabled style="color:whitesmoke">Cancel</a></div>
                    </div>';
                 }else{
                    echo '
                    <div class="table-data"><a class="ad-btn2" href="cancelRes.php?id=' . $row["orderRef"] . '">Cancel</a></div>
                    </div>';
                 }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>