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
    $orderRef = $_GET["id"];
    $sql = "DELETE FROM reservation WHERE orderRef='$orderRef'";
    if (mysqli_query($conn, $sql)) {
        $sql2 = "DELETE FROM customerpayment WHERE orderRef='$orderRef'";
        if (mysqli_query($conn, $sql2)) {
            echo "<script>alert('Reservation cancelled succesfully!')</script>";
            echo "<script> location.href='myReservations.php'; </script>";
        } else {
            echo "<script>alert('An error has occured!')</script>";
            echo "<script> location.href='myReservations.php'; </script>";
        }
        mysqli_close($conn);
    } else {
        echo "<script>alert('An error has occured!')</script>";
        echo "<script> location.href='reservations.php'; </script>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>