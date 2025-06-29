<?php
require_once '../config/headers.php';
require_once '../config/database.php';
require_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->username) && !empty($data->password)) {
    $user->username = $data->username;
    $user->password = $data->password;

    if($user->login()) {
        $response = array(
            "success" => true,
            "message" => "Login berhasil.",
            "data" => array(
                "id" => $user->id,
                "username" => $user->username,
                "name" => $user->name,
                "role" => $user->role
            )
        );
        http_response_code(200);
    } else {
        $response = array(
            "success" => false,
            "message" => "Username atau password salah."
        );
        http_response_code(401);
    }
} else {
    $response = array(
        "success" => false,
        "message" => "Data tidak lengkap."
    );
    http_response_code(400);
}

echo json_encode($response);