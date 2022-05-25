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
    $result = $conn->query($sql);
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record deleted succesfully!')</script>";
        echo "<script> location.href='reservations.php'; </script>";
    } else {
        echo "<script>alert('An error has occured!')</script>";
        echo "<script> location.href='reservations.php'; </script>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>