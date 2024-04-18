<?php
session_start();
include "dbConnect.php";
include "query.php";

$movies = get_all_movies($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/nav.css">
    <title>Movie Store</title>
</head>

<body>

    <header class="header" id="header">
        <nav class="navbar container">
            <a href="#" class="brand">Movie Store</a>
            <div class="search">
                <form class="search-form">
                    <input type="text" name="search" class="search-input" placeholder="Search for Movie" autofocus>
                    <button type="submit" class="search-submit" disabled><i class="bx bx-search"></i></button>
                </form>
            </div>
            <div class="menu" id="menu">
                <ul class="menu-inner">
                    <li class="menu-item"><a href="#" class="menu-link">Contact</a></li>
                    <li class="menu-item"><a href="#" class="menu-link">About</a></li>
                    <?php if (isset($_SESSION['user_email'])) { ?>
                        <form action="./logout.php">
                            <button type="submit">Logout</button>
                        </form>
                    <?php } else { ?>
                        <li class="menu-item"><a href="login.php" class="menu-link">signin</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
        </nav>
    </header>
    <div class="container moviecard">
        <div class="row">
            <?php foreach ($movies as $movie) { ?>


                <div class="col-md-4 col-12   col-sm-6">
                    <div class="card card-cascade card-ecommerce wider shadow mb-5" data-aos="zoom-in"
                        data-aos-duration="1000">
                        <div class="view view-cascade overlay text-center">
                            <a href="#">
                                <img class="card-img-top" src="./image.jpg" alt="">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="d-flex justify-content-between text-nowrap">
                                <a
                                    href="./moviedetail.php/?id=<?= $movie['id'] ?>&movie_name=<?= $movie['name'] ?>"><?= $movie['name'] ?></a>
                            </div> <!-- Card Description-->
                            <p class="price">$15</p>
                        </div>
                    </div>
                </div>



            <?php } ?>
        </div>
    </div>


    <script src="./js/nav.js"></script>
</body>

</html>