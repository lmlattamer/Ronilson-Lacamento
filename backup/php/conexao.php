<?php

//Credenciais de acesso ao BD
define('HOST', 'mysql741.umbler.com');
define('USER', 'flow');
define('PASS', '#flow2020*');
define('DBNAME', 'db_eucorretor');

try{
    $conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);/*Tenta realizar a conexão com o banco*/
    return $conn;
        
    } catch (PDOException $e){

        // Mensagem de Erro
        echo "<script>alert('Erro Ao Tentar Acessar o banco');</script>";
    }
