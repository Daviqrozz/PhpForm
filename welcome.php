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
    <div>
        <ul><button>Configurações da conta</button>
            <li>
                <button>Excluir conta</button>
                
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>

    </div>
</body>

</html>