<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("./painel/db.php");

// Verifica se o ID do pet foi fornecido
if (isset($_POST['pet_id'])) {
    $petId = $_POST['pet_id'];
    $sql_query = $conn->query("SELECT * FROM pet_status ps INNER JOIN pets p ON ps.pet_status_pet_id = p.pet_id WHERE pet_status_liberado = 1 AND p.pet_id = $petId");

    
    $token = '6192509791:AAGdNajzGj_gZkAiAM9923iCLYLmbFqDE1o';
    $sql_chat_query = $conn->query("SELECT chat_number FROM chat_id");
    
    while ($arquivo = $sql_query->fetch(PDO::FETCH_ASSOC)) {
        $parametros['photo'] = 'http://unipets.sytes.net/' . $arquivo["pet_path"];
        $situacao = $arquivo["pet_status_situacao"] == 1 ? "Perdido" : "Adocao";
        $parametros['caption'] = '
        🦮 <b>PET '. $situacao .'</b> 🦮
        <b>Nome:</b> <pre>' . $arquivo["pet_name"] . '</pre>
        <b>Espécie:</b> <pre>' . $arquivo["pet_especie"] . '</pre>
        <b>Raça:</b> <pre>' . $arquivo["pet_raca"] . '</pre>
        ';
        $parametros['parse_mode'] = 'html';
        $parametros['disable_web_page_preview'] = true;

        while ($chat = $sql_chat_query->fetch(PDO::FETCH_ASSOC)) {
            $parametros['chat_id'] = $chat['chat_number'];

            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'content' => json_encode($parametros),
                    'header' =>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
                )
            );
            $context  = stream_context_create($options);

            file_get_contents('https://api.telegram.org/bot' . $token . '/sendPhoto', false, $context);
        }
        // Reinicia o ponteiro do resultado da consulta dos chats
        $sql_chat_query->execute();
    }
}
