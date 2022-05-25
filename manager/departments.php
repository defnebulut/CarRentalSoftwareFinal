<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <title>Departments</title>

</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php include "navbar.php"; ?>
    <div class="row g-0">
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu.php"; ?>
        </div>

        <div class="col-sm-6 col-md-8">
            <h2 style="text-align: center; margin:100px 0 40px 0">DEPARTMENTS</h2>
            <div class="container1" style="margin-top: 5%; margin-bottom:35%">
                <div class="table">
                    <div class="table-header" id="dep-tab">
                        <div class="header__item">department name</div>
                        <div class="header__item">email</div>
                        <div class="header__item">phone number</div>
                    </div>
                    <div class="table-content">
                        <?php
                        $sql = "SELECT * FROM departments;";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="table-row">
                            <div class="table-data">' . $row["deptName"] . '</div>
                            <div class="table-data">' . $row["deptTel"] . '</div>
                            <div class="table-data">' . $row["deptEmail"] . '</div>
                            </div>
                            ';
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