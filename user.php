<?php
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

    public function checkPasswordEspecialChar() :bool
    {
        $userpassword = $this->password;
        $regex = "/[!@#$%^&*()_+\-= \[\]{};':\",.<>\/?|`~]/";

        if (preg_match($regex, $userpassword)) {
            return True;
        } else {
            return False;
        }
    }

    public function checkPassword() :bool
    {
        if ($this->checkPasswordLen() && $this->checkPasswordEspecialChar()) {
            return $this->getUser();
        } else {
            return 'Senha invalida';
        }
    }
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$usermail = filter_input(INPUT_POST, 'usermail', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);


if ($username && $usermail && $password) {
    $user = new User($username, $usermail, $password);

    if ($user->checkPassword()) {
        $_SESSION['username'] = $user->getUser(); 
        header("Location: welcome.php");        
        exit;
    } else {
        echo "❌ Senha inválida.";
    }
} else {
    echo "❌ Dados invalidos.";
}