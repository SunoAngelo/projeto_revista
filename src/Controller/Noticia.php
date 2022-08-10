<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\NoticiaDAO;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Autor;
use APP\Model\Noticia;
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

    if (!Validation::validateTitulo($titulo)) {
        array_push($error, 'O titulo deve conter no minimo 3 caracteres');
    }

    if (!Validation::validateLocal($local)) {
        array_push($error, 'O local deve conter no minimo 5 caracteres');
    }

    if (!Validation::validateConteudo($conteudo)) {
        array_push($error, 'O conteudo deve conter no minimo 10 caracteres');
    }
    if ($error) { // Se o array NÃO estiver vazio
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $noticia = new Noticia(
            data: $data,
            local: $local,
            titulo :$titulo,
            conteudo: $conteudo
        );
        $dao = new NoticiaDAO();
        try {
            $result = $dao->insert($noticia);
            if ($result)
            Redirect::redirect(
                message: 'Noticia cadastrada com sucesso!!!'
            );
        else
            Redirect::redirect(
                message: 'Não foi possível cadastrar a noticia!!!',
                type: 'error'
            );
        } catch (PDOException $e) {
            //Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
            // Tratar de notificar a equipe
            $e->getMessage();
            
        }
        
    }
    
}
function listNoticias()
{
    $dao = new NoticiaDAO();
    try {
        $noticias = $dao->findAll();
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
    }
    session_start();
    if ($noticias) {
        $_SESSION['list_noticias'] = $noticias;
        header("location:../View/list_noticias.php");
    } else {
        Redirect::redirect(message: ['Não existem noticias cadastrados no sistema!!!'], type: 'warning');
    }
}

function deleteNoticias()
{
    $id = $_GET['id'];
    $dao = new NoticiaDAO();
    try {
        $result = $dao->delete($id);
        if ($result) {
            Redirect::redirect(message: 'Noticia removida com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível remover a noticia!!!'], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperado na execução do sistema!!!', type: 'error');
    }
}
function findNoticias()
{
    $id = $_GET['id'];
    $dao = new NoticiaDAO();
    $data = $dao->findOne($id);
    if ($data) {
        session_start();
        $_SESSION['noticia_data'] = $data;
        header('location:../View/form_edit_noticia.php');
    } else {
        Redirect::redirect(message: 'Noticia não localizado em nossa base de dados!!!');
    }
}

function editNoticias()
{
    if (empty($_POST)) {
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $conteudo = $_POST['conteudo'];
    $data = $_POST["data"];
    $id = $_POST["id"];

    $error = array();
    
    if (!Validation::validateTitulo($titulo)) {
        array_push($error, 'O titulo deve conter no minimo 3 caracteres');
    }

    if (!Validation::validateLocal($local)) {
        array_push($error, 'O local deve conter no minimo 5 caracteres');
    }

    if (!Validation::validateConteudo($conteudo)) {
        array_push($error, 'O conteudo deve conter no minimo 10 caracteres');
    }
    if ($error) {
        Redirect::redirect(message: $error, type: 'warning');
    } else {
        $noticia = new Noticia(
            id:$id,
            titulo: $titulo,
            local: $local,
            conteudo: $conteudo,
            data: $data
        );
        $dao = new NoticiaDAO();
        $result = $dao->update($noticia);
        if ($result) {
            Redirect::redirect(message: 'Noticia atualizado com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível atualizar a noticia!!!'], type: 'warning');
        }
    }
}
