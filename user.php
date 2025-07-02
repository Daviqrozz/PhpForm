<?php
require 'db.php';
session_start();

class User
{
    private string $usermail;
    private string $username;
    private string $password;

    public function __construct($username, $usermail, $password)
    {
        $this->usermail = $usermail;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUser()
    {
        return $this->username;
    }

    public function checkPasswordLen(): bool
    {
        return strlen($this->password) >= 8;
    }

    public function checkPasswordEspecialChar(): bool
    {
        $regex = "/[!@#$%^&*()_+\-=\[\]{};':\",.<>\/?|`~]/";
        return preg_match($regex, $this->password) === 1;
    }

    public function checkPassword(): bool
    {
        return $this->checkPasswordLen() && $this->checkPasswordEspecialChar();
    }

    public function getHashedPassword()
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usermail = filter_input(INPUT_POST, 'usermail', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

if ($username && $usermail && $password) {
    $user = new User($username, $usermail, $password);

    if ($user->checkPassword()) {
        $hashedPassword = $user->getHashedPassword();

        $query = 'INSERT INTO users (username, usermail, password) VALUES (?, ?, ?)';
        $create = $conn->prepare($query);

        if ($create === false) {
            die("❌ Erro na preparação da query: " . $conn->error);
        }

        $create->bind_param('sss', $username, $usermail, $hashedPassword);
        $create->execute();

        $_SESSION['username'] = $user->getUser();
        header("Location: welcome.php");
        exit;
    } else {
        echo "❌ Senha inválida.";
    }
} else {
    echo "❌ Dados inválidos.";
}
