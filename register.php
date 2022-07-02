<?php
    session_start();

    if(isset($_POST['email'])){
        $everything_fine = true;

        $nick = $_POST['nick'];

        if(strlen($nick) < 3 || strlen($nick) > 20){
            $everything_fine = false;
            $_SESSION['e_nick'] = "Login powinnien posiadać od 3 do 20 znaków!";
        }

        if(ctype_alnum($nick) == false){
            $everything_fine = false;
            $_SESSION['e_nick'] = "Login może składać się tylko z liter i cyfr (bez polskich znaków)";
        }

        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if(filter_var($emailB, FILTER_SANITIZE_EMAIL) == false || ($emailB != $email)){
            $everything_fine = false;
            $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
        }

        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if(strlen($password1) < 8 || strlen($password1) > 20){
            $everything_fine = false;
            $_SESSION['e_password'] = "Hasło musi posiadać od 8 do 20 znaków!";
        }

        if($password1 != $password2){
            $everything_fine = false;
            $_SESSION['e_password'] = "Podane hasła nie są identyczne!";
        }

        $password_hash = password_hash($password1, PASSWORD_DEFAULT);

        $secret = "6LcN00sgAAAAAO-yidm-R9Zpevi_DsbfICeTLme7";
        $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $answer = json_decode($check);

        if($answer -> success == false){
            $everything_fine = false;
            $_SESSION['e_bot'] = "Potwierdź, że nie jesteś botem!";
        }

        $_SESSION['fr_nick'] = $nick;
        $_SESSION['fr_email'] = $email;
        $_SESSION['fr_password1'] = $password1;
        $_SESSION['fr_password2'] = $password2;

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection -> connect_errno != 0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                $result = $connection -> query("SELECT id FROM users WHERE email='$email'");
                if(!$result) throw new Exception($connection -> error);
                
                $number_emails = $result -> num_rows;
                if($number_emails > 0){
                    $everything_fine = false;
                    $_SESSION['e_email'] = "Istnieje konto przypisane do tego adresu e-mail!";
                }
                
                if($everything_fine == true){
                    if($connection -> query("INSERT INTO users VALUES (NULL, '$nick', '$email', '$password_hash')")){
                        $_SESSION['success'] = true;
                        header('Location: welcome.php');
                    } else throw new Exception($connection -> error);
                }

                $connection -> close();
            }
        } catch(Exception $e){
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności!</span>';
            echo '<br>Informacja dev: '.$e;
        }
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
        <form class="mt-3" method="post">
            <h2>Podaj dane u&zdot;ytkownika:</h2>
            <div class="my-4">
                <table>
                    <tbody>
                        <tr>
                            <td><label for="nick">Twój login: </label></td>
                            <td><input name="nick" type="text" class="form-control" id="nick" minlength="3" maxlength="20" required
                                    value="<?php
                                if(isset($_SESSION["fr_nick"])){
                                    echo $_SESSION["fr_nick"];
                                    unset($_SESSION["fr_nick"]);
                                }?>"></td>
                        </tr>
                        <?php
                            if(isset($_SESSION['e_nick'])){
                            echo '<div class = "error">'.$_SESSION['e_nick'].'</div>';
                            unset($_SESSION['e_nick']);
                            }
                        ?>
                        <tr>
                            <td><label for="email">E-mail: </label></td>
                            <td><input name="email" type="email" class="form-control" id="email" required value="<?php
                                if(isset($_SESSION["fr_email"])){
                                    echo $_SESSION["fr_email"];
                                    unset($_SESSION["fr_email"]);
                                }
                            ?>"></td>
                        </tr>
                        <?php
                            if(isset($_SESSION['e_email'])){
                            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                            }
                        ?>
                        <tr>
                            <td><label for="password">Has&lstrok;o: </label></td>
                            <td><input name="password1" type="password" class="form-control" id="password" minlength="3" maxlength="18"
                                    required value="<?php
                                if(isset($_SESSION["fr_password1"])){
                                    echo $_SESSION["fr_password1"];
                                    unset($_SESSION["fr_password1"]);
                                }
                            ?>"></td>
                        </tr>
                        <?php
                            if(isset($_SESSION['e_password'])){
                                echo '<div class = "error">'.$_SESSION['e_password'].'</div>';
                                unset($_SESSION['e_password']);
                            }
                        ?>
                        <tr>
                            <td><label for="passwordR">Powt&oacute;&zdot; has&lstrok;o: </label></td>
                            <td><input name="password2" type="password" class="form-control" id="passwordR" minlength="3" maxlength="18"
                                    required autocomplete="new-password" value="<?php
                                    if(isset($_SESSION["fr_password2"])){
                                        echo $_SESSION["fr_password2"];
                                        unset($_SESSION["fr_password2"]);
                                    }
                                ?>"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="g-recaptcha" data-sitekey="6LcN00sgAAAAAG_2dei5DmvZSIsWGi4nUwL11jhB">
                <?php
                    if(isset($_SESSION['e_bot'])){
                        echo '<div class = "error">'.$_SESSION['e_bot'].'</div>';
                        unset($_SESSION['e_bot']);
                    }
                ?>
            </div>

            <button type="login" class="btn btn-dark">Za&lstrok;&oacute;&zdot; konto</button>
            <p class="my-3">
                <a href="index.php">Masz konto? Zaloguj si&eogon;.</a>
            </p>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>

</html>