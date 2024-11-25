<?php
include('Conexao.php'); // Inclui a conexão com o banco de dados

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Cria um hash da senha

    // Verifica se o usuário já existe
    $sql_check = "SELECT * FROM cliente WHERE username = '$username' OR email = '$email'";
    $result_check = $mysqli->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Usuário ou e-mail já existe!";
    } else {
        // Insere o novo usuário no banco de dados
        $sql_insert = "INSERT INTO cliente (username, email, senha) VALUES ('$username', '$email', '$senha')";
        if ($mysqli->query($sql_insert)) {
            echo "Registro realizado com sucesso!";
        } else {
            echo "Erro ao registrar: " . $mysqli->error;
        }
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
