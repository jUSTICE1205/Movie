<?php
session_start();
include "dbConnect.php";
include "query.php";

$movie = get_movie($db, $_GET['id']);
$comments = get_comments($db, $_GET['id']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/details.css">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                <img src="./image.jpg" alt="movie">
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <div class="product-title text-bold my-3">
                        <?= $movie[0]['name'] ?>
                    </div>


                    <div class="price-area my-4">
                        <p class="new-price text-bold mb-1">$15</p>

                    </div>


                    <div class="buttons d-flex my-5">
                        <div class="block">
                            <button class="shadow btn custom-btn">Add to cart</button>
                        </div>
                    </div>




                </div>

                <div class="product-details my-4">
                    <p class="details-title text-color mb-1">Movie Details</p>
                    <p class="description"><?= $movie[0]['description'] ?></p>
                </div>


            </div>
        </div>
    </div>


    <div class="comments">
        <div class="list-group" style="
 
    width: 70%;
    margin: auto;
">
            <div style="
 
 display: flex;
 justify-content: space-between;
">
                <h2>Review</h2>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#myModal">
                    +
                </button>
            </div>

            <?php if ($comments === 0) { ?>
                <p class="list-group-item-text">No Review</p>
            <?php } else { ?>
                <?php foreach ($comments as $comment) { ?>
                    <div>
                        <h5 class="list-group-item-heading"><?= $comment['name'] ?></h5>
                        <p class="list-group-item-text"><?= $comment['comment'] ?></p>
                    </div>
                <?php } ?>
            <?php } ?>

            <div>
            </div>
        </div>

    </div>



    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>