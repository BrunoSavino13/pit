<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SV SHOP</title>
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="shortcut icon" href="IMG/LogoBranca.png">
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

        #RodaPeInicial{
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

        #Quad{
            position: absolute;
            z-index: 1;
            margin-top: 80px;
            width: 100%;
            height: 929px;
            padding: auto;
            background-color: black;
            background-image: url('img/suf.webp.');
            background-size: 100%;
            background-position: top;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: rgba(0, 0, 0, 0.5);
            background-blend-mode: multiply;
            text-align: center;
            padding-top: 16%;
        }

        #newdrop{
            font-family: "Bebas Neue", sans-serif;
            color: white;
            font-weight: 700;
            font-size: 170px;
        }

        #PRODUTOS{
            position: relative;
            z-index: -100;
            background-color: white;
            width: 100%;
            height: 1070px;
        }

        #Fotos{
            display: grid;
            grid-template-columns: 33% 34% 33%;
            width: 100%;
            height: 920px;
            padding-left: 5%;
            padding-right: 5%;
            align-items: end;
            margin-bottom: 70px;
        }

        #Fotos img{
            -webkit-filter: grayscale(100%) blur(1px);
            filter: grayscale(100%) blur(1px);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        #Fotos img:hover {
            -webkit-filter: grayscale(0) blur(0);
            filter: grayscale(0) blur(0);
        }

        #QuadPreto {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding-left: 8%; 
            padding-right: 8%;
            width: 100%;
            height: 300px;
            background-color: black;
        }

        #QuadPreto a {
            color: white;
            font-size: 15px;
            text-align: center;
        }

        #QuadPreto img {
            filter: invert(100%);
        }

        #Fotos, #QuadPreto, #RodaPeInicial {
            transition: background-color 0.3s, color 0.3s;
        }
    </style>
</head>
<body>
<section id="RodaPeInicial">
    <div class="hover14 column" id="ii"><a href="index.html"><figure><img src="IMG/SV-removebg-preview.png" width="130px"></figure></a></div>
    <div><a href="views/shop.php" id="teste">SHOP</a></div>
    <div><a href="views/contato.html">CONTATO</a></div>
    <div class="dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
            <a href="https://www.instagram.com/_.svshop/">Instagram</a>
            <a href="views/sobre.html">Sobre Nós</a>
            <a href="views/politica.html">Politica De Troca</a>
            <a href="views/produto.php">Novo Produto</a>
        </div>
    </div>
    <div><a href="views/carrinho.php"><span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></span></a></div>

</section>

<section id="Quad">
    <div id="newdrop">NEW DROP 2K24!</div>
</section>

<section id="PRODUTOS"></section>

<section id="Fotos">
    <img id="Fotos1" src="IMG/tuezin.png" height="920px">
    <img src="IMG/Lookbook_HIGHxTJ_2024_4 (1).jpg" height="920px">
    <img src="IMG/derek.png" height="920px">
</section>

<section id="QuadPreto">
    <div class="hover14 column" id="ii"><a href="index.html"><figure><img src="IMG/SV-removebg-preview.png" width="130px"></figure></a></div>
</section>

</body>
</html>
