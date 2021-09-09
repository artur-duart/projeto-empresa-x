<?php

function lerArquivo($nomeArquivo)
{
    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario($funcionarios, $nome)
{

    $funcionariosFiltro = [];
    foreach ($funcionarios as $funcionario) {
        if (
            strpos($funcionario->first_name, $nome) !== false ||
            strpos($funcionario->last_name, $nome) !== false ||
            strpos($funcionario->department, $nome) !== false
        ) {
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}

function adicionarFuncionario($nomeArquivo, $novoFuncionario)
{
    $funcionarios = lerArquivo($nomeArquivo);
    $funcionarios[] = $novoFuncionario;
    $id = count($funcionarios) + 1;
    $novoFuncionario["id"] = $id;
    $json = json_encode($funcionarios);
    file_put_contents("empresaX.json", $json);
}
