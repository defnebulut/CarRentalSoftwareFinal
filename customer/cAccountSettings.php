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
    <title>Account Settings</title>
    <link href="customerCss/fleet.css" rel="stylesheet">
    <style>
        input[type=submit] {
            background-color: rgb(66, 66, 66);
            border-radius: 4px;
            border-style: none;
            box-sizing: border-box;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #fff;
            cursor: pointer;
            display: block;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.5;
            max-width: none;
            min-height: 44px;
            min-width: 10px;
            outline: none;
            overflow: hidden;
            padding: 9px 20px 8px;
            position: relative;
            text-align: center;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 50%;
            height: 50px;
        }

        input[type=submit]:hover {
            opacity: 0.75;
        }

        #pass-sett {
            margin-left: 50px;
            margin-bottom: 20px;
        }

        #acc-sett {
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <?php include "dbConfig.php" ?>
    <?php
    $email =  $_SESSION["email"];
    $password = $repassword = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_10'])) {
        $password = test_input($_POST["password"]);
        $repassword = test_input($_POST["repassword"]);
        if ($password != $repassword) {
            echo "<script>alert('Passwords must be same!')</script>";
            echo "<script> location.href='cAccountSettings.php'; </script>";
        } else {
            if (isset($_POST['submit_10'])) {
                $password = md5($password);
                $sql = "UPDATE customer SET customerPassword='" . $password . "' WHERE customerEmail='$email'";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Password updated succesfully!')</script>";
                    echo "<script> location.href='cAccountSettings.php'; </script>";
                } else {
                    echo "<script>alert('An error has occured!')</script>";
                    echo "<script> location.href='cAccountSettings.php'; </script>";
                }
                mysqli_close($conn);
            }
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <?php include "customerNavbar.php"; ?>
    <h2 style="text-align: center; margin: 70px 0 40px 10px">ACCOUNT DETAILS</h2>
    <div class="container">
        <div class="row">
            <div class="col-6" style="margin-top: 5%;  margin-left: auto; margin-right: auto;">
                <form action="accountSettings.html" id="acc-sett">
                    <div class="mb-3">
                        <label class="form-label" for="name">NAME SURNAME</label>
                        <input class="form-control" id="name" type="text" placeholder="<?php echo $_SESSION['customerName'] ?>" disabled />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="text" placeholder="<?php echo $_SESSION['email'] ?>" disabled />
                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <hr>
        <div class="row">
            <div class="col-6" style="margin-left: auto; margin-right: auto;">
                <h3 style="margin: 40px 0 30px 50px">Password Settings</h3>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="pass-sett">
                    <div class="mb-3">
                        <label class="form-label" for="password">New Password</label>
                        <input class="form-control" name="password" id="password" type="password" placeholder="*****" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="repassword">Repassword</label>
                        <input class="form-control" name="repassword" id="repassword" type="password" placeholder="*****" required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" name="submit_10" value="SAVE">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>