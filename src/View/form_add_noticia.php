<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar uma noticia</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-neutral-600">
    <section class="flex items-center justify-center ">
        <img src="img/livro-digital.png" alt="Representação de livro digital" class=" h-48 w-48">
        <h1 class="text-white text-5xl">Q1 Notícias</h1>
    </section>
    <div class="w-full max-w-xl m-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Titulo
            </label>
            <input class="shadow appearance-none border border-neutral-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Usuario">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Data
            </label>
            <input class="shadow appearance-none border border-neutral-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Usuario">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Local
            </label>
            <input class="shadow appearance-none border border-neutral-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Usuario">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Conteudo
            </label>
            <textarea cols="50" rows="10" class="shadow appearance-none border border-neutral-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Senha"></textarea>
          </div>
          <div class="flex items-center">
            <button class="bg-neutral-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline m-auto" type="button" >
             Publicar
            </button>
          </div>
        </form>
      </div>
</body>
</html>
