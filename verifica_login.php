<?php 
    $host = 'localhost';
    $db = 'certophp';
    $user = 'eliza';
    $pass = '123456';
    $port = 3307; // Porta MySQL correta
    // Inclui o arquivo da classe Database que criamos para conectar dentro da pasta php
    require_once 'connection.php';
    // Cria uma instância da classe Database
    $database = new Database($host, $db, $user, $pass, $port);
    // Chama o método connect para estabelecer a conexão
    $database->connect();
    // Obtém a instância PDO para realizar consultas
    $pdo = $database->getConnection();
    /*------------------------------
    Inicio do código de verificação 
    --------------------------------*/
     $login = htmlspecialchars($_GET['login']);
     $senha = htmlspecialchars($_GET['senha']);
    // Verifica se a variável $pdo, que deve ser uma instância de PDO, está definida e é válida
    if ($pdo) {
        // Prepara uma consulta SQL para selecionar as colunas 'id' e 'nome' da tabela 'usuario'
        $stmt = $pdo->prepare("select * from senai_ta_aulaphp.usuario where nome = '$login' and  senha = '$senha'");
        // Executa a consulta preparada
        $stmt->execute();
        // Busca todos os resultados da consulta em um array associativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Verifica se há algum resultado na consulta
        if ($resultados) {
            Echo("Logado!");
        } else {
            // Caso não haja resultados, exibe uma mensagem indicando que nenhum registro foi encontrado
            Echo("Não logado!");
        }
     }

?>