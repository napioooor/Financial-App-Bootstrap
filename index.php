<?php
    session_start();

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        header('Location: user_menu.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najlepsza aplikacja finansowa - dodaj wydatek</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container bg-light text-dark d-flex flex-column align-items-center w-50 my-5 py-5 rounded-lg">
        <h1 class="my-4">Witaj w najlepszej aplikacji finansowej!</h1>
        <form action="log_in.php" class="mt-3" method="post">
            <div class="form-group">
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp" required placeholder="E-mail">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" required minlength="3" maxlength="18"
                    placeholder="Has&lstrok;o">
            </div>
            <button type="login" class="btn btn-dark">Zaloguj</button>
            <p class="my-3">
                <a href="register.php">Nie masz konta? Za&lstrok;&oacute;&zdot; nowe.</a>
            </p>
        </form>
        <?php
            if(isset($_SESSION['error'])) echo $_SESSION['error'];
        ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>