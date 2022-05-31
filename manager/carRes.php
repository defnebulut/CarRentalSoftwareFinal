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
    <link rel="stylesheet" href="css/main.css" />
    <title>Cars & Reservations</title>
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
        $modelQuery = $model =  "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit212'])) {
            $model = test_input($_POST["brand"]);
            if($model=="*"){
                $modelQuery="";
            }else{
                $modelQuery =" AND c.vehicleTypeID='$model'";
            }
            if (isset($_POST['submit212'])) {
                $model = $_POST["brand"];
                $_SESSION["query2"]=$modelQuery;
                echo "<script> location.href='carRes.php'; </script>";
            }
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
            <h2 style="text-align: center; margin:100px 0 40px 0">MODELS & RESERVATIONS</h2>
            <div class="container">
                <div class="row">
                    <div class="col-8" style="margin-bottom:10px">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <label class="form-label" for="brandModel" style="margin-top: 8px; margin-left:40px;font-size:larger">Brand&Model*</label>
                            <br>
                            <select name="brand" style="margin-left:40px">
                                <option value="*">All</option>
                                <?php
                                $sql = "SELECT vehicletypeID,brandName,model FROM vehicletype ORDER BY brandName,model";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["vehicletypeID"] . '">' . $row["brandName"] . " - " . $row["model"] . '</option>';
                                    $i++;
                                }
                                ?>
                            </select>
                            <input type="submit" name="submit212" value="SEARCH">
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
                                if (isset($_SESSION["query2"])) {
                                    $sql .= $_SESSION["query2"];
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