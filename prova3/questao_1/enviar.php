<?php

    if (isset($_POST['nome']) && isset($_POST['idade']))
    {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        $file_path = "files/$nome.txt";

        $data = [
            'nome' => $nome,
            'idade' => $idade
        ];

        file_put_contents($file_path, json_encode($data));

        echo 'Arquivo criado com sucesso.';
    }
    else {
        http_response_code(400);
        echo json_encode(["error" => "Dados inválidos na solicitação"]);
    }
?>
