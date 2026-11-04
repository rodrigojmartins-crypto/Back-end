<?php
$usuario = $_POST["ususario"];
$senha = $_POST["senha"];

if ($usuario === "admin" && $senha === "1234") {
    header("location: painel.php");
    exit;
}else{
    echo "usuario ou senha invalidos";
}
?>