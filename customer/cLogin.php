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
    <link rel="stylesheet" href="customerCss/cLogin.css">
    <title>Daphne rental</title>
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
    <?php
    // define variables and set to empty values
    $email = $password = "";
    $notMatchedErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);


        $sql = "SELECT customerPassword FROM customer WHERE customerEmail='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $notMatchedErr = "<br>No such user exists.";
        } else if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["customerPassword"] != md5($password)) {
                    $notMatchedErr = "Wrong password!";
                    break;
                }
            }
        }

        if ($notMatchedErr == "") {
            $sql = "SELECT customerName,customerEmail FROM customer WHERE customerEmail='$email'";
            $_SESSION["email"] = $email;
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $_SESSION["name"] = $row["customerName"];
            }
            $_SESSION["loggedIn"]=1;
            echo "<script> location.href='customerMain.php'; </script>";
        }else{
            $_SESSION["loggedIn"]=0;
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
    <form class='login-form' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <img src="../logo.png" width="90" height="100" alt="logo" class="center">
        <h2 style="text-align: center;">DAPHNE RENTAL</h2>
        <h4 style="text-align: center;">LOG IN</h4>
        <div class="flex-row">
            <label class="lf--label" for="username">
                <svg x="0px" y="0px" width="12px" height="13px">
                    <path fill="#B1B7C4" d="M8.9,7.2C9,6.9,9,6.7,9,6.5v-4C9,1.1,7.9,0,6.5,0h-1C4.1,0,3,1.1,3,2.5v4c0,0.2,0,0.4,0.1,0.7 C1.3,7.8,0,9.5,0,11.5V13h12v-1.5C12,9.5,10.7,7.8,8.9,7.2z M4,2.5C4,1.7,4.7,1,5.5,1h1C7.3,1,8,1.7,8,2.5v4c0,0.2,0,0.4-0.1,0.6 l0.1,0L7.9,7.3C7.6,7.8,7.1,8.2,6.5,8.2h-1c-0.6,0-1.1-0.4-1.4-0.9L4.1,7.1l0.1,0C4,6.9,4,6.7,4,6.5V2.5z M11,12H1v-0.5 c0-1.6,1-2.9,2.4-3.4c0.5,0.7,1.2,1.1,2.1,1.1h1c0.8,0,1.6-0.4,2.1-1.1C10,8.5,11,9.9,11,11.5V12z" />
                </svg>
            </label>
            <input id="email" name="email" class='lf--input' placeholder='Email' type='text' required>
            <br><br>
        </div>
        <div class="flex-row">
            <label class="lf--label" for="password">
                <svg x="0px" y="0px" width="15px" height="5px">
                    <g>
                        <path fill="#B1B7C4" d="M6,2L6,2c0-1.1-1-2-2.1-2H2.1C1,0,0,0.9,0,2.1v0.8C0,4.1,1,5,2.1,5h1.7C5,5,6,4.1,6,2.9V3h5v1h1V3h1v2h1V3h1 V2H6z M5.1,2.9c0,0.7-0.6,1.2-1.3,1.2H2.1c-0.7,0-1.3-0.6-1.3-1.2V2.1c0-0.7,0.6-1.2,1.3-1.2h1.7c0.7,0,1.3,0.6,1.3,1.2V2.9z" />
                    </g>
                </svg>
            </label>
            <input id="password" name="password" class='lf--input' placeholder='Password' type='password' required>
            <br><br>
        </div>
        <input class='lf--submit' type='submit' value='LOGIN'>
        <br><br>
        <a href="cSignup.php" style="color: black; font-size:20px;">Don't have an account? Sign up here!</a>
        <span class="error"><br><?php echo $notMatchedErr; ?><br></span>
    </form>
    <script src="../manager/js/main.js"></script>
</body>

</html>