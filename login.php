<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Movie Store</title>
</head>

<body>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <h2 class="card-title text-center">Login</a>
                        </h2>

                        <div class="card-body py-md-4">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET['error']; ?>
                                </div>
                            <?php } ?>

                            <form _lpchecked="1" method="POST" action="./auth.php">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email">
                                </div>


                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="d-flex flex-row align-items-center justify-content-between"
                                    style="margin-top: 2.5rem">
                                    <button class="btn btn-primary" style="
    background-color: #0d6efd;
    border: 2px solid #0d6efd;
">Create Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="./js/nav.js"></script>
</body>

</html>