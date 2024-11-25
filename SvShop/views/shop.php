<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SvShop®</title>
    <link rel="shortcut icon" href="../IMG/LogoBranca.png">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

    * {
        margin: 0;
        box-sizing: border-box;
        text-decoration: none;
        text-transform: uppercase;
        font-family: 'Bebas Neue', sans-serif;  /* Aplicando Bebas Neue para toda a página */
    }

    body {
        font-family: 'Bebas Neue', sans-serif; /* Certificando que toda a página tenha Bebas Neue */
    }

    #RodaPeInicial {
        position: fixed;
        display: flex;
        justify-content: space-around;
        padding-left: 8%;
        padding-right: 8%;
        background-color: white;
        color: rgba(0, 0, 0, 0.705);
        fill: rgba(0, 0, 0, 0.705);
        width: 100%;
        height: 80px;
        align-items: center;
        font-size: 15px;
        font-weight: 100;
        cursor: pointer;
        z-index: 2;
        text-align: center;
        font-family: "Bebas Neue", sans-serif;
    }

    #RodaPeInicial a {
        color: black;
    }

    #RodaPeInicial div:hover {
        transition: 0.6s;
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    #RodaPeInicial span:hover {
        fill: black;
        transition: 0.6s;
        -webkit-transform: scale(1.3);
        transform: scale(1.3);
    }

    #RodaPeInicial img {
        margin-left: 17%;
        margin-right: 17%;
    }

    /* Dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        background-color: white;
        color: black;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        font-family: "Bebas Neue", sans-serif;  /* Fonte Bebas Neue aplicada ao botão do menu */
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        font-family: "Bebas Neue", sans-serif; /* Garantindo que a fonte do menu dropdown seja Bebas Neue */
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #555;
    }

    /* GRID para exibição dinâmica dos produtos */
    #GRIDProd {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Definindo 4 colunas de tamanho igual */
        gap: 20px; /* Espaçamento entre as camisas */
        padding: 4% 10%; /* Margem nas laterais */
    }

    /* Para telas menores, ajustamos o número de colunas */
    @media (max-width: 1200px) {
        #GRIDProd {
            grid-template-columns: repeat(3, 1fr); /* 3 colunas em telas menores */
        }
    }

    @media (max-width: 900px) {
        #GRIDProd {
            grid-template-columns: repeat(2, 1fr); /* 2 colunas em telas ainda menores */
        }
    }

    @media (max-width: 600px) {
        #GRIDProd {
            grid-template-columns: 1fr; /* 1 coluna em telas pequenas */
        }
    }

    /* Classe para os produtos dinâmicos */
    .produto {
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        padding-top: 20%;
        font-weight: 100;
        font-size: 18px;
        height: 350px; /* Ajuste a altura conforme necessário */
        transition: background-image 0.6s;
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }

    .produto img {
        width: 100%;
        height: 200px; /* Ajusta a altura da imagem */
        object-fit: cover; /* Para garantir que a imagem cubra bem o espaço */
        border-bottom: 2px solid #ddd; /* Para dar um pequeno destaque à imagem */
    }

    .produto:hover {
        background-image: url('../IMG/hover-image.jpg'); /* Exemplo de imagem ao passar o mouse */
    }

    #I2 {
        font-size: 20px;
        color: #444;
    }

    /* Modo escuro */
    body.dark-mode {
        background-color: #050a30;
        color: #fff;
    }

    body.dark-mode #RodaPeInicial {
        background-color: #050a30;
        color: rgba(255, 255, 255, 0.705);
        fill: rgba(255, 255, 255, 0.705);
    }

    body.dark-mode .produto {
        background-color: #050a30;
        color: #ddd;
    }

    body.dark-mode .produto:hover {
        color: #fff;
    }

    body.dark-mode a {
        color: white;
    }
</style>
<body>
    
<section id="RodaPeInicial">
    <div class="hover14 column" id="ii"><a href="../index.php"><figure><img src="../IMG/SV-removebg-preview.png" width="130px"></figure></a></div>
    <div><a href="shop.php" id="teste">SHOP</a></div>
    <div><a href="contato.html">CONTATO</a></div>
    <div class="dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
            <a href="https://www.instagram.com/_.svshop/">Instagram</a>
            <a href="sobre.html">Sobre Nós</a>
            <a href="politica.html">Politica De Troca</a>
            <a href="produto.php">Novo Produto</a>
        </div>
    </div>
    <div><a href="carrinho.php"><span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></span></a></div>
</section>

<section id="GRIDProd">
    <?php
    // Conectar ao banco de dados
    require ("../php/Conexao.php");

    // Buscar todas as camisas com estoque maior que 0
    $sql = "SELECT * FROM camisa WHERE quantidade > 0";  // Filtro para mostrar apenas camisas com estoque disponível
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        // Exibir os resultados
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="produto">';
            echo '<a href="detalhe_produto.php?id=' . htmlspecialchars($row['idCamisa']) . '">'; // Link para a página de detalhes
            echo '<img src="../uploads/' . htmlspecialchars($row['foto_frente']) . '" alt="Foto frente" width="200px">';
            echo '<section>' . htmlspecialchars($row['nome']) . '</section>';
            echo '<section id="I2">R$ ' . htmlspecialchars($row['preco']) . '</section>';
            echo '</a>'; // Fechamento do link
            echo '</div>';
        }
    } else {
        echo '<p>Nenhuma camisa disponível no momento.</p>';
    }
    ?>
</section>

<script>
    const themeToggle = document.getElementById('Tema');
    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
</script>

</body>
</html>
