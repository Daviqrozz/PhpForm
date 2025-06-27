<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: form.php');
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>✅ Bem-vindo, <?php echo $username; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
