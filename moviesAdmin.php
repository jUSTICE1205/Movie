<?php

include "dbConnect.php";
include "query.php";

$movies = get_all_movies($db)

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo"><i
                        class="fas fa-anchor"></i> <span>Admin</span></a></header>
            <nav class="dashboard-nav-list"><a href="moviesAdmin.php" class="dashboard-nav-item active"><i
                        class="fas fa-home"></i>
                    Movies </a><a href="#" class="dashboard-nav-item "><i class="fas fa-tachometer-alt"></i>
                    Actor
                </a><a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Genre </a>


                <a href="commentAdmin.php" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Comments </a>
                <a href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <div class='dashboard-content'>
                <div class="container table-responsive py-5">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($movies as $movie) { ?>
                                <tr>
                                    <td><?= $movie['name'] ?> </td>
                                    <td><?= $movie['description'] ?></td>
                                    <td>
                                        <div class="delete">
                                            <form action="displayComment.php" method="post">
                                                <input type="text" name="id" id="id" value=<?= $movie['id'] ?> hidden />
                                                <button type="submit">Edit</button>
                                            </form>
                                            <form action="./deleteComment.php" method="post">
                                                <input type="text" name="id" id="id" value=<?= $movie['id'] ?> hidden />
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>