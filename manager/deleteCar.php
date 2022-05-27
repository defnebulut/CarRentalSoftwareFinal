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
    $sql2 = "SELECT orderRef FROM reservation WHERE carID='$carID'";
    $result = $conn->query($sql2);
    if ($result->num_rows != 0) {
        $or = "";
        while ($row = $result->fetch_assoc()) {
            $or = $row["orderRef"];
            $sql3 = "DELETE FROM customerpayment WHERE orderRef=$or";
            if (mysqli_query($conn, $sql3)) {
                $sql = "DELETE FROM car WHERE carID='$carID'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Record deleted succesfully!')</script>";
                    echo "<script> location.href='vehicles.php'; </script>";
                } else {
                    echo "<script>alert('An error has occured!')</script>";
                    echo "<script> location.href='vehicles.php'; </script>";
                }
                mysqli_close($conn);
            }else{
                echo "<script>alert('An error has occured!')</script>";
                echo "<script> location.href='vehicles.php'; </script>";
            }
            mysqli_close($conn);
        }
    }
    ?>
</body>

</html>