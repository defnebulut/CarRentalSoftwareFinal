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
        <?php
        $customerQuery = $customer =  "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit21'])) {
            $customer = test_input($_POST["customer"]);
            if($customer==""){
                $customerQuery="";
            }else{
                $sql="SELECT customerID FROM customer WHERE customerID='$customer'";
                $result = $conn->query($sql);
                if($result->num_rows==0){
                    $customerQuery="";
                    echo"<script> alert('No such user exist!'); </script>";
                    echo"<script> location.href='cusRes.php'; </script>";
                }
                $customerQuery =" AND r.customerID='$customer'";
            }
            if (isset($_POST['submit21'])) {
                $customer = $_POST["customer"];
                $_SESSION["query3"]=$customerQuery;
                echo "<script> location.href='cusRes.php'; </script>";
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit213'])) {
            unset($_SESSION["query3"]);
        }
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <div class="col-sm-6 col-md-8">
            <h2 style="text-align: center; margin:100px 0 40px 0">CUSTOMERS & RESERVATIONS</h2>
            <div class="container">
                <div class="row">
                    <div class="col-8" style="margin-bottom:10px">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <label class="form-label" for="customer" style="margin-top: 8px; margin-left:40px;font-size:larger">Customer ID*</label>
                            <br>
                            <input class="form-control" name="customer" id="customer" type="text" placeholder="XXXXX" autocomplete="off" style="margin-left:40px"/>
                            <input type="submit" name="submit21" value="SEARCH" style="margin-left:40px">
                            <input type="submit" name="submit213" value="CLEAR FILTER" style="margin-left:40px">
                        </form>
                    </div>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table" style="margin-bottom:30%;">
                            <div class="table-header">
                                <div class="header__item">customer id</div>
                                <div class="header__item">order ref</div>
                                <div class="header__item">car id</div>
                                <div class="header__item">license plate</div>
                                <div class="header__item">city</div>
                                <div class="header__item">date from</div>
                                <div class="header__item">date to</div>
                                <div class="header__item"></div>
                            </div>
                            <div class="table-content">
                                <?php
                                $date_now = date("Y-m-d");
                                $sql = "SELECT r.customerID,r.carID,r.orderRef,r.city,c.licensePlate,r.dateFrom,r.dateTo,r.totalCost 
                        FROM reservation r,car c 
                        WHERE r.carID=c.carID";
                                if (isset($_SESSION["query3"])) {
                                    $sql .= $_SESSION["query3"];
                                }
                                $sql .= " ORDER BY resDate DESC;";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="table-row">
                            <div class="table-data">' . $row["customerID"] . '</div>
                            <div class="table-data">' . $row["orderRef"] . '</div>
                            <div class="table-data">' . $row["carID"] . '</div>
                            <div class="table-data">' . $row["licensePlate"] . '</div>
                            <div class="table-data">' . $row["city"] . '</div>
                            <div class="table-data">' . $row["dateFrom"] . '</div>
                            <div class="table-data">' . $row["dateTo"] . '</div>'; ?> <?php
                                                                                        if ($date_now > $row["dateFrom"]) {
                                                                                            echo '
                               <div class="table-data"><a class="ad-btn2" disabled style="color:whitesmoke">Cancel</a></div>
                               </div>';
                                                                                        } else {
                                                                                            echo '
                               <div class="table-data"><a class="ad-btn2" href="cancelRes.php?id=' . $row["orderRef"] . '">Cancel</a></div>
                               </div>';
                                                                                        }
                                                                                    }
                                                                                        
                                ?>
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