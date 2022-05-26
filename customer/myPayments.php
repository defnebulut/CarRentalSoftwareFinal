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
    <link href="customerCss/fleet.css" rel="stylesheet">
    <title>My Payments</title>
</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php include "customerNavbar.php"; ?>
    <?php
    $custID = $_SESSION["customerID"];
    ?>
    <h3 style="margin: 80px 0 10px 0;text-align: center;">My Payments</h3>
    <div class="container">
        <div class="row">
            <div class="col-6" style="margin-top: 5%;  margin-left: auto; margin-right: auto;">
                <div class="container1" style="margin-top: 5%;">
                    <div class="table" style="margin-bottom: 30px">
                        <div class="table-header">
                            <div class="header__item">order ref</div>
                            <div class="header__item">card number</div>
                            <div class="header__item">cost</div>
                        </div>
                        <div class="table-content">
                            <?php
                            $sql = "SELECT orderRef,cardNumber,cost
                            FROM customerPayment
                            WHERE customerID='$custID'";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $f4 = substr($row["cardNumber"],0,4);
                                $l4 = substr($row["cardNumber"],-4);
                                $cN = $f4."********".$l4;
                                echo '<div class="table-row">
                                <div class="table-data">' . $row["orderRef"] . '</div>
                                <div class="table-data">' . $cN . '</div>
                                <div class="table-data">' . $row["cost"] . '</div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>