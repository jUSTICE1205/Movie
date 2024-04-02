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
            <a href="#" class="brand">Brand</a>
            <div class="search">
                <form class="search-form">
                    <input type="text" name="search" class="search-input" placeholder="Search for Destinations"
                        autofocus>
                    <button type="submit" class="search-submit" disabled><i class="bx bx-search"></i></button>
                </form>
            </div>
            <div class="menu" id="menu">
                <ul class="menu-inner">
                    <li class="menu-item"><a href="#" class="menu-link">Contact</a></li>
                    <li class="menu-item"><a href="#" class="menu-link">About</a></li>
                    <li class="menu-item"><a href="login.php" class="menu-link">Sign In</a></li>
                </ul>
            </div>
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
        </nav>
    </header>

    <script src="./js/nav.js"></script>
</body>

</html>