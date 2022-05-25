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
    <title>Car Page</title>
    <link href="customerCss/fleet.css" rel="stylesheet">
</head>
<?php include "customerNavbar.php"; ?>

<?php include "customerFooter.php"; ?>
<script src="../manager/js/main.js"></script>

<body>
    <?php include "dbConfig.php" ?>
    <?php
    $carId = $_GET["id"];
    $sql = "SELECT vt.vehicletypeID,vt.brandName,vt.model,vt.pricePerDay,vt.carImage,vf.*
    FROM vehicletype vt, vehiclefeatures vf
    WHERE vt.vehicletypeID = vf.vehicleTypeID AND vt.vehicletypeID='$carId'";
    $result = $conn->query($sql);
    ?>
    <h2 style="text-align: center; margin-top: 130px; font-weight: 600">
        <?php while ($row = $result->fetch_assoc()) {
            echo $row["brandName"] . " " . $row["model"];
        ?> </h2>
    <div class="flex-container">
        <div class="left-item">
            <?php
            echo '<img src="../Images/Cars/' . $row["carImage"] . '" style="width:700px; height:auto; margin-left:160px">';
             ?>
        </div>
        <div class="right-item">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Explanation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            Current price(per day)
                        </th>
                        <td>
                            <h2><?php echo $row["pricePerDay"]; ?></h2>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <i class="fa-solid fa-gears fa-2x" style="color: grey"></i>
                        </th>
                        <td><?php
                            $gear = "Automatic";
                            if ($row["gearType"] == 0) $gear = "Manuel";
                            echo $gear ?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Size
                        </th>
                        <td><?php echo $row["carSize"] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Product Year
                        </th>
                        <td><?php echo $row["productYear"] ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Air Conditioning
                        </th>
                        <td><?php
                            $gear = "yes";
                            if ($row["airConditioning"] == 0) $gear = "no";
                            echo $gear ?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Bluetooth
                        </th>
                        <td><?php
                            $gear = "yes";
                            if ($row["bluetooth"] == 0) $gear = "no";
                            echo $gear ?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Cruise Control
                        </th>
                        <td><?php
                            $gear = "yes";
                            if ($row["cruiseControl"] == 0) $gear = "no";
                            echo $gear ?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Radio
                        </th>
                        <td><?php
                            $gear = "yes";
                            if ($row["radio"] == 0) $gear = "no";
                            echo $gear ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
    </div>
</body>


</html>