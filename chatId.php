<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$botToken = '6192509791:AAGdNajzGj_gZkAiAM9923iCLYLmbFqDE1o';

$url = "https://api.telegram.org/bot$botToken/getUpdates";

// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "tavzera";
$password = "#H9&r5*B6!2015";
$dbname = "unipets";

$response = file_get_contents($url);

if ($response === false) {
    echo "Falha ao obter os dados da API do Telegram.";
    exit();
}

$data = json_decode($response, true);

$chatIds = [];

if (isset($data['result']) && !empty($data['result'])) {
    foreach ($data['result'] as $result) {
        $chatId = $result['message']['chat']['id'];
        $firstName = $result['message']['chat']['first_name'];

        // Verificar se o chat ID já existe na tabela 'chat_id' antes de inserir
        // Certifique-se de ter uma conexão estabelecida com o banco de dados antes de executar esta parte

        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($conn->connect_error) {
            echo "Falha na conexão com o banco de dados: " . $conn->connect_error;
            exit();
        }

        // Consultar se o chat ID já existe na tabela
        $query = "SELECT chat_number FROM chat_id WHERE chat_number = '$chatId'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            // O chat ID já existe, ignorar a inserção
            echo "Chat ID já existe na tabela 'chat_id'.";
        } else {
            // O chat ID não existe, realizar a inserção
            // Preparar a consulta SQL para inserção dos dados na tabela
            $sql = "INSERT INTO chat_id (chat_number, chat_user) VALUES ('$chatId', '$firstName')";

            if ($conn->query($sql) === TRUE) {
                echo "Dados salvos com sucesso na tabela 'chat_id'.";
            } else {
                echo "Erro ao salvar os dados na tabela 'chat_id': " . $conn->error;
            }
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }
} else {
    echo "Nenhum resultado encontrado.";
}
?>
