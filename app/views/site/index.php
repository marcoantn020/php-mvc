<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/assets/css/style.css">

    <title><?=$title?></title>
</head>
<body>
    
    <div class="container">

        <section id="welcome">
            <ul id="nav">
                <li> <a href="/"> HOME </a> </li>
                <li> <a href="/signup"> SignUp </a> </li>
                <li> <a href="/login"> Login </a> </li>
            </ul>

            <div>
                <?php echo welcome('user'); ?>
            </div>
        </section>



        <?php require VIEW_PATH . $this->controller->view; ?>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>