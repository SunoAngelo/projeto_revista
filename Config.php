<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DNS', 'mysql:host=localhost:3307;dbname=q1_noticias');
    define('USER', 'root');
    define('PASSWORD', '');
}else{
    // Exemplo Servidor
    define('DNS', 'mysql:host=127.0.0.1:3307;dbname=projeto_revista');
    define('USER', 'root');
    define('PASSWORD', '');
}
