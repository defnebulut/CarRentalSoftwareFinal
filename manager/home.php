<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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

    $sql = "SELECT COUNT(*) FROM car;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $carCount = $row["COUNT(*)"];
    }
    $sql = "SELECT COUNT(*) FROM customer;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $customerCount = $row["COUNT(*)"];
    }
    $sql = "SELECT SUM(totalCost) FROM reservation;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $income = $row["SUM(totalCost)"];
    }

    ?>
    <?php include "navbar.php"; ?>
    <div class="row g-0">
        <div class="col-6 col-md-2" style="background-color:  #8f92962f; display: inline;">
            <?php include "managerMenu.php"; ?>
        </div>

        <div class="col-sm-6 col-md-8">
            <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3" style="margin-top:30px;">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <i class="fa-solid fa-users fa-2x" style="color: black;"></i>
                        <?php echo $customerCount; ?>
                        &emsp; MEMBERS
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <i class="fa-solid fa-dollar-sign fa-2x" style="color: green;"></i>
                        INCOME
                        <span class="text">$</span>
                        <?php echo $income; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <i class="fa-solid fa-dollar-sign fa-2x" style="color: rgb(131, 0, 0);"></i>
                        EXPENSE(per month)&emsp;
                        <span class="text">$1273</span>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <i class="fa-solid fa-car fa-2x" style="color: black;"></i>
                        &emsp;CARS&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <?php echo $carCount; ?>
                    </div>
                </div>
                <canvas id="myChart" style="width:100%;max-width:600px; margin:80px 0 0 300px"></canvas>
                <script>
                    var yValues = ['<?=$customerCount?>','<?=$income?>','<?=$carCount?>']
                    var xValues = ["Member", "Income", "Cars"];
                    var barColors = ["red", "green", "blue"];
                    new Chart("myChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues,
                            }, ],
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Company Statistics",
                            },
                        },
                    });
                </script>
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