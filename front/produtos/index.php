<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./produtos.css">
    <!-- <link rel="stylesheet" href="./asset/styles/menu.css"> -->
    <title>CATALOGO</title>
</head>

<header>

    <div class="container-header">
        <input type="checkbox" id="checkbox-menu">

        <label for="checkbox-menu">
            <span></span>
            <span></span>
            <span></span>
        </label>

    </div>

    <a href="#" class="logo">
        <img src="../img/logo.png" alt="logo-panamá">
    </a>


</header>

<body>

    <section class="search-container">

        <div id="input_container">
            <input type="text" id="input" placeholder="Pesquisar">
            <img src="./asset/img/search-icon.svg" id="input_img">
        </div>

        <!-- <img class="wave-top" src="./asset/img/wavw-top.svg"> -->



    </section>

    <section class="cards-container">

        <div class="cards">

            <!-- <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descricao</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr> -->

            <div class="card-img">

                <img src="<?= $produto['foto'] ?>">

            </div>

            <div class="card-text">

                <h1><?= $produto['nome'] ?></h1>

                <p><?= $produto["descricao"] ?></p>

            </div>

            <div class="preco">
                <p><?= $produto["preco"] ?></p>
            </div>

            <div class="add-delete">

                <img src="./asset/img/icon-trash-can.svg">

                <img src="./asset/img/icon-settings.svg">

            </div>


        </div>

    </section>

    <a href="./criar/index.php">
        <img class="add-icon" src="../img/icon-add.svg">
    </a>

</body>

</html>