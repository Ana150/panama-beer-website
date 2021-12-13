<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./editar.css">
    <title>editar</title>
</head>

<body>

    <header>

        <div class="container-header">
            <input type="checkbox" id="checkbox-menu">

            <label for="checkbox-menu">
                <span></span>
                <span></span>
                <span></span>
            </label>

        </div>

        <a href="../../home/indexHomeAdiministrador.html" class="logo">
            <img src="../../img/logo.png" alt="logo-panamá">
        </a>


    </header>

    <main>

        <form action="acoes.php" method="POST">

            <div class="editar">

                <input type="hidden" name="acao" value="inserir">

                <input type="text" placeholder="Titulo" name='nome'>

                <input type="text" placeholder="Descrição" name='descricao'>

                <input type="number" placeholder="Preço" name='preco'>

                <input type="text" placeholder="categoria" name='categoria'>

                <!-- <select id="cargo" name="cargo">
                    <option id="selecione" selected disabled value="">Selecione:</option>
                    <option></option>
                </select> -->

                <button class="btn-enviar">Enviar</button>



                <!-- <input type="button" placeholder="Enviar"> -->

            </div>

            <div class="image">

                <input type="file" name='foto'>

                <!-- <img src="ds../asset/img/garrafa-girando.gif" alt=""> -->

            </div>

        </form>

    </main>


</body>

</html>