<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\NoticiaDAO;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Autor;
use PDOException;

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi informada!!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'insert':
        insertNoticia();
        break;
    case 'list':
        listNoticias();
        break;
    case 'delete':
        deleteNoticias();
        break;
    case 'find':
        findNoticias();
        break;
    case 'edit':
        editNoticias();
        break;
    default:
        Redirect::redirect(message: 'Operação informada é inválida!!!', type: 'error');
}
function insertNoticia()
{
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }

    $titulo = $_POST["titulo"];
    $data = $_POST["data"];
    $local = $_POST["local"];
    $conteudo = $_POST["conteudo"];

    $error = array();


    if ($error) { // Se o array NÃO estiver vazio
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $noticia = new Noticia(
            autor: new Autor(),
            data: $data,
            local: $local,
            titulo :$titulo,
            conteudo: $conteudo
        );
        $dao = new NoticiaDAO();
        try {
            $result = $dao->insert($noticia);
        } catch (PDOException $e) {
            Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
            // Tratar de notificar a equipe
            // $e->getMessage();
        }
        if ($result)
            Redirect::redirect(
                message: 'Noticia cadastrada com sucesso!!!'
            );
        else
            Redirect::redirect(
                message: 'Não foi possível cadastrar a noticia!!!',
                type: 'error'
            );
    }
}