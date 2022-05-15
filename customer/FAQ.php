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
    <title>FAQ</title>
    <script src="https://kit.fontawesome.com/d540061d63.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
</head>

<body>
    <?php include "customerNavbar.php"; ?>
    <div class="bg-img" style="background-image: url('Images/faq.jpg'); height: 480px;"></div>
    <div class="text-center">
        <h2 class="mt-5 mb-5" style="font-weight: 550;">Frequently Asked Questions</h2>
    </div>
    <section class="container my-5" id="maincontent">
        <section id="accordion">
            <a class="py-3 d-block h-100 w-100 position-relative z-index-1 pr-1 text-secondary border-top" aria-controls="faq-17" aria-expanded="false" data-toggle="collapse" href="#faq-17" role="button">
                <div class="position-relative">
                    <h2 class="h4 m-0 pr-3">
                        What do I need to hire a car?
                    </h2>
                    <div class="position-absolute top-0 right-0 h-100 d-flex align-items-center">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="faq-17">
                <div class="card card-body border-0 p-0">
                    <p>Custom gear can be ordered through our contact form. Additional fees may apply.</p>

                </div>
            </div>

            <a class="py-3 d-block h-100 w-100 position-relative z-index-1 pr-1 text-secondary border-top" aria-controls="faq-18" aria-expanded="false" data-toggle="collapse" href="#faq-18" role="button">
                <div class="position-relative">
                    <h2 class="h4 m-0 pr-3">
                        Can I book a hire car for someone else?
                    </h2>
                    <div class="position-absolute top-0 right-0 h-100 d-flex align-items-center">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="faq-18">
                <div class="card card-body border-0 p-0">
                    <p>Our official mission statement is lorem ipsum dolor sit.</p>
                    <p>
                    </p>
                </div>
            </div>

            <a class="py-3 d-block h-100 w-100 position-relative z-index-1 pr-1 text-secondary border-top" aria-controls="faq-19" aria-expanded="false" data-toggle="collapse" href="#faq-19" role="button">
                <div class="position-relative">
                    <h2 class="h4 m-0 pr-3">
                        What should I look for when I'm choosing a car?
                    </h2>
                    <div class="position-absolute top-0 right-0 h-100 d-flex align-items-center">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="faq-19">
                <div class="card card-body border-0 p-0">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit?</p>
                    <p>
                    </p>
                </div>
            </div>

            <a class="py-3 d-block h-100 w-100 position-relative z-index-1 pr-1 text-secondary  border-top" aria-controls="faq-20" aria-expanded="false" data-toggle="collapse" href="#faq-20" role="button">
                <div class="position-relative">
                    <h2 class="h4 m-0 pr-3">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit?
                    </h2>
                    <div class="position-absolute top-0 right-0 h-100 d-flex align-items-center">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="faq-20">
                <div class="card card-body border-0 p-0">
                    <p>The best email for any inquiries is email@email.com!</p>
                    <p>
                    </p>
                </div>
            </div>

            <a class="py-3 d-block h-100 w-100 position-relative z-index-1 pr-1 text-secondary  border-top" aria-controls="faq-21" aria-expanded="false" data-toggle="collapse" href="#faq-21" role="button">
                <div class="position-relative">
                    <h2 class="h4 m-0 pr-3">
                        Where can I read more about this company?
                    </h2>
                    <div class="position-absolute top-0 right-0 h-100 d-flex align-items-center">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="faq-21">
                <div class="card card-body border-0 p-0">
                    <p>Lorem ipsum dolor sit!</p>
                    <p>
                    </p>
                </div>
            </div>

            <a class="py-3 d-block h-100 w-100 position-relative z-index-1 pr-1 text-secondary  border-top" aria-controls="faq-22" aria-expanded="false" data-toggle="collapse" href="#faq-22" role="button">
                <div class="position-relative">
                    <h2 class="h4 m-0 pr-3">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit?
                    </h2>
                    <div class="position-absolute top-0 right-0 h-100 d-flex align-items-center">
                        <i class="fa fa-plus"></i>
                    </div>
                </div>
            </a>
            <div class="collapse" id="faq-22">
                <div class="card card-body border-0 p-0">
                    <p>The best time to call is 24/7! We are always available to answer any questions.</p>
                    <p>
                    </p>
                </div>
            </div>
        </section>
    </section>
    <?php include "customerFooter.php"; ?>
    <script src="../manager/js/main.js"></script>
</body>

</html>