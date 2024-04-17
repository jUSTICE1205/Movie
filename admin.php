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
            <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item"><i class="fas fa-home"></i>
                    Movies </a><a href="#" class="dashboard-nav-item active"><i class="fas fa-tachometer-alt"></i>
                    Actor
                </a><a href="#" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Genre </a>


                <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Comments </a>
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
                                <th scope="col">Comment</th>
                                <th scope="col">Movie_id</th>
                                <th scope="col">Visible</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Clavan</th>
                                <td>Good </td>
                                <td>Movie</td>
                                <td>1</td>
                                <td>
                                    <div class="delete">
                                        <form>
                                            <button type="submit">Visible</button>
                                        </form>
                                        <form>
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>