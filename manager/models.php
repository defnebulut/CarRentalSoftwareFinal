<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/models.css" />
    <title>Models</title>
</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php include "navbar.php"; ?>
    <div class="row g-0">
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu.php"; ?>
        </div>
        <div class="col-sm-6 col-md-8">
            <h2 style="text-align: center; margin: 100px 0 40px 0">MODELS</h2>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin: auto; margin-left:50px">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-a-tab" data-bs-toggle="pill" data-bs-target="#pills-a" type="button" role="tab" aria-controls="pills-a" aria-selected="true">
                        See Brands&Models
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false">
                        Add Model
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Update Price
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-x-tab" data-bs-toggle="pill" data-bs-target="#pills-x" type="button" role="tab" aria-controls="pills-x" aria-selected="false">
                        Delete Model
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
                    <h3 style="margin: 20px 0 10px 0">See Brands&Models:</h3>
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search" autocomplete="off">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table" style="margin-bottom: 30%;">
                            <div class="table-header">
                                <div class="header__item">brand name</div>
                                <div class="header__item">model name</div>
                                <div class="header__item">image</div>
                                <div class="header__item">price(per day)</div>
                            </div>
                            <div class="table-content">
                                <?php
                                $sql = "SELECT * FROM vehicleType WHERE 1 ORDER BY brandName ASC,model ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $row["carImage"] = "CARS" . $row["carImage"];
                                    echo '<div class="table-row">
                                    <div class="table-data">' . $row["brandName"] . '</div>
                                    <div class="table-data">' . $row["model"] . '</div>
                                    <div class="table-data"> <img src="../Images/' . $row["carImage"] . '" style="width:200px; height:auto;">  </div>
                                    <div class="table-data">' . $row["pricePerDay"] . '</div>
                                    </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h3 style="margin: 20px 0 40px 0">Add New Model:</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-8" style="margin-bottom: 250px">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                    <label class="form-label" for="brand" style="margin-top: 8px; font-size:large">Brand*</label>
                                    <br>
                                    <select name="brand">
                                        <?php
                                        $sql = "SELECT brandName FROM vehiclebrand ORDER BY brandName";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row["brandName"] . '">' . $row["brandName"] . '</option>';
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                    <div class="mb-3" style="margin-top:30px">
                                        <label class="form-label" for="modelName">MODEL NAME*</label>
                                        <input class="form-control" name="model" id="model" type="text" placeholder="XXXXX" autocomplete="off" required style="margin-bottom:30px" />
                                        <label class="form-label" for="pYear">PRODUCT YEAR*</label>
                                        <input class="form-control" name="pYear" id="pyear" type="text" placeholder="XXXXX" autocomplete="off" required style="margin-bottom:30px" />
                                        <label class="form-label" for="size">SIZE*</label>
                                        <br>
                                        <select name="size">
                                            <option value="small">Small</option>
                                            <option value="medium">Medium</option>
                                            <option value="large">Large</option>
                                        </select>
                                        <br><br>
                                        <label class="form-label" for="price">PRICE PER DAY*</label>
                                        <input class="form-control" name="price" id="price" type="text" placeholder="XXXXX" autocomplete="off" required style="margin-bottom:30px" />
                                        <label class="form-label" for="carImage">CAR IMAGE*</label>
                                        <br>
                                        <div class="input-group file" id="carImage">
                                            <input type="file" class="form-control" name="carImage" id="carImage">
                                        </div>
                                        <br><br><br>
                                        <label class=" form-label" for="gear">GEAR TYPE*</label>
                                        <br>
                                        <input type="radio" name="gear" value="1">Automatic
                                        <br>
                                        <input type="radio" name="gear" value="2">Manuel
                                    </div>
                                    <hr>
                                    <div class="container1" style="margin-top: 5%;">
                                        <div class="table">
                                            <div class="table-header">
                                                <div class="header__item">Feature</div>
                                                <div class="header__item">Yes</div>
                                                <div class="header__item">No</div>
                                            </div>
                                            <div class="table-content">
                                                <?php
                                                $sql = "SELECT COLUMN_NAME
                                                FROM INFORMATION_SCHEMA.COLUMNS
                                                WHERE TABLE_NAME = 'vehiclefeatures' AND `COLUMNS`.`ORDINAL_POSITION`>4";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<div class="table-row">
                                                    <div class="table-data">' . $row["COLUMN_NAME"] . '</div>
                                                    <div class="table-data"><input type="radio" name="' . $row["COLUMN_NAME"] . '" value="1"></div>
                                                    <div class="table-data"><input type="radio" name="' . $row["COLUMN_NAME"] . '" value="2"></div>
                                                    </div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit_9" value="ADD" style="margin-bottom: 5%;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $image = $tempName = $imageName = $pricePerDay = $brand = $model = $pYear = $size = $gear = $cCont = $radio = $airCon = $bluetooth = "";
                $error = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_9'])) {
                    if (empty($_POST["gear"]) || empty($_POST["cruiseControl"]) || empty($_POST["radio"]) || empty($_POST["airConditioning"]) || empty($_POST["bluetooth"])) {
                        $error = "This area is required!";
                    }
                    if (isset($_POST['submit_9'])) {
                        if ($_FILES['carImage']) {
                            $imageName = $_FILES['carImage']['name'];
                            $tempName = $_FILES['carImage']["tmp_name"];
                            $img_ex = pathinfo($imageName, PATHINFO_EXTENSION);
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png");
                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $image = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $imageUploadPath = 'C:/xampp/htdocs/DaphneRentalGit/CarRentalSoftwareFinal/Images/Cars' . $image;
                                move_uploaded_file($tempName, $imageUploadPath);
                            } else {
                                $error = "Only jpg, jpeg and png types are allowed!";
                            }
                        } else {
                            $error = "Unknown Error occured";
                        }
                        if ($error != "") {
                            echo "<script>alert('" . $error . "')</script>";
                            echo "<script> location.href='models.php'; </script>";
                        } else {
                            $pricePerDay = $_POST["price"];
                            $pricePerDay = (int)$pricePerDay;
                            $brand = $_POST["brand"];
                            $model = $_POST["model"];
                            $model = strtoupper($model);
                            $pYear = $_POST["pYear"];
                            $pYear = (int)$pYear;
                            if ($pricePerDay == 0 || $pYear == 0) {
                                echo "<script>alert('Invalid entry!')</script>";
                                echo "<script> location.href='models.php'; </script>";
                            } else {
                                $size = $_POST["size"];
                                $gear = $_POST["gear"];
                                if ($gear == 2) $gear = 0;
                                $cCont = $_POST["cruiseControl"];
                                if ($cCont == 2) $cCont = 0;
                                $radio = $_POST["radio"];
                                if ($radio == 2) $radio = 0;
                                $airCon = $_POST["airConditioning"];
                                if ($airCon == 2) $airCon = 0;
                                $bluetooth = $_POST["bluetooth"];
                                if ($bluetooth == 2) $bluetooth = 0;
                                $img = $model . ".png";

                                $sql = "INSERT INTO vehicletype(brandName,model,pricePerDay,carImage)
                                        VALUES ('$brand','$model','$pricePerDay','$image')";
                                if (mysqli_query($conn, $sql)) {
                                    $sql2 = "SELECT vehicleTypeID FROM vehicletype
                                    ORDER BY vehicleTypeID DESC limit 1;";
                                    $result = $conn->query($sql2);
                                    while ($row = $result->fetch_assoc()) {
                                        $vid = $row["vehicleTypeID"];
                                        $sql3 = "INSERT INTO vehiclefeatures
                                            VALUES ('$vid','$pYear','$size','$gear','$cCont','$radio','$airCon','$bluetooth')";
                                        if (mysqli_query($conn, $sql3)) {
                                            echo "<script>alert('New record has been added successfully !')</script>";
                                            echo "<script> location.href='models.php'; </script>";
                                        } else {
                                            echo "<script>alert('An error has occured!')</script>";
                                            echo "<script> location.href='models.php'; </script>";
                                        }
                                        mysqli_close($conn);
                                        break;
                                    }
                                } else {
                                    echo "<script>alert('An error has occured!')</script>";
                                    echo "<script> location.href='models.php'; </script>";
                                }
                                mysqli_close($conn);
                            }
                        }
                    }
                }

                ?>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h3 style="margin: 20px 0 40px 0">Update Price:</h3>
                    <div class="row">
                        <div class="col-8" style="margin-bottom: 250px">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <label class="form-label" for="brand" style="margin-top: 8px; font-size:large">Brand&Model*</label>
                                <br>
                                <select name="brand">
                                    <?php
                                    $sql = "SELECT vehicletypeID,brandName,model FROM vehicletype ORDER BY brandName,model";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row["vehicletypeID"] . '">' . $row["brandName"] . " - " . $row["model"] . '</option>';
                                        $i++;
                                    }
                                    ?>
                                </select>
                                <br><br>
                                <label class="form-label" for="price" style="font-size:large">Price*</label>
                                <input class="form-control" name="price" id="price" type="text" placeholder="$$$" autocomplete="off" required />
                                <input type="submit" name="submit_10" value="SAVE">
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $price = $vehicletypeID = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_10'])) {
                    $vehicletypeID = $_POST["brand"];
                    $price = $_POST["price"];
                    if (isset($_POST['submit_10'])) {
                        $vehicletypeID = $_POST["brand"];
                        $price = $_POST["price"];
                        $sql = "UPDATE vehicletype
                        SET pricePerDay='$price'
                        WHERE vehicleTypeID='$vehicletypeID'";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Record has been updated successfully !')</script>";
                            echo "<script> location.href='models.php'; </script>";
                        } else {
                            echo "<script>alert('An error has occured!')</script>";
                            echo "<script> location.href='models.php'; </script>";
                        }
                        mysqli_close($conn);
                    }
                }
                ?>
                <div class="tab-pane fade" id="pills-x" role="tabpanel" aria-labelledby="pills-x-tab">
                    <h3 style="margin: 20px 0 40px 0">Delete a Model:</h3>
                    <form action="#">
                        <input type="text" placeholder="Search.." name="search" autocomplete="off">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="container1" style="margin-top: 5%;">
                        <div class="table" style="margin-bottom: 30%;">
                            <div class="table-header">
                                <div class="header__item">brand name</div>
                                <div class="header__item">model name</div>
                                <div class="header__item">price(per day)</div>
                                <div class="header__item"></div>
                            </div>
                            <div class="table-content">
                                <?php
                                $sql = "SELECT * FROM vehicleType WHERE 1 ORDER BY brandName ASC,model ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="table-row">
                                    <div class="table-data">' . $row["brandName"] . '</div>
                                    <div class="table-data">' . $row["model"] . '</div>
                                    <div class="table-data">' . $row["pricePerDay"] . '</div>
                                    <div class="table-data"><a class="ad-btn2" href="deleteModel.php?id=' . $row["vehicleTypeID"] . '">Delete</a></div>
                                    </div>';
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