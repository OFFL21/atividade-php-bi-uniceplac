<?php
/**
 * Atividade Prática: Desenvolvimento de Dashboard de BI 
 * Disciplina: Programação Orientada a Software Básica
 * Professor: Weverson Garcia Medeiros 
 */


function formatarMoeda($valor) {
   
    return "R$ " . number_format($valor, 2, ',', '.');
}


function analisarDesempenho($vendaItem, $faturamentoTotal) {
   
    $porcentagem = ($vendaItem / $faturamentoTotal) * 100;

  
    if ($porcentagem < 10) {
        return "ALERTA: Baixa Conversão";
    } else {
        return "Produto Estrela";
    }
}


function gerarCardHTML($nome, $preco, $mensagemBI) {
    
    $nomeSeguro = htmlspecialchars($nome);
    
   
    $html = "<div style='border: 1px solid #333; padding: 15px; border-radius: 8px; width: 200px; font-family: sans-serif;'>";
    $html .= "<h3 style='margin-top:0;'>Product: " . $nomeSeguro . "</h3>";
    $html .= "<p>Preço: " . $preco . "</p>";
    $html .= "<p style='font-weight: bold;'>Status: " . $mensagemBI . "</p>";
    $html .= "</div>";
    
    return $html;
}


$faturamentoTotal = 5000.00; 


$prod1_nome = "Suco de Limão";
$prod1_vendas = 200.00; 


$prod2_nome = "Hambúrguer Gourmet";
$prod2_vendas = 1500.00; 

echo "<h2>Dashboard de BI - Restaurante</h2>";


echo gerarCardHTML($prod1_nome, formatarMoeda(10.00), analisarDesempenho($prod1_vendas, $faturamentoTotal));
echo "<br>";
echo gerarCardHTML($prod2_nome, formatarMoeda(45.00), analisarDesempenho($prod2_vendas, $faturamentoTotal));

?>
