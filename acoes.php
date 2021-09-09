<?php

require("./funcoes.php");

$novoFuncionario = [
    "id" => $id,
    "first_name" => $_POST["first_name"],
    "last_name" => $_POST["last_name"],
    "email" => $_POST["email"],
    "gender" => $_POST["gender"],
    "ip_address" => $_POST["ip_address"],
    "country" => $_POST["country"],
    "department" => $_POST["department"]
];

adicionarFuncionario("empresaX.json", $novoFuncionario);
header("location: index.php");

// if (
//     !empty($_POST["first_name"]) && !empty($_POST["last_name"]) &&
//     !empty($_POST["email"]) && !empty($_POST["gender"]) &&
//     !empty($_POST["ip_address"]) && !empty($_POST["country"])
//     && !empty($_POST["department"])
// ) {
//     adicionarFuncionario([
//         "first_name" => $_POST["first_name"],
//         "last_name" => $_POST["last_name"],
//         "email" => $_POST["email"],
//         "gender" => $_POST["gender"],
//         "ip_address" => $_POST["ip_address"],
//         "country" => $_POST["country"],
//         "department" => $_POST["department"]
//     ]);

//     header('location:' . dirname($_SERVER['PHP_SELF']));
// }
