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
    <title>Search</title>
    <link href="customerCss/fleet.css" rel="stylesheet" />
</head>

<body style="overflow-x: hidden;">
    <?php include "customerNavbar.php"; ?>
    <?php
    $pDate = $_SESSION["pdate"];
    $rDate = $_SESSION["rdate"];
    $pDate1 = date_create($_SESSION["pdate"]);
    $rDate1 = date_create($_SESSION["rdate"]);
    $diff = date_diff($rDate1, $pDate1);
    $carCity = $_SESSION["location"];
    ?>
    <div class="container1" style="margin-left: 10px; text-align: center;">
        <div class="row" style="margin-top:0px;">
            <div class="col" id="past-res">
                <i class="fa-solid fa-circle-check fa-2x"></i>
                <h2>Rental Details:</h2>
                <i class="fa-solid fa-location-dot fa-2x"></i><?php echo $_SESSION["location"] ?><br />
                <i class="fa-solid fa-calendar-days fa-2x" style="margin-top: 15px"></i>Date From:<?php echo $_SESSION["pdate"] ?><br />
                <i class="fa-solid fa-calendar-days fa-2x" style="margin-top: 15px"></i>Date To:<?php echo $_SESSION["rdate"] ?><br />
            </div>
            <div class="col" id="active">
                <h3 style="color: grey; margin-top: 40px;">CURRENT:</h3>
                <h2 style="margin-top: 30px;">Vehicle</h2> <br>
                <h3 style="color: rgb(0, 87, 0);">Search!</h3>
            </div>
            <div class="col" id="next">
                <h3 style="color: grey; margin-top: 40px;">NEXT:</h3>
                <h2 style="margin-top: 30px;">Purchase</h2>
            </div>
            <div class="col" id="next">
                <h3 style="color: grey; margin-top: 40px;">THEN:</h3>
                <h2 style="margin-top: 30px;">Reservation Complete!</h2>
            </div>
        </div>

    </div>
    <?php include "dbConfig.php" ?>
    <div class="container1">
        <div class="row" id="ads">
            <?php
            $sqlC = "SELECT carID, vehicletypeID
                FROM car
                WHERE activationStatus=1 AND city='$carCity' AND carID NOT IN (
                    SELECT CarID
                    From reservation
                    WHERE dateFrom BETWEEN DATE('$pDate') AND DATE('$rDate') OR 
                    dateTo BETWEEN DATE('$pDate') AND DATE('$rDate')) 
                    GROUP BY vehicletypeID";
            $resultC = $conn->query($sqlC);
            while ($rowC = $resultC->fetch_assoc()) {
                $temp = $rowC["vehicletypeID"];
                $sql = "SELECT vt.vehicletypeID,vt.brandName,vt.model,vt.pricePerDay,vt.carImage,vf.productYear
                FROM vehicletype vt, vehiclefeatures vf
                WHERE vt.vehicleTypeID = vf.vehicleTypeID AND vt.vehicletypeID='$temp'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $row["carImage"] = "CARS" . $row["carImage"];
                    echo '<div class="col-md-4" style="margin-bottom:30px;">
                <div class="card rounded">
                  <div class="card-image">
                    <span class="card-notify-year">' . $row["productYear"] . '</span>
                     <img src="../Images/' . $row["carImage"] . '" style="width:250px; height:auto; margin-left:160px">'; ?>

            <?php
                    echo '</div>
                  <div class="card-image-overlay m-auto">
                    <span class="card-detail-badge"> $' . $row["pricePerDay"] . ' PER DAY</span>
                  </div>
                  <div class="card-body text-center">
                    <div class="ad-title1 m-auto">
                      <h5>' . $row["brandName"] . ' ' . $row["model"] . '</h5>
                    </div>
                    <a class="ad-btn2" href="prePurchase.php?id=' . $rowC["carID"] . '">BOOK</a>
                  </div>
                </div>
              </div>';
                }
            } ?>

        </div>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>