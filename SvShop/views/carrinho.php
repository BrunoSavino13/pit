<?php
session_start();

// Verifica se foi solicitado para excluir um item
if (isset($_GET['acao']) && $_GET['acao'] === 'excluir' && isset($_GET['indice'])) {
    $indice = intval($_GET['indice']);
    if (isset($_SESSION['carrinho'][$indice])) {
        // Remove o item do carrinho
        unset($_SESSION['carrinho'][$indice]);
        $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reorganiza os índices do array
    }
}

// Verifica se foi solicitado para limpar o carrinho
if (isset($_GET['acao']) && $_GET['acao'] === 'limpar') {
    unset($_SESSION['carrinho']); // Limpa todo o carrinho
}

// Adiciona ou atualiza os itens no carrinho
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idProduto']) && isset($_POST['tamanho'])) {
    $idProduto = $_POST['idProduto'];
    $tamanho = $_POST['tamanho'];
    $nomeProduto = $_POST['nomeProduto'];
    $precoProduto = $_POST['precoProduto'];

    // Verifica se o carrinho já existe
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Verifica se o item já está no carrinho
    $itemExistente = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['id'] == $idProduto && $item['tamanho'] == $tamanho) {
            $item['quantidade'] += 1; // Aumenta a quantidade
            $item['precoTotal'] = $item['preco'] * $item['quantidade']; // Atualiza o preço total
            $itemExistente = true;
            break;
        }
    }

    // Se o item não existir no carrinho, adiciona-o
    if (!$itemExistente) {
        $_SESSION['carrinho'][] = [
            'id' => $idProduto,
            'nome' => $nomeProduto,
            'preco' => $precoProduto,
            'tamanho' => $tamanho,
            'quantidade' => 1,
            'precoTotal' => $precoProduto
        ];
    }

    // Redireciona para a página do carrinho
    header("Location: carrinho.php");
    exit;
}

// Total do carrinho
$total = 0;
if (isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['precoTotal'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SV SHOP</title>
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="shortcut icon" href="../IMG/SV-removebg-preview.png">
</head>
<STyle>
    #RodaPeInicial{
    position: fixed;
    display: flex;
    justify-content: space-around;
    padding-left: 8%; padding-right: 8%;
    background-color: white;
    color: (0, rgba0, 0, 0.705);
    fill: (0, rgba0, 0, 0.705);
    width: 100%; height: 80px;
    align-items: center;
    font-size: 15px; font-weight: 100;
    cursor: pointer;
    z-index: 2;
    text-align: center;
    font-family: "Bebas Neue", sans-serif;
}


#RodaPeInicial a{
  color: black;
}



#RodaPeInicial div:hover{
    transition: 0.6s;
    -webkit-transform: scale(1.1);
   transform: scale(1.1);
}

#RodaPeInicial span:hover{
    fill: black;
    transition: 0.6s;
    -webkit-transform: scale(1.3);
   transform: scale(1.3);
         
  }



#RodaPeInicial img{
    margin-left: 17%; margin-right: 17%;
}
</STyle>
<body>
    
    <div class="hover14 column">
        <a href="../index.php"><figure><img src="../IMG/SV-removebg-preview.png" width="130px"></figure></a>
    </div>
    <header>
    
        <h1>Carrinho de Compras</h1>
    
        <ul class="cart-list">
            <?php if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
                <?php foreach ($_SESSION['carrinho'] as $indice => $item): ?>
                    <li class="cart-item">
                        <div class="item-details">
                            <span><?php echo htmlspecialchars($item['nome']); ?> <?php echo "x" . $item['quantidade']; ?></span><br>
                            <span>Tamanho: <?php echo htmlspecialchars($item['tamanho']); ?></span>
                        </div>
                        <span class="item-price">R$<?php echo number_format($item['precoTotal'], 2, ',', '.'); ?></span>
                        <!-- Botão para excluir o item -->
                        <button class="remove-item" onclick="window.location.href='carrinho.php?acao=excluir&indice=<?php echo $indice; ?>'">Excluir</button>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Seu carrinho está vazio.</p>
            <?php endif; ?>
        </ul>

        <?php if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
            <div class="total">
                <p>Total: R$<?php echo number_format($total, 2, ',', '.'); ?></p>
                <button id="finalizar-compra" onclick="finalizarCompra(<?php echo $total; ?>)">Finalizar Compra</button>
            </div>
        <?php endif; ?>

        <div class="actions">
            <button class="continue-shopping" onclick="window.location.href='shop.php'">Continuar Comprando</button>
            <button class="clear-cart" onclick="window.location.href='carrinho.php?acao=limpar'">Limpar Carrinho</button>
        </div>
    </header>

    <script>
        function finalizarCompra(total) {
            window.location.href = "forma_pagamento.php?total=" + total;
        }
    </script>
</body>
</html>
