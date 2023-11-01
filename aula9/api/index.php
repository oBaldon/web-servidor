<?php
header("Content-Type: application/json");

function get_file($filename) {
    $file_path = "files/$filename";
    if (file_exists($file_path)) {
        return file_get_contents($file_path);
    } else {
        return false;
    }
}

function create_file($filename, $content) {
    $file_path = "files/$filename";
    if (file_exists($file_path)) {
        return false;
    }
    else {
        file_put_contents($file_path, $content);
        return true;
    }
}

function update_file($filename, $content) {
    $file_path = "files/$filename";
    if (!file_exists($file_path)) {
        return false;
    }
    else {
        file_put_contents($file_path, $content);
        return true;
    }
}

function delete_file($filename) {
    $file_path = "files/$filename";
    if (file_exists($file_path)) {
        unlink($file_path);
        return true;
    } else {
        return false;
    }
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);
        if (isset($data['filename'])) {
            $filename = $data['filename'];
            $file_content = get_file($filename);
            if ($file_content !== false) {
                echo json_encode(["content" => $file_content]);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Arquivo não encontrado"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Dados inválidos na solicitação"]);
        }
        break;
    
    case 'POST' :
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);
        if (isset($data['filename']) && isset($data['content'])) {
            $filename = $data['filename'];
            $content = $data['content'];
            $success = create_file($filename, $content);
            if ($success) {
                echo json_encode(["message" => "Arquivo criado com sucesso"]);
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Erro ao criar o arquivo"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Dados inválidos na solicitação"]);
        }
        break;

    case 'PUT':
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);
        if (isset($data['filename']) && isset($data['content'])) {
            $filename = $data['filename'];
            $content = $data['content'];
            $success = update_file($filename, $content);
            if ($success) {
                echo json_encode(["message" => "Arquivo atualizado com sucesso"]);
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Erro ao atualizar o arquivo"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Dados inválidos na solicitação"]);
        }
        break;

    case 'DELETE':
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);

        if (isset($data['filename'])) {
            $filename = $data['filename'];
            $success = delete_file($filename);
            if ($success) {
                echo json_encode(["message" => "Arquivo apagado com sucesso"]);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Dados inválidos na solicitação"]);
            }
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Método não suportado"]);
        break;
}
?>
