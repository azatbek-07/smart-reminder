<?php
session_start();

if (isset($_SESSION["registered"]) && $_SESSION["registered"] === true) {
    header("Location: ./index.php");
    exit;
}

$userName = "Azatbek";
$userPassword = "Azatbek2007";
?>


<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/login.css">
</head>

<body>

    <div class="container">

        <h1>Xush kelibsiz</h1>
        <p class="subtitle">Hisobingizga kiring</p>

        <form method="post">

            <div class="input-group">
                <input type="text" name="ism" placeholder="Ismingizni kiriting...">
            </div>

            <div class="input-group">
                <input type="password" name="parol" placeholder="Parolingizni kiriting...">
            </div>

            <button type="submit">Kirish</button>

        </form>

        <div class="footer">
            Hisobingiz yo‘qmi?
            <a href="#">Ro‘yxatdan o‘tish</a>
        </div>

    </div>

</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["ism"])) {
        echo "<p style='color: red;'>Ismingizni kiriting!</p>";
        exit;
    }
    if (empty($_POST["parol"])) {
        echo "<p style='color: red;'>Parolingizni kiriting!</p>";
        exit;
    }

    $ism = $_POST["ism"];
    $parol = $_POST["parol"];

    if ($userName !== $ism) {
        echo "<p style='color: red;'>Ismingiz noto'g'ri!</p>";
        exit;
    }

    if ($userPassword !== $parol) {
        echo "<p style='color: red;'>Parolingiz noto'g'ri!</p>";
        exit;
    }

    $_SESSION["registered"] = true;
    $_SESSION["ism"] = $userName;
    header("Location: ./index.php");
    exit;
}



?>