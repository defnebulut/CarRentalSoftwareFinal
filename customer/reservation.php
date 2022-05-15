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
    <?php
    $pDate = $_SESSION["pdate"];
    $rDate = $_SESSION["rdate"];
    $pDate1 = date_create($_SESSION["pdate"]);
    $rDate1 = date_create($_SESSION["rdate"]);
    $diff=date_diff($rDate1,$pDate1);
    $carCity = $_SESSION["location"];


    $vID = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_5'])) {
        if (isset($_POST['submit_5'])) {
            if ($_SESSION["loggedIn"] == 0) {
                echo "<script>alert('You need to login first!')</script>";
                echo "<script> location.href='cLogin.php'; </script>";
            }
            $vID = $_POST["flexRadioDefault"];
            $a = "SELECT pricePerDay FROM vehicletype WHERE vehicletypeID='$vID'";
            $b = $conn->query($a);
            while($row = $b->fetch_assoc()){
                $num1 = (int)$row["pricePerDay"];
                $num2 = (int)$diff;
                $_SESSION["total"]=$num1*$num2;
            }
            $sqlC = "SELECT carID, vehicletypeID
            FROM car
            WHERE vehicletypeID='$vID' AND activationStatus='1' AND city='$carCity' AND carID NOT IN (
                SELECT CarID
                From reservation
                WHERE dateFrom BETWEEN DATE('$pDate') AND DATE('$rDate') OR 
                dateTo BETWEEN DATE('$pDate') AND DATE('$rDate')) 
                GROUP BY vehicletypeID";
            $resultC = $conn->query($sqlC);
            while ($row = $resultC->fetch_assoc()) {
                $_SESSION["cID"]=$row["carID"];
                $_SESSION["vid"]=$vID;
                if(empty($_SESSION["cID"])){
                    echo "<script>alert('An error has occured!')</script>";
                    echo "<script> location.href='customerMain.php'; </script>";
                }else{
                    echo "<script> location.href='purchase.php'; </script>";
                }
            }
        }
    }
    ?>
    <div class="container1">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                while ($row = $resultC->fetch_assoc()) {
                    $temp = $row["vehicletypeID"];
                    $sql = "SELECT vt.vehicletypeID,vt.brandName,vt.model,vt.pricePerDay,vt.carImage,vf.productYear
                FROM vehicletype vt, vehiclefeatures vf
                WHERE vt.vehicleTypeID = vf.vehicleTypeID AND vt.vehicletypeID='$temp'";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4" style="margin-bottom:30px;">
                    <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="' . $row["vehicletypeID"] . '"">
                          </div>
                <div class="card rounded">
                  <div class="card-image">
                    <span class="card-notify-year">' . $row["productYear"] . '</span>' ?>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['carImage']); ?>" style="max-height:250px; weight:auto;" alt="car photo" />
                <?php
                        echo '</div>
                  <div class="card-image-overlay m-auto">
                    <span class="card-detail-badge"> $' . $row["pricePerDay"] . ' PER DAY</span>
                  </div>
                  <div class="card-body text-center">
                    <div class="ad-title1 m-auto">
                      <h5>' . $row["brandName"] . ' ' . $row["model"] . '</h5>
                    </div>
                    <input type="submit" name="submit_5" value="BOOK" class="sear-btn" style="margin-top:0">
                  </div>
                </div>
              </div>';
                    }
                } ?>

            </div>
        </form>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>