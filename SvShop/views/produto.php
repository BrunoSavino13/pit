<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SvShop®</title>
    <link rel="stylesheet" href="../css/produto.css">
    <link rel="shortcut icon" href="../IMG/LogoBranca.png">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-image: url(IMG/fb99f76b674f232e2e72aea95ae92065.png);
        background-repeat: no-repeat;
        background-size: 100%;
    }

    h1 {
        color: #333;
        text-align: center; /* Centraliza o título */
        font-size: 2rem;
        margin-top: 50px; /* Ajusta o espaço superior */
        margin-bottom: 30px; /* Ajusta o espaço inferior */
    }

    form {
        max-width: 600px;
        margin: 0 auto; /* Centraliza o formulário */
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input, textarea, button {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .foto1 {
        width: 100%;
    }
</style>

<body>
<div class="hover14 column">
        <a href="../index.php"><figure><img src="../IMG/SV-removebg-preview.png" width="130px"></figure></a>
    </div>
    <h1>Adicionar Novo Produto</h1>
    <?php require ("../php/Conexao.php"); ?>
    <form action="../php/novo_produto.php" method="POST" id="add-product-form" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required>

        <label for="sexo">Sexo (F ou M):</label>
        <input type="text" id="sexo" name="sexo" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>

        <label for="foto_frente">Foto frente da camisa:</label>
        <input type="file" id="foto_frente" name="foto_frente" accept="image/*" required>

        <label for="foto_verso">Foto verso da camisa:</label>
        <input type="file" id="foto_verso" name="foto_verso" accept="image/*" required>

        <button type="submit">Adicionar Produto</button>
    </form>
</body>
</html>
