<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: main.php");
    exit();
}

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login) && !empty($password)) {
    $auth = 'log';
    $on = file_exists("userspas/$login");

    if (!$on) {
        $auth = 'reg';
    }

    if ($auth == "reg") {
        $password2 = ($password);
        $password2 = ($password2);
        mkdir("userspas/$login/");
        mkdir("users/$login/");
        // Создайте остальные директории и файлы, если необходимо

        file_put_contents("userspas/$login/password.txt", $password2);
        file_put_contents("users/$login/sword", "1");
        file_put_contents("users/$login/gold.txt", "0");
        file_put_contents("users/$login/silver.txt", "0");
        file_put_contents("id.txt", file_get_contents("id.txt") + 1);
        file_put_contents("users/$login/id.txt", file_get_contents("id.txt"));
        file_put_contents("users/$login/ban.txt", 0);
        file_put_contents("users/$login/exp.txt", 1);
        file_put_contents("users/$login/prime.txt", 0);
        file_put_contents("users/$login/pass.txt", 0);
        file_put_contents("users/$login/mmr.txt", 0);
        file_put_contents("users/$login/butt.txt", 0);
        file_put_contents("users/$login/keys.txt", 0);
        file_put_contents("users/$login/gpass.txt", 0);
        file_put_contents("users/$login/mute.txt", 0);
        // Запись остальных файлов, если необходимо

        $_SESSION['login'] = $login;
        header("Location: main.php");
        exit();
    } else {
        $password3 = file_get_contents("userspas/$login/password.txt");

        $passwordto = ($password);
        $passwordto = ($passwordto);

        if ($passwordto == $password3) {
            $_SESSION['login'] = $login;
            header("Location: main.php");
            exit();
        } else {
            echo "Вы ввели неверный пароль, попробуйте еще раз";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход и регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 100px;
        }
        
        .container h1 {
            text-align: center;
        }
        
        .container form label {
            display: block;
            margin-bottom: 10px;
        }
        
        .container form input[type="text"],
        .container form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .container form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .container form input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .container p {
            text-align: center;
        }
        
        .container p a {
            color: #0645AD;
        }
        
        @media only screen and (max-width: 480px) {
            .container {
                max-width: 300px;
                margin-top: 50px;
                padding: 10px;
            }
            
            .container form input[type="submit"] {
                padding: 8px 16px;
            }
        }

        @media screen and (max-width: 480px) {
            .container {
                padding: 10px;
                margin-top: 30px;
            }
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1>Вход и регистрация</h1>
        <form action="index.php" method="POST">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Войти">
        </form>
    </div>
</body>
</html>
