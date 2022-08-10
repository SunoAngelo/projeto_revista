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
    <title>Lista de noticias</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/read-book-icon.png"/>
</head>
<body class="bg-neutral-600">
    <header class="h-7 flex items-center justify-evenly bg-neutral-800 text-white">
      <a href="dashboard.php">Dashboard</a>
    </header>
    <section class="flex items-center justify-center ">
        <img src="img/livro-digital.png" alt="Representação de livro digital" class=" h-48 w-48">
        <h1 class="text-white text-5xl">Q1 Notícias</h1>
    </section>
    <section class="flex items-center justify-center">
    <div class="mb-3 xl:w-96">
    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
      <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Pesquisar" aria-label="Search" aria-describedby="button-addon2">
      <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
        </svg>
        </button>
    </div>
  </div>
  </div>
  </section>
    <?php
      foreach ($_SESSION['list_noticias'] as $noticias) :
    ?>
    <div class="flex justify-center mt-6">
    <section class="m-auto w-4/5">
        <div class="max-w-sm w-full lg:max-w-full lg:flex">
        </div>
        <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
        <div class="text-gray-900 font-bold text-xl mb-2"><?= $noticias['titulo']?></div>
        <p class="text-gray-700 text-base"><?= $noticias['conteudo'] ?></p>
        </div>
        <div class="flex items-center">
        <img class="w-10 h-10 rounded-full mr-4" src="img/user.png" alt="Avatar of Jonathan Reinink">
        <div class="text-sm">
            <p class="text-gray-900 leading-none"><?= $noticias['nome_autor'] ?></p>
            <p class="text-gray-600"><?= $noticias['dataPublicacao'] ?></p>
        </div>
        <div class="flex w-1/3 justify-around">
            <a href="../Controller/Noticia.php?operation=find&id=<?= $noticias["id_noticia"] ?>">
                <img class="w-10 h-10" src="img/editar.png" alt="">
            </a>
            <a href="../Controller/Noticia.php?operation=delete&id=<?= $noticias['id_noticia'] ?>">
                <img class="w-10 h-10" src="img/excluir.png" alt="">
            </a>
        </div>
        </div>
        </div>
        </div>
    <?php
      endforeach;
    ?>
  </section>
</body>
</html>
