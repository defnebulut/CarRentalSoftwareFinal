<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php
    $carID = $_GET["id"];
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
    ?>
</body>

</html>