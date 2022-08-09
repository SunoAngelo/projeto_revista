<?php

namespace APP\Model;

class Autor
{
    private int $id;
    private String $nome;
    private int $dataDeNascimento;
    private int $cpf;
    private String $email;
    private String $senha;

    public function __construct(
        String $nome,
        int $dataDeNascimento,
        String $email,
        String $senha,
        int $cpf = 0,
        int $id = 0
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->dataDeNascimento = $dataDeNascimento;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
    }
    public function __get($attribute)
    {
        return $this->$attribute;
    }
}
