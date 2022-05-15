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
    <title>Home Page</title>
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
    $pdate = $rdate = $location = $carType = "";
    if ($_SERVER["REQUEST_METHOD"] && isset($_POST['submit_1'])) {
        $pdate = test_input($_POST["pdate"]);
        $rdate = test_input($_POST["rdate"]);
        $location = test_input($_POST["city"]);
        $carType = test_input($_POST["brand"]);
        $date_now = date("Y-m-d");
        if($location=="--- Choose a city ---"){
            echo "<script>alert('Please select a city!')</script>";
        } else if ($pdate > $rdate) {
            echo "<script>alert('Return date must be greater than pick-up date!')</script>";
        } else if ($pdate < $date_now) {
            echo "<script>alert('Pick up date must be greater than today!')</script>";
        } else {
            if (isset($_POST['submit_1'])) {
                $pdate = $_POST["pdate"];
                $rdate = $_POST["rdate"];
                $location = $_POST["city"];
                $carType = $_POST["brand"];
                if($carType=="All Vehicles"){
                    $carType = "*";
                }
                $_SESSION["pdate"] = $pdate;
                $_SESSION["rdate"] = $rdate;
                $_SESSION["location"] = $location;
                $_SESSION["type"] = $carType;
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
    <?php include "customerNavbar.php"; ?>
    <div class="bg-img">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container" id="h-form">
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
                            <h4>Car Brand(optional)</h4>
                            <select name="brand">
                                <option value="" selected>All Vehicles</option>
                                <?php
                                $sql = "SELECT brandName FROM vehicleBrand ORDER BY brandName";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["brandName"] . '">' . $row["brandName"] . '</option>';
                                }
                                ?>
                            </select>
                            <input type="submit" name="submit_1" value="SEARCH" class="sear-btn ">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="flex-container">
        <div class="flex-item-left">
            <img class="container-img" src="Images/fleet.jpg" alt="car photo" />
            <div class="content-cont">
                <span class="text">
                    <h2>FLEET</h2>
                </span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut nulla
                imperdiet, hendrerit turpis quis, posuere augue. Fusce molestie nibh vel
                neque suscipit condimentum. Proin sed dignissim nisl, vel tempor orci.
                Cras ut aliquam neque. Nam mattis odio sed nulla lobortis tincidunt.
                Mauris sem quam, tempor et dapibus at, fermentum sit amet risus. Sed
                porta bibendum ligula, at convallis urna imperdiet et.
            </div>
            <button onclick="document.location='fleet.php'" class="button-74" role="button" id="go-btn">
                <span class="text">VIEW MORE</span>
        </div>
        <div class="flex-item-right">
            <img class="container-img" src="Images/team.png" alt="team photo" />
            <span class="text">
                <h2>OUR TEAM</h2>
            </span>
            <div class="content-cont">
                Fusce ac faucibus eros, nec luctus quam. Donec non lorem nec libero
                malesuada tempus id ultricies nulla. Morbi eleifend neque sed faucibus
                posuere. Fusce vel urna sit amet sem finibus luctus quis non libero.
                Mauris dignissim pretium pharetra. Phasellus non feugiat sapien. In nec
                sagittis orci.
            </div>
            <button onclick="document.location='aboutUs.php'" class="button-74" role="button" id="go-btn">
                <span class="text">VIEW MORE</span>
        </div>
    </div>
    <div class="flex-item-bottom">
        <img class="container-img" src="Images/faqSm.png" alt="faq photo" />
        <span class="text">
            <h2>FAQ</h2>
        </span>
        <div class="content-cont">
            Integer at fermentum tortor, eu feugiat arcu. Phasellus ornare laoreet justo a facilisis.
        </div>
        <button onclick="document.location='FAQ.php'" class="button-74" role="button" id="go-btn">
            <span class="text">VIEW MORE</span>
    </div>

    <hr class="solid" style="margin-bottom: 90px;">
    <h1 id="bp">BUSINESS PARTNERS</h1>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $sql = "SELECT brandLogo FROM vehicleBrand";
            $result = $conn->query($sql);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) { ?>
                    <div class="carousel-item active">
                    <?php
                } else { ?>
                        <div class="carousel-item">
                        <?php
                    }
                        ?>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['brandLogo']); ?>" class="d-block w-100" id="clogo" alt="car logo" />
                        </div>
                    <?php $i++;
                } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
        </div>
        <?php include "customerFooter.php"; ?>
        <script src="../manager/js/main.js"></script>
</body>

</html>