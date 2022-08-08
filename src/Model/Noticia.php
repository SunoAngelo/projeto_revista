<?php

namespace Qi\ProjetoRevista\src\Model;

class Noticia{
    private Autor $autor;
    private int $data;
    private String $local;
    private String $titulo;
    private String $conteudo;

    public function __construct(
        Autor $autor,
        int $data,
        String $local,
        String $titulo,
        String $conteudo
    ){
        $this->autor = $autor;
        $this->data = $data;
        $this->local = $local;
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
    }
}