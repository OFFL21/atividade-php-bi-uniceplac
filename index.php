<?php

function formatarMoeda($valor) {
    return "R$ " . number_format($valor, 2, ',', '.');
}

function analisarDesempenho($vendaItem, $faturamentoTotal) {
    if ($faturamentoTotal <= 0) {
        return "ALERTA: Faturamento inválido";
    }

    $porcentagem = ($vendaItem / $faturamentoTotal) * 100;

    if ($porcentagem < 10) {
        return "ALERTA: Baixa Conversão";
    } else {
        return "Produto Estrela";
    }
}

function gerarCardHTML($nome, $preco, $mensagemBI) {
    $nomeSeguro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
    $mensagemSegura = htmlspecialchars($mensagemBI, ENT_QUOTES, 'UTF-8');
    
    $precoFormatado = formatarMoeda($preco);
    $corAlerta = ($mensagemBI === "ALERTA: Baixa Conversão") ? "#ff4c4c" : "#4caf50";

    $html = "
    <div style='border: 1px solid #ddd; border-radius: 8px; padding: 15px; margin: 10px; font-family: sans-serif; width: 250px; display: inline-block; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);'>
        <h3 style='margin-top: 0; color: #333;'>{$nomeSeguro}</h3>
        <p style='font-size: 1.2em; color: #555;'><strong>{$precoFormatado}</strong></p>
        <div style='background-color: {$corAlerta}; color: #fff; padding: 10px; text-align: center; border-radius: 5px; font-weight: bold;'>
            {$mensagemSegura}
        </div>
    </div>
    ";

    return $html;
}

$faturamentoMensal = 50000.00;

$vendasPizza = 12000.00;
$statusPizza = analisarDesempenho($vendasPizza, $faturamentoMensal);
echo gerarCardHTML("Pizza Margherita", 55.90, $statusPizza);

$vendasEmpadao = 3500.00; 
$statusEmpadao = analisarDesempenho($vendasEmpadao, $faturamentoMensal);
echo gerarCardHTML("Empadão de Frango", 18.50, $statusEmpadao);

?>
