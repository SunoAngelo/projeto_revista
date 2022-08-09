<?php

namespace APP\Model;

class Autor{
    private String $nome;
    private int $dataDeNascimento;
    private int $cpf;
    private String $email;
    private String $senha;

public function __construct(
    String $nome,
    int $dataDeNascimento,
    int $cpf = 0,
    String $email,
    String $senha
) {
    $this->nome = $nome;
    $this->dataDeNascimento = $dataDeNascimento;
    $this->cpf = $cpf;
    $this->email = $email;
    $this->senha = $senha;
}
}