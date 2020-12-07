<?php

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'inst1365_root');
define('PASS', '#Flow*2020');
define('DBNAME', 'inst1365_Escola');

try{
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);/*Tenta realizar a conexão com o banco*/
    return $conn;
        
    } catch (PDOException $e){

        // Mensagem de Erro
        echo "<script>alert('Erro Ao Tentar Acessar o banco');</script>";
    }
