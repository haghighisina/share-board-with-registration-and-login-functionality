<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/Css/Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= ROOT_URL;?>">Home</a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])):;?>
                    <a class="nav-link" href="<?= ROOT_URL;?>shares">Shares</a>
                    <?php endif;?>
                </li>
            </ul>
        </div>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <?php if (isset($_COOKIE['user_data']) && !empty($_COOKIE['user_data'])):;?>
            <a class="nav-link" style="margin-right: 10rem;color: black"><?= "Hello " . $_COOKIE['user_data'];?></a>
            <?php else:;?>
            <a class="nav-link" aria-current="page" href="<?= ROOT_URL;?>users/login">Login</a>
            <?php endif;?>
        </li>
    </ul>
</nav>
</body>
</html>
<div class="container">
    <?php require ($view);?>
</div>
