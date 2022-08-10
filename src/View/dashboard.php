<?php
session_start();
if (empty($_SESSION['login'])) {
  header("location:../../index.html");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-neutral-600">
    <section class="mt-24 flex justify-center items-center w-5/6 m-auto">
        <div class="mr-5">
            <img src="img/user.png" alt="Foto de um usuario" class="h-48 w-48">
        </div>
        <div>
            <h1 class="text-white">DASHBOARD PRINCIPAL</h1>
            <p class="text-white">O que voce deseja fazer?</p>
        </div>
    </section>
    <section class="mt-24 flex justify-evenly items-center w-5/6 m-auto">
        <div class="bg-white p-11 rounded px-8 pt-6 pb-8 mb-4">
            <a href="form_add_noticia.php">
                <p>Adicionar noticia</p>
                <img src="img/anotacao.png" alt="" class="h24 w-24">
            </a>
        </div>
        <div class="bg-white p-11 rounded px-8 pt-6 pb-8 mb-4">
            <a href="../Controller/Noticia.php?operation=list">
                <p>Visualizar Noticias</p>
                <img src="img/jornal.png" alt="" class="h-24 w-24">
            </a>
        </div>
    </section>
</body>
</html>