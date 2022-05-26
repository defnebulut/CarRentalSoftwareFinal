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
    <title>Reservation</title>
</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php include "customerNavbar.php"; ?>
    <?php
    $a=$_SESSION["orderRef"];
    $brand = $size = $pdate = $rdate = $location = "";
    if ($_SERVER["REQUEST_METHOD"] && isset($_POST['submit_12'])) {
        $pdate = test_input($_POST["pdate"]);
        $rdate = test_input($_POST["rdate"]);
        $location = test_input($_POST["city"]);
        $brand = test_input($_POST["brand"]);
        $size = test_input($_POST["size"]);
        $date_now = date("Y-m-d");
        if ($pdate > $rdate) {
            echo "<script>alert('Return date must be greater than pick-up date!')</script>";
        } else if ($pdate < $date_now) {
            echo "<script>alert('Pick up date must be greater than today!')</script>";
        } else {
            if (isset($_POST['submit_12'])) {
                $pdate = $_POST["pdate"];
                $rdate = $_POST["rdate"];
                $location = $_POST["city"];
                $_SESSION["pdate"] = $pdate;
                $_SESSION["rdate"] = $rdate;
                $_SESSION["location"] = $location;
                $_SESSION["orderRef"] = $a;
                $_SESSION["cBrand"] = $brand;
                $_SESSION["cSize"] = $size;
                echo "<script> location.href='reservation.php'; </script>";
            }
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
    <div class="bg-img">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container" id="h-form" style="top:120px">
            <label for="location" style="font-size: 22px;color: rgb(48, 0, 0);" id="prl"><b>Pick-up&Return
                    Location*</b></label>
            <select name="city" id="city">
                <script>
                    const cities = [
                        '--- Choose a city ---', 'Istanbul', 'Ankara', 'Izmir', 'Antalya', 'Bursa', 'Eskisehir'
                    ]
                    var select = document.getElementById('city');
                    for (var i = 0; i < cities.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = cities[i];
                        opt.innerHTML = cities[i];
                        select.appendChild(opt);
                    }
                </script>
            </select>
            <div class="coc-form">
                <div class="coc-block-row">
                    <div class="row  g-0">
                        <div class="col-sm-6 col-md-6">
                            <label class="coc-block-label" for="pdate" id="pdate"><b>Pick-up Date*</b></label>
                            <div class="coc-block">
                                <input class="coc-input" type="date" name="pdate" id="pdate" required />
                            </div>
                            <label class="coc-block-label" for="rdate" id="rdatel"><b>Return Date*</b></label>
                            <div class="coc-block">
                                <input class="coc-input" type="date" name="rdate" id="rdate" required />
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                        <label for="location" style="font-size: 22px;color: rgb(48, 0, 0);" id="prl"><b>Brand</b></label>
                            <select name="brand">
                                <option value="*">All Brands</option>
                                <?php
                                $sql = "SELECT brandName FROM vehiclebrand ORDER BY brandName";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["brandName"] . '">' . $row["brandName"] . '</option>';
                                }
                                ?>
                            </select>
                            <label for="location" style="font-size: 22px;color: rgb(48, 0, 0);" id="prl"><b>Size</b></label>
                            <select name="size" id="size">
                                <option value="*">All Sizes</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                            <input type="submit" name="submit_12" value="SEARCH" class="sear-btn ">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>