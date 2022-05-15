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
    $custID = $_SESSION["customerID"];
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_9'])){
        $ordRef = $_POST['flexRadioDefault'];
        if (isset($_POST['submit_9'])) {
            $ordRef = $_POST['flexRadioDefault'];
            $sql = "DELETE FROM reservation WHERE orderRef='$ordRef'";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Record deleted succesfully!')</script>";
                echo "<script> location.href='myReservations.php'; </script>";
            } else {
                echo "<script>alert('An error has occured!')</script>";
                echo "<script> location.href='myReservations.php'; </script>";
            }
            mysqli_close($conn);
        }
    }
     ?>
    <?php include "customerNavbar.php"; ?>
    <h3 style="margin: 80px 0 40px 800px" style="text-align: center;">My Reservations</h3>
    <div class="container1" style="margin-top: 5%;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="table" style="margin-bottom: 30px">
                <div class="table-header">
                    <div class="header__item"></div>
                    <div class="header__item">order ref</div>
                    <div class="header__item">license plate</div>
                    <div class="header__item">date from</div>
                    <div class="header__item">date to</div>
                    <div class="header__item">cost</div>
                </div>
                <div class="table-content">
                    <?php
                    $sql = "SELECT * FROM reservation WHERE customerID='$custID' ORDER BY orderRef;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="table-row">
                         <div class="table-data style="width:5px;"><div class="form-check">
                 <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="' . $row["orderRef"] . '">
               </div></div>
                 <div class="table-data">' . $row["licensePlate"] . '</div>
                 <div class="table-data">' . $row["dateFrom"] . '</div>
                 <div class="table-data">' . $row["dateTo"] . '</div>
                 <div class="table-data">' . $row["totalCost"] . '</div>
                 </div>';
                    }
                    ?>
                </div>
            </div>
            <input type="submit" name="submit_9" value="DELETE" style="margin-bottom:30%">
        </form>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>