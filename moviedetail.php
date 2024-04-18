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
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#mModal">
                        +
                    </button>




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
                    <h4 class="modal-title">Add Review</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="http://localhost:81/movie/addComment.php/?id=<?= $_GET['id'] ?>" method="post">
                        <!-- Email input -->
                        <?php if (!isset($_SESSION['user_email'])) { ?>
                            <div data-mdb-input-init class="form-outline mb-4">

                                <label class="form-label" for="name">Name</label>
                                <input type="name" id="name" name="name" class="form-control" required />
                            </div>
                        <?php } else { ?>
                            <input type="email" id="name" name="name" class="form-control" value=<?= $_SESSION['user_email'] ?> hidden />
                        <?php } ?>

                        <input type="text" id="movie" name="movie" class="form-control" value=<?= $_GET['id'] ?>
                            hidden />
                        <!-- password input -->
                        <div data-mdb-input-init class="form-outline mb-4">

                            <label class="form-label" for="comment">Comment</label>
                            <textarea type="password" id="comment" name="comment" class="form-control"
                                required></textarea>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-block">Add</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="mModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Movie Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body p-4" id="movieTableContainer"></div>


            </div>
        </div>
    </div>




</body>


<script>
    const apiKey = '45362a84'; // Replace 'YOUR_API_KEY' with your actual API key
    const title = 'John Wick'; // Movie title

    fetch(`https://www.omdbapi.com/?t=${encodeURIComponent(title)}&apikey=${apiKey}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Handle the JSON response
            console.log(data); // Log the movie data to the console

            // Extract the desired properties
            const { Actors, Director, Title, Country, Year, imdbRating
            } = data;

            // Create a table element
            const table = document.createElement('table');

            // Create table rows for each property
            createRow('Actor', Actors);
            createRow('Director', Director);
            createRow('Title', Title);
            createRow('Country', Country);
            createRow('Year', Year);
            createRow('imdbRating', imdbRating);
            // Function to create a table row
            function createRow(label, value) {
                const row = table.insertRow();
                const cell1 = row.insertCell(0);
                const cell2 = row.insertCell(1);
                cell1.textContent = label;
                cell2.textContent = value;
            }

            // Append the table to the container element
            const container = document.getElementById('movieTableContainer');
            container.appendChild(table);
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle errors
        });
</script>

</html>