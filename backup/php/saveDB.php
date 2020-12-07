<?php
include_once './conexao.php';


//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$sendCad = filter_input(INPUT_POST, 'sendCad', FILTER_SANITIZE_STRING);
if ($sendCad) {
    //Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $nome = utf8_decode($nome);
    $email = utf8_decode($email);

    //Pega a Data Atual
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');

    //Inserir no BD
    $sql = "INSERT INTO Campanha_lives (Nome, Email, Data) VALUES (:nome, :email, :data)";
    $insert_msg = $conn->prepare($sql);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':email', $email);
    $insert_msg->bindParam(':data', $data);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        // Lançar email
        header('Location: ../obrigado/index.html');
    } else {
        echo  "<script>alert('Não foi cadastrado, tente novamente!');</script>";
    }
}
