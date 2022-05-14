<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <title>Reservations</title>
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
            <h2 style="text-align: center; margin:100px 0 40px 0">RESERVATIONS</h2>
            <div class="search-container">
                <form action="#">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="container1" style="margin-top: 5%;">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item">customer id</div>
                        <div class="header__item">order ref</div>
                        <div class="header__item">license plate</div>
                        <div class="header__item">car id</div>
                        <div class="header__item">date from</div>
                        <div class="header__item">date to</div>
                        <div class="header__item"></div>
                    </div>
                    <div class="table-content">
                        <?php
                        $sql = "SELECT * FROM reservation";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="table-row">
                            <div class="table-data">' . $row["cutomerID"] . '</div>
                            <div class="table-data">' . $row["orderRef"] . '</div>
                            <div class="table-data">' . $row["licensePlate"] . '</div>
                            <div class="table-data">' . $row["carID"] . '</div>
                            <div class="table-data">' . $row["dateFrom"] . '</div>
                            <div class="table-data">' . $row["dateTo"] . '</div>
                            <div class="table-data">
                                <button class="button-31" role="button">CANCEL</button>
                            </div>
                            </div>';
                        }
                        ?>
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