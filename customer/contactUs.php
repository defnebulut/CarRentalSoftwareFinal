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
    <title>Contact Us</title>
</head>

<body>

    <?php
    $from = $to = $subject = $header = $message = "";
    if ($_SERVER["REQUEST_METHOD"] && isset($_POST['submit_3'])) {
        $to = "d.bulut0907@gmail.com";
        $subject = test_input($_POST["subject"]);
        $from = test_input($_POST["email"]);
        $message = test_input($_POST["message"]);
        $name = test_input($_POST["name"]);

        if (isset($_POST['submit_3'])) {
            $to = "d.bulut0907@gmail.com";
            $subject = $_POST["subject"];
            $from = $_POST["email"];
            $message = $_POST["message"];
            $name = $_POST["name"];


            $header = "From:" . $from . "\r\n";
            $header .= "Cc:d.bulut0907@gmail.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            echo "<script>alert('Message sent succesfuly!')</script>";
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
    <div class="flex-container" id="cont-fl">
        <div class="flex-item-left" id="i-l">
            <div class="cont">
                <i class="fa-solid fa-phone fa-2x" style="color: black;"></i>
                <span class="text" style="font-size: 30px;">+12 345 6789</span>
            </div>
            <div class="cont" style="margin-top: 50px;">
                <i class="fa-solid fa-at fa-2x" style="color: black;"></i>
                <span class="text" style="font-size: 30px;">example@gmail.com</span>
            </div>
            <div class="cont" style="margin-top: 50px;">
                <i class="fa-solid fa-location-dot fa-2x" style="color: black;"></i>
                <span class="text" style="font-size: 25px;">Pınarbaşı, Akdeniz Ünv., 07070 Konyaaltı/Antalya</span>
            </div>
        </div>
        <div class="flex-item-right" id="i-r">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12764.244
          369206552!2d30.65395103256252!3d36.888886740827004!2m3!1f0!2f0!3f0!3m2!
          1i1024!2i768!4f13.1!3m3!1m2!1s0x14c391d21adab4e3%3A0x3565209148a2e448!2s
          Akdeniz%20%C3%9Cniversitesi%20M%C3%BChendislik%20Fak%C3%BCltesi!5e0!3m2!
          1str!2str!4v1648923863559!5m2!1str!2str" width="600" height="450" style="border: 0 ; margin:auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <hr class="solid" style="margin-bottom: 90px;">
    <h2 style="text-align: center; margin-bottom: 30PX;">SUGGESTIONS AND COMMENTS</h2>
    <div class="container py-4">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="contactForm">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" name="name" id="name" type="text" placeholder="Name" autocomplete="off" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="emailAddress">Email Address</label>
                <input class="form-control" name="email" id="emailAddress" type="text" placeholder="Email Address" autocomplete="off" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="subject">Subject</label>
                <input class="form-control" name="subject" id="name" type="text" placeholder="Subject" autocomplete="off" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control" name="message" id="message" type="text" placeholder="Message" style="height: 10rem" required></textarea>
            </div>
            <input type="submit" name="submit_3" value="SEND" class="sear-btn ">
        </form>
    </div>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>