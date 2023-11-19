<?php
header("Content-Type: application/json");

$wartosc_cookie = $_COOKIE["login"];

function getMessages() {
    $file = 'messages.txt';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        return json_decode($content, true);
    } else {
        return [];
    }
}

function saveMessages($messages) {
    $file = 'messages.txt';
    $json = json_encode($messages);
    file_put_contents($file, $json);
}

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'get':
        $messages = getMessages();
        echo json_encode($messages);
        break;

    case 'send':
        $name = isset($_POST['name']) ? $_POST['name'] : $wartosc_cookie;
        $message = isset($_POST['message']) ? $_POST['message'] : '';

        if (!empty($message)) {
            $messages = getMessages();
            $newMessage = ['name' => $name, 'message' => $message];
            $messages[] = $newMessage;
            saveMessages($messages);
        }
        break;
}




?>
