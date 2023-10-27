<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$login = $_SESSION['login'];

// Проверяем наличие файла admin.txt у пользователя
$adminFile = "users/$login/admin.txt";
if (!file_exists($adminFile)) {
    header("Location: access_denied.php");
    exit();
}

// Выдача голды пользователю
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['amount'])) {
    $username = $_POST['username'];
    $amount = $_POST['amount'];

    // Путь к файлу с голдой пользователя
    $goldFile = "users/$username/gold.txt";

    // Проверяем, существует ли файл с голдой пользователя
    if (file_exists($goldFile)) {
        // Получаем текущий баланс пользователя
        $balance = intval(file_get_contents($goldFile));

        // Увеличиваем баланс на указанную сумму
        $balance += $amount;

        // Обновляем баланс в файле gold.txt
        file_put_contents($goldFile, $balance);

        echo "Голда успешно выдана пользователю $username.";
    } else {
        echo "Ошибка: Файл с голдой пользователя $username не найден.";
    }
}

// Выдача бана пользователю
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['ban'])) {
    $username = $_POST['username'];

    // Путь к файлу с баном пользователя
    $banFile = "users/$username/ban.txt";

    // Обновляем файл с баном, устанавливая значение равным 1
    file_put_contents($banFile, '1');

    echo "Пользователь $username забанен.";
}

// Разбан пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['unban'])) {
    $username = $_POST['username'];

    // Путь к файлу с баном пользователя
    $banFile = "users/$username/ban.txt";

    // Обновляем файл с баном, устанавливая значение равным 0
    file_put_contents($banFile, '0');

    echo "Пользователь $username разбанен.";
}

// mute пользователю
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['mute'])) {
    $username = $_POST['username'];

    // Путь к файлу с баном пользователя
    $muteFile = "users/$username/mute.txt";

    // Обновляем файл с баном, устанавливая значение равным 1
    file_put_contents($muteFile, '1');

    echo "Пользователь $username muted.";
}

// unmute пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['unmute'])) {
    $username = $_POST['username'];

    // Путь к файлу с баном пользователя
    $muteFile = "users/$username/mute.txt";

    // Обновляем файл с баном, устанавливая значение равным 0
    file_put_contents($muteFile, '0');

    echo "Пользователь $username разбанен.";
}

// Добавление новости
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news'])) {
    $newsContent = $_POST['news'];

    // Директория для хранения новостей
    $newsDir = "news";

    // Генерация уникального имени файла на основе текущего времени
    $fileName = uniqid() . ".txt";

    // Путь к файлу новости
    $newsFile = $newsDir . "/" . $fileName;

    // Создание директории, если она не существует
    if (!is_dir($newsDir)) {
        mkdir($newsDir);
    }

    // Сохранение контента новости в файле
    file_put_contents($newsFile, $newsContent);

    echo "Новость успешно добавлена.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Админ панель</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 120px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
        <h1>Админ панель</h1>
        <p>Привет, <?php echo $login; ?>!</p>

        <h2>Накрутить голду</h2>
        <form action="admin.php" method="POST">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <label for="amount">Сумма:</label>
            <input type="number" id="amount" name="amount" min="1" required>
            <input type="submit" value="Накрутить голду">
        </form>

        <h2>Выдать бан</h2>
        <form action="admin.php" method="POST">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <input type="hidden" name="ban" value="1">
            <input type="submit" value="Выдать бан">
        </form>

        <h2>Разбанить пользователя</h2>
        <form action="admin.php" method="POST">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <input type="hidden" name="unban" value="1">
            <input type="submit" value="Разбанить пользователя">
        </form>
        
        <h2>mute user</h2>
        <form action="admin.php" method="POST">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <input type="hidden" name="mute" value="1">
            <input type="submit" value="mute">
        </form>

        <h2>unmute пользователя</h2>
        <form action="admin.php" method="POST">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>
            <input type="hidden" name="unmute" value="1">
            <input type="submit" value="unmute user">
        </form>

        <h2>Добавить новость</h2>
        <form action="admin.php" method="POST">
            <label for="news">Текст новости:</label>
            <textarea id="news" name="news" required></textarea>
            <input type="submit" value="Добавить новость">
        </form>
    </div>
</body>
</html>

   