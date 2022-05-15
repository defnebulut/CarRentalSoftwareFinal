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
    <title>Fleet</title>
</head>
<body>
<?php include "customerNavbar.php"; ?>

<?php include "customerFooter.php"; ?>
<script src="../manager/js/main.js"></script>
</body>
</html>