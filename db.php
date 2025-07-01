<?php
$host = '127.0.0.1';
$user = 'master';
$password = '1234';
$dbname = 'formdb';
$port = 3306;

$conn = new mysqli($host,$user,$password,$dbname,$port);

if ($conn->connect_error){
       die("❌ Conexão falhou: " . $conn->connect_error);
} else {
    echo "✅ Conexão bem-sucedida!";
}

$sql = 'CREATE TABLE IF NOT EXISTS users(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
usermail VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL
)';

if ($conn->query($sql) === TRUE ){
    echo 'Tabela criada com sucesso!';
}else{
    echo 'Erro ao criar tabela: '.$conn->error;
}



