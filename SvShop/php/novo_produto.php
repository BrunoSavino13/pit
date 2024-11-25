<?php
require("Conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $sexo = $_POST["sexo"];
    $quantidade = $_POST["quantidade"];  // Adicionando o campo quantidade
    
    // Verificar e tratar os uploads das imagens
    $foto_frente = $_FILES['foto_frente'];
    $foto_verso = $_FILES['foto_verso'];

    // Definir diretório de upload
    $upload_dir = '../uploads/';
    
    // Gerar um nome único para as imagens
    $foto_frente_nome = uniqid() . '-' . basename($foto_frente['name']);
    $foto_verso_nome = uniqid() . '-' . basename($foto_verso['name']);
    
    // Caminho completo para salvar as imagens
    $foto_frente_caminho = $upload_dir . $foto_frente_nome;
    $foto_verso_caminho = $upload_dir . $foto_verso_nome;
    
    // Verificar se os arquivos são imagens e fazer o upload
    if (move_uploaded_file($foto_frente['tmp_name'], $foto_frente_caminho) && move_uploaded_file($foto_verso['tmp_name'], $foto_verso_caminho)) {
        // Inserir os dados no banco de dados, incluindo a quantidade
        $sql = "INSERT INTO camisa (nome, descricao, preco, sexo, quantidade, foto_frente, foto_verso) 
                VALUES (:nome, :descricao, :preco, :sexo, :quantidade, :foto_frente, :foto_verso)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);  // Vinculando a quantidade
        $stmt->bindParam(':foto_frente', $foto_frente_nome, PDO::PARAM_STR);
        $stmt->bindParam(':foto_verso', $foto_verso_nome, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Produto inserido com sucesso!<br><a href='../views/shop.php'>Voltar ao site</a>";
        } else {
            echo "Erro ao inserir o produto no banco de dados.";
        }
    } else {
        echo "Erro ao fazer o upload das imagens.";
    }
} else {
    echo "Requisição inválida.";
}
?>
