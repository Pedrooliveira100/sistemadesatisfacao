<?php

try {
    $pdo = new PDO('mysql:host=ftpupload.net;dbname=satisfacao_tarde', 'if0_35445811', 'ZKWvXoXRVdQgjNK');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão com sucesso!!!";
} catch (PDOException $e) {
    echo "Erro de conexão";
}


//Função Inserir os dados no Banco
function Inserir($escolha)
{
    $pdo = $GLOBALS["pdo"];
    $data = new DateTime('now', new DateTimeZone('America/Araguaina'));
    $sql = $pdo->prepare("INSERT INTO avaliacao VALUES (?,?)");
    $sql->execute(array($escolha, $data->format('Y-m-d H:i:s')));
}

//Função Consultar Banco
function Consultar($opcao)
{

    $pdo = $GLOBALS["pdo"];
    $sql = $pdo->prepare("SELECT COUNT(*) FROM avaliacao WHERE escolha = '$opcao'");  
    $sql->execute();
    $retorno = $sql->fetchAll();

    foreach ($retorno as $key => $value) {
        echo $value['COUNT(*)'];
    }
}
