<?php
namespace APP\Model;

class Validation
{
    public static function validateTitulo(string $titulo):bool
    {
        return mb_strlen($titulo) >= 3;
    }
    public static function validateLocal(string $local):bool
    {
        return mb_strlen($local) >= 5;
    }
    public static function validateConteudo(string $conteudo):bool
    {
        return mb_strlen($conteudo) >= 10;
    }
    
}