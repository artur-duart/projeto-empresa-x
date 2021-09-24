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

function adicionarFuncionario(array $funcionario)
{
    $funcionarios = lerArquivo('empresaX.json');
    $id = end($funcionarios)->id + 1;
    $funcionario['id'] = $id;
    $funcionarios[] = $funcionario;
    $json = json_encode($funcionarios);
    file_put_contents('empresaX.json', $json);
}

function deletarFuncionario($nomeArquivo, $idFuncionario)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            unset($funcionarios[$chave]);
        }
    }

    $jsonArray = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $jsonArray);
}

function buscarFuncionarioPorId($nomeArquivo, $idFuncionario)
{
    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            return $funcionario;
        }
    }

    return false;
}

function editarFuncionario($nomeArquivo, $funcionarioEditado)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $funcionarioEditado["id"]) {
            $funcionarios[$chave] = $funcionarioEditado;
        }
    }

    $jsonArray = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $jsonArray);
}

function realizarLogin($usuario, $senha, $dados)
{
    foreach ($dados as $dado) {
        if ($dado->usuario == $usuario && $dado->senha == $senha) {

            //VARIÁVEIS DE SESSÃO:
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header('location: index.php');
            exit;
        }
    }
    header('location: login.php');
}

function verificarLogin()
{
    if ($_SESSION["id"] != session_id() || empty($_SESSION["id"])) {
        header("location: login.php");
    }
}

function finalizarLogin()
{

    session_unset();
    session_destroy();

    header("location: login.php");
}
