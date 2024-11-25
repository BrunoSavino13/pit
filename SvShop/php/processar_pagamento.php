<?php
require('Conexao.php');
session_start(); // Iniciar a sessão para acessar o carrinho

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount']; // Definimos o valor vindo do formulário

    // Início da transação
    $pdo->beginTransaction();

    try {
        // Inserir a compra
        $stmt = $pdo->prepare("INSERT INTO compras (nome_cliente, email, endereco, cep, valor_total) VALUES (:nome_cliente, :email, :endereco, :cep, :valor_total)");
        $stmt->bindParam(':nome_cliente', $nome);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':endereco', $_POST['endereco']);
        $stmt->bindParam(':cep', $_POST['cep']);
        $stmt->bindParam(':valor_total', $amount);
        $stmt->execute();

        // Pega o ID da compra inserida
        $compra_id = $pdo->lastInsertId();

        // Verificar estoque antes de inserir os detalhes da compra
        foreach ($_SESSION['carrinho'] as $item) {
            // Verificar o estoque disponível da camisa
            $stmt_estoque = $pdo->prepare("SELECT quantidade FROM camisa WHERE idCamisa = :produto_id");
            $stmt_estoque->bindParam(':produto_id', $item['idCamisa']);
            $stmt_estoque->execute();
            $estoque = $stmt_estoque->fetchColumn();

            // Se o estoque for menor que a quantidade que o cliente deseja comprar
            if ($estoque < $item['quantidade']) {
                throw new Exception("Não há estoque suficiente para a camisa " . $item['nome']);
            }

            // Inserir os detalhes da compra
            $stmt = $pdo->prepare("INSERT INTO detalhes_compra (compra_id, produto_id, quantidade, preco) VALUES (:compra_id, :produto_id, :quantidade, :preco)");
            $stmt->bindParam(':compra_id', $compra_id);
            $stmt->bindParam(':produto_id', $item['idCamisa']);  // Substitua 'id' por 'idCamisa'
            $stmt->bindParam(':quantidade', $item['quantidade']);
            $stmt->bindParam(':preco', $item['preco']);
            $stmt->execute();

            // Atualizar o estoque da camisa
            $stmt_update = $pdo->prepare("UPDATE camisa SET quantidade = quantidade - :quantidade WHERE idCamisa = :produto_id");
            $stmt_update->bindParam(':quantidade', $item['quantidade']);
            $stmt_update->bindParam(':produto_id', $item['idCamisa']);  // Usar 'idCamisa' corretamente
            $stmt_update->execute();
        }

        // Confirmar a transação
        $pdo->commit();

        // Limpar o carrinho após o pagamento
        unset($_SESSION['carrinho']);

        // Retorno ao usuário
        echo "Pagamento processado com sucesso!<br>";
        echo "Nome: $nome<br>";
        echo "Valor: R$" . number_format($amount, 2, ',', '.') . "<br>";

        echo "<a href='../index.php'>Voltar ao site</a>";
    } catch (Exception $e) {
        // Se ocorrer algum erro, desfaz a transação
        $pdo->rollBack();
        echo "Erro ao processar o pagamento: " . $e->getMessage() . "<br>";
        echo "<a href='../index.php'>Voltar ao site</a>";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
