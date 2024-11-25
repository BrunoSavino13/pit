<?php
// Incluir conexão com o banco de dados
require_once('Conexao.php');

// Verifica se os dados foram enviados via POST
if (isset($_POST['username']) && isset($_POST['senha'])) {

    // Limpar e proteger os dados
    $username = $mysqli->real_escape_string($_POST['username']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    // Realizar a consulta para verificar as credenciais
    $sql = "SELECT * FROM cliente WHERE username = '$username' AND senha = '$senha'";
    $result = $mysqli->query($sql);

    // Verificar se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Credenciais corretas - iniciar sessão
        $usuario = $result->fetch_assoc();
        
        // Iniciar sessão se não estiver iniciada
        if (!isset($_SESSION)) {
            session_start();
        }

        // Definir variáveis de sessão
        $_SESSION['idCliente'] = $usuario['idCliente'];
        $_SESSION['username'] = $usuario['username'];

        // Redirecionar para a página inicial (index.php)
        header("Location: ../index.php");
        exit();
    } else {
        // Credenciais incorretas
        echo "Username ou senha incorretos!";
    }
} else {
    echo "Por favor, preencha ambos os campos!";
}
?>
