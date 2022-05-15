<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <title>Vehicles</title>
    <style>
        input[type=submit] {
            background-color: rgb(66, 66, 66);
            border-radius: 4px;
            border-style: none;
            box-sizing: border-box;
            margin-top: 50px;
            color: #fff;
            cursor: pointer;
            display: block;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.5;
            max-width: none;
            min-height: 44px;
            min-width: 10px;
            outline: none;
            overflow: hidden;
            padding: 9px 20px 8px;
            position: relative;
            text-align: center;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 95%;
            height: 50px;
        }

        input[type=submit]:hover {
            opacity: 0.75;
        }

        select {
            background-color: rgba(0, 0, 0, 0.875);
            color: whitesmoke;
            height: 50px;
            width: auto;
        }

        option:hover {
            background-color: red;
        }
    </style>
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
    <?php include "navbar.php"; ?>
    <div class="row g-0">
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu.php"; ?>
        </div>

        <div class="col-sm-6 col-md-8">
            <h2 style="text-align: center; margin: 100px 0 40px 0">VEHICLES</h2>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin: auto">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-a-tab" data-bs-toggle="pill" data-bs-target="#pills-a" type="button" role="tab" aria-controls="pills-a" aria-selected="true">
                        See Cars
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">
                        Add Car
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Delete Car
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        Update Car
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
                    <h3 style="margin: 20px 0 10px 0">See Cars:</h3>
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search" autocomplete="off">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table" style="margin-bottom: 30%;">
                            <div class="table-header">
                                <div class="header__item">license plate</div>
                                <div class="header__item">car id</div>
                                <div class="header__item">brand</div>
                                <div class="header__item">model</div>
                                <div class="header__item">status</div>
                                <div class="header__item">price(per day)</div>
                            </div>
                            <div class="table-content">
                                <?php
                                $sql = "SELECT c.licensePlate,c.carID,v.brandName,v.model,c.activationStatus,v.pricePerDay 
                                FROM car c,vehicletype v 
                                WHERE c.vehicletypeID=v.vehicletypeID 
                                ORDER BY v.brandName,v.model,c.carID;";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $isActive = "Active";
                                    if ($row["activationStatus"] == 0) {
                                        $isActive = "Deactive";
                                    }
                                    echo '<div class="table-row">
                            <div class="table-data">' . $row["licensePlate"] . '</div>
                            <div class="table-data">' . $row["carID"] . '</div>
                            <div class="table-data">' . $row["brandName"] . '</div>
                            <div class="table-data">' . $row["model"] . '</div>
                            <div class="table-data">' . $isActive . '</div>
                            <div class="table-data">' . $row["pricePerDay"] . '</div>
                            </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $carID = $err = $licensePlate = $city = $vehicletypeID = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_1'])) {
                    $licensePlate = test_input($_POST["licensePlate"]);
                    $city = test_input($_POST["city"]);
                    $vehicletypeID = test_input($_POST["brand"]);

                    $sql = "SELECT licensePlate FROM car WHERE licensePlate='$licensePlate'";
                    $result = $conn->query($sql);
                    if ($result->num_rows != 0) {
                        echo "<script>alert('This license plate already exists!')</script>";
                    } else {
                        if (isset($_POST['submit_1'])) {
                            $licensePlate = $_POST['licensePlate'];
                            $city = $_POST['city'];
                            $vehicletypeID = test_input($_POST["brand"]);
                            $sql = "INSERT INTO car (licensePlate, vehicletypeID, city) VALUES ('$licensePlate','$vehicletypeID','$city')";
                            if (mysqli_query($conn, $sql)) {
                                echo "<script>alert('New record has been added successfully !')</script>";
                                echo "<script> location.href='vehicles.php'; </script>";
                            } else {
                                echo "<script>alert('An error has occured!')</script>";
                                echo "<script> location.href='vehicles.php'; </script>";
                            }
                            mysqli_close($conn);
                        }
                    }
                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_2'])) {
                    $carID = test_input($_POST['flexRadioDefault']);
                    if (isset($_POST['submit_2'])) {
                        $carID = $_POST['flexRadioDefault'];
                        $sql = "DELETE FROM car WHERE carID='$carID'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Record deleted succesfully!')</script>";
                            echo "<script> location.href='vehicles.php'; </script>";
                        } else {
                            echo "<script>alert('An error has occured!')</script>";
                            echo "<script> location.href='vehicles.php'; </script>";
                        }
                        mysqli_close($conn);
                    }
                } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_3'])) {
                    $carID = test_input($_POST['flexRadioDefault']);
                    if (isset($_POST['submit_3'])) {
                        $carID = $_POST['flexRadioDefault'];
                        $sql = "SELECT activationStatus FROM car WHERE carID='$carID'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            if ($row["activationStatus"] == 1) {
                                $sql = "UPDATE car SET activationStatus='0' WHERE carID='$carID'";
                            } else {
                                $sql = "UPDATE car SET activationStatus='1' WHERE carID='$carID'";
                            }
                        }
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Record updated succesfully!')</script>";
                            echo "<script> location.href='vehicles.php'; </script>";
                        } else {
                            echo "<script>alert('An error has occured!')</script>";
                            echo "<script> location.href='vehicles.php'; </script>";
                        }
                        mysqli_close($conn);
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
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h3 style="margin: 20px 0 40px 0">Add New Car:</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-8" style="margin-bottom: 250px">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="licensePlate">LICENSE PLATE*</label>
                                        <input class="form-control" name="licensePlate" id="licensePlate" type="text" placeholder="XXXXX-00-XXXX" autocomplete="off" required />
                                    </div>

                                    <div class="btn-group" style="margin-top: 30px;">
                                        <select name="brand">
                                            <option value="">--- Choose brand&model ---</option>
                                            <?php
                                            $sql = "SELECT vehicletypeID,brandName,model FROM vehicletype ORDER BY brandName,model";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["vehicletypeID"] . '">' . $row["brandName"] . " - " . $row["model"] . '</option>';
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                        <select name="city" id="city" style="margin-left: 40px">
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
                                    </div>
                                    <input type="submit" name="submit_1" value="ADD">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search" autocomplete="off">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="table" style="margin-bottom: 30px">
                                <div class="table-header">
                                    <div class="header__item">car id</div>
                                    <div class="header__item">license plate</div>
                                </div>
                                <div class="table-content">
                                    <?php
                                    $sql = "SELECT * FROM car";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="table-row">
                            <div class="table-data style="width:5px;"><div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="' . $row["carID"] . '">' . $row["carID"] . '
                          </div></div>        
                            <div class="table-data">' . $row["licensePlate"] . '</div>
                            </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <input type="submit" name="submit_2" value="DELETE" style="margin-bottom:30%">
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search" autocomplete="off">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="table">
                                <div class="table-header">
                                    <div class="header__item"></div>
                                    <div class="header__item">license plate</div>
                                    <div class="header__item">car id</div>
                                    <div class="header__item">status</div>
                                    <div class="header__item">price</div>
                                </div>
                                <div class="table-content">
                                    <?php
                                    $sql = "SELECT c.licensePlate,c.carID,c.activationStatus,v.pricePerDay FROM car c,vehicletype v WHERE c.vehicletypeID=v.vehicletypeID;";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $isActive = "Active";
                                        if ($row["activationStatus"] == 0) {
                                            $isActive = "Deactive";
                                        }
                                        echo '<div class="table-row">
                                    <div class="table-data style="width:5px;"><div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="' . $row["carID"] . '" style=" margin-left: 60px;">
                          </div></div>
                            <div class="table-data">' . $row["licensePlate"] . '</div>
                            <div class="table-data">' . $row["carID"] . '</div>
                            <div class="table-data">' . $isActive . '</div>
                            <div class="table-data">' . $row["pricePerDay"] . '</div>
                            </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <input type="submit" name="submit_3" value="ACTIVATE/DEACTIVATE" style="margin-bottom:30%">
                        </form>
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