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
  <script src="https://kit.fontawesome.com/d540061d63.js" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Fleet</title>
  <link href="customerCss/fleet.css" rel="stylesheet">
</head>

<body>
  <?php include "dbConfig.php" ?>
  <?php
  $sql = "SELECT vt.vehicletypeID,vt.brandName,vt.model,vt.pricePerDay,vt.carImage,vf.productYear
  FROM vehicletype vt, vehiclefeatures vf
  WHERE vt.vehicleTypeID = vf.vehicleTypeID";
  $result = $conn->query($sql);
  ?>
  <?php include "customerNavbar.php"; ?>
  <div class="container">
    <br>
    <h2 style="margin-top: 50px;margin-bottom: 50px; text-align: center; font-size: 50px; font-weight: 600;">MEET THE FLEET</h2>
    <br>
    <div class="row" id="ads">
      <?php while ($row = $result->fetch_assoc()) {
        $row["carImage"] = "CARS" . $row["carImage"];
        echo '<div class="col-md-4" style="margin-bottom:30px;">
                <div class="card rounded">
                  <div class="card-image">
                    <span class="card-notify-year">' . $row["productYear"] . '</span>
                    <img src="../Images/' . $row["carImage"] . '" style="width:250px; height:auto; margin-left:50px;">';
      ?>

      <?php
        echo '</div>
                  <div class="card-image-overlay m-auto">
                    <span class="card-detail-badge"> $' . $row["pricePerDay"] . ' PER DAY</span>
                  </div>
                  <div class="card-body text-center">
                    <div class="ad-title1 m-auto">
                      <h5>' . $row["brandName"] . ' ' . $row["model"] . '</h5>
                    </div>
                    <a class="ad-btn2" href="carPage.php?id=' . $row["vehicletypeID"] . '">VIEW</a>
                  </div>
                </div>
              </div>';
      } ?>

    </div>
  </div>
  <?php include "customerFooter.php"; ?>
  <script src="../manager/js/main.js"></script>
</body>

</html>