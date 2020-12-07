<?php
include_once './conexao.php';


//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$sendCad = filter_input(INPUT_POST, 'sendCad', FILTER_SANITIZE_STRING);



if ($sendCad) {
    //Receber os dados do formulário
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $email = utf8_decode($email);

    //Pega a Data Atual
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');

    //Inserir no BD
    $sql = "INSERT INTO aulas (EMAIL, DATA) VALUES (:email, :data)";
    $insert_msg = $conn->prepare($sql);
    $insert_msg->bindParam(':email', $email);
    $insert_msg->bindParam(':data', $data);

    //Verificar se os dados foram inseridos com sucesso
    if ($insert_msg->execute()) {
        // Lançar email
        header('Location: ../../aulas/');
    } else {
        echo  "<script>alert('Não foi cadastrado, tente novamente!');</script>";
    }
}
else{
    header('Location: ../index.html?error=1');
}
