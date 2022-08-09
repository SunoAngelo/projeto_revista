<?php

namespace APP\Model;
use APP\Model\Autor;

class Noticia{
    private int $id;
    private string $autorNome;
    private string $data;
    private String $local;
    private String $titulo;
    private String $conteudo;

    public function __construct(
        string $data,
        string $local,
        string $titulo,
        string $conteudo,
        string $autorNome = 'Autor desconhecido',
        int $id = 0
    ){
        $this->id = $id;
        $this->data = $data;
        $this->local = $local;
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
        $this->autorNome = $autorNome;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}