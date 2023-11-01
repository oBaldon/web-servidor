<?php
$data = json_decode(file_get_contents("php://input"));
//echo($data);
if ($data) {
    $requestData = json_decode($data);

    if (isset($requestData->numero1, $requestData->numero2, $requestData->operacao)) {
        $numero1 = $requestData->numero1;
        $numero2 = $requestData->numero2;
        $operacao = $requestData->operacao;
        $resultado = 0;

        switch ($operacao) {
            case 'soma':
                $resultado = $numero1 + $numero2;
                break;
            case 'subtracao':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacao':
                $resultado = $numero1 * $numero2;
                break;
            case 'divisao':
                if ($numero2 != 0) {
                    $resultado = $numero1 / $numero2;
                } else {
                    $resultado = "Erro: Divisão por zero.";
                }
                break;
            default:
                $resultado = "Operação inválida.";
        }
        echo json_encode(['resultado' => $resultado]);
    } else {
        echo json_encode(['error' => $requestData]);
    }
} else {
    echo json_encode(['error' => 'Dados ausentes']);
}
?>
