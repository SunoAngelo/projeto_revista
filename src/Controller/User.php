<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\UserDAO;
use APP\Utils\Redirect;

if (empty($_POST)) {
    Redirect::redirect('Requisição inválida!!!', type: 'error');
}

$login = $_POST['username'];
$password = $_POST['password'];

$loginCerto = 'admin';
$senhaCerta = 'admin';

if($login == $loginCerto){
    if($password == $senhaCerta){
        session_start();
        $_SESSION['login'] = $login;
        header("location:../View/dashboard.php");
    }
    else{
        Redirect::redirect(message: ['senha inválidos!!!']);
    }
}
else{
    Redirect::redirect(message: ['Usuário inválidos!!!']);
}
//$dao = new UserDAO();
//$result = $dao->findUser($login);

//if (password_verify($password, $result['password'])) {
    //session_start();
    //$_SESSION['login'] = $login;
   // header("location:../View/dashboard.php");
//} else {
   // Redirect::redirect(message: ['Usuário ou senha inválidos!!!']);
//}
