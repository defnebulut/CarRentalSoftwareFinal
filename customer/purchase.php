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
    <title>Purchase</title>
    <link href="customerCss/fleet.css" rel="stylesheet">
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
    <?php
    $pDate = $_SESSION["pdate"];
    $rDate = $_SESSION["rdate"];
    $custID = $_SESSION["customerID"];
    $carID = $_SESSION["cID"];
    $total = $_SESSION["total"];
    $name = $dL = $cN = $exp = $cvv = "";
    $sql = "SELECT licensePlate FROM car WHERE carID='$carID'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $lic = $row["licensePlate"];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_6'])) {
        if (isset($_POST['submit_6'])) {
            $name = $_POST["name"];
            $dL = $_POST["dl"];
            $exp = $_POST["exp"];
            $cvv = $_POST["cvv"];

            $sql = "INSERT INTO reservation (carID,licensePlate,customerID, dateFrom,dateTo,totalCost) VALUES ('$carID','$lic','$custID', '$pDate','$rDate','$total')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Reservation completed succesfuly !')</script>";
                echo "<script> location.href='myReservations.php'; </script>";
            } else {
                echo "<script>alert('An error has occured!')</script>";
                echo "<script> location.href='customerMain.php'; </script>";
            }
            mysqli_close($conn);
        }
    }
    ?>
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
            <div class="col" id="past-res">
                <h3 style="color: grey; margin-top: 40px;"></h3>
                <h2 style="margin-top: 30px;">Vehicle</h2> <br>
                <h3>Selected</h3>
            </div>
            <div class="col" id="active">
                <h3 style="color: grey; margin-top: 40px;">CURRENT:</h3>
                <h2 style="margin-top: 30px;">Purchase</h2>
            </div>
            <div class="col" id="next">
                <h3 style="color: grey; margin-top: 40px;">NEXT:</h3>
                <h2 style="margin-top: 30px;">Reservation Complete!</h2>
            </div>
        </div>
    </div>
    <div class="container p-0">
        <div class="card px-4" id="paym">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="d-flex flex-column" style="margin-top: 30px">
                    <p class="h8 py-3">Personal Details</p>
                    <p class="text mb-1">Name&Surname*</p>
                    <input class="form-control mb-3" name="name" type="text-i" placeholder="Name&Surname" required />
                </div>
                <div class="d-flex flex-column" style="margin-top: 30px">
                    <p class="text mb-1">Driver License ID*</p>
                    <input class="form-control mb-3" name="dl" type="text-i" placeholder="Driver License ID" required />
                </div>
                <p class="h8 py-3" style="margin-top: 50px;">Payment Details</p>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number*</p>
                        <input class="form-control mb-3" type="text-i" name="cN" placeholder="XXXX-XXXXX-XXXX-XXXX" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry*</p>
                        <input class="form-control mb-3" name="exp" type="text-i" placeholder="MM/YYYY" required />
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC*</p>
                        <input class="form-control mb-3 pt-2" name="cvv" type="text-i" placeholder="***" required />
                    </div>
                </div>
                <input type="submit" name="submit_6" value="PAY $<?php echo $total ?>" class="sear-btn" style="margin-top:50px">
            </form>
        </div>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>

</body>

</html>