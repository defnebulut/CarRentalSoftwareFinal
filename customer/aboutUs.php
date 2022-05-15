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
    <title>About Us</title>
    <script src="https://kit.fontawesome.com/d540061d63.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "customerNavbar.php"; ?>
    <div class="team-container">
        <h2 class="hr-text">OUR TEAM</h2>
        <hr class="solid1" style="margin-bottom: 40px;">
        <p class="inner-text">Lorem ipsum dolor sit amet, consec tetur adipiscing the egtlit sekido eiusmod of the tempor
            incid dunt ulert labore et dolore all magna aliqua mi bibendum neque egestas.In hac habitasse platea dictumst.
            Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vel consectetur leo, vitae feugiat sapien.
            Phasellus scelerisque porta quam, ac aliquam dolor rhoncus sit amet. Quisque et magna congue, lobortis metus eget,
            blandit velit. Donec vulputate condimentum purus quis gravida. Proin dui neque, pellentesque eget nunc vestibulum,
            faucibus dapibus massa. Pellentesque porttitor maximus neque.</p>
    </div>
    <div class="people-container">
        <div class="people-item-left">
            <img class="people-img" src="Images/person1.jpg" alt="person photo" />
            <div class="overlay1">
                <div class="text1">Arisha Riley</div>
            </div>
            <span class="text">
                <h2>CHIEF EXECUTIVE</h2>
            </span>
        </div>
        <div class="people-item-middle">
            <img class="people-img" src="Images/person2.jpg" alt="person photo" />
            <div class="overlay2">
                <div class="text1">Blaine Myers</div>
            </div>
            <span class="text">
                <h2>VICE PRESIDENT</h2>
            </span>
        </div>
        <div class="people-item-right">
            <img class="people-img" src="Images/person3.jpg" alt="person photo" />
            <div class="overlay3">
                <div class="text1">Della Wilde</div>
            </div>
            <span class="text">
                <h2>OFFICER</h2>
            </span>
        </div>
    </div>
    <p class="inner-text" style="margin-top: 90px;">Lorem ipsum dolor sit amet, consec tetur adipiscing the egtlit sekido eiusmod of the tempor
        incid dunt ulert labore et dolore all magna aliqua mi bibendum neque egestas.In hac habitasse platea dictumst.
        Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vel consectetur leo, vitae feugiat sapien.
        Phasellus scelerisque porta quam, ac aliquam dolor rhoncus sit amet. Quisque et magna congue, lobortis metus eget,
        blandit velit. Donec vulputate condimentum purus quis gravida. Proin dui neque, pellentesque eget nunc vestibulum,
        faucibus dapibus massa. Pellentesque porttitor maximus neque.</p>


    
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>