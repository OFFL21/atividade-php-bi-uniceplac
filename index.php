<?php
/**
 * Atividade Prática: Desenvolvimento de Dashboard de BI [cite: 3]
 * Disciplina: Programação Orientada a Software Básica [cite: 5]
 * Professor: Weverson Garcia Medeiros [cite: 5]
 */

// --- PASSO 1: FUNÇÕES DE UTILIDADE --- [cite: 16, 17]
function formatarMoeda($valor) {
    // Utiliza a função nativa number_format() para o padrão brasileiro [cite: 17, 18]
    return "R$ " . number_format($valor, 2, ',', '.');
}

// --- PASSO 2: A INTELIGÊNCIA DO NEGÓCIO (BI) --- [cite: 23]
function analisarDesempenho($vendaItem, $faturamentoTotal) {
    // Calcula a porcentagem: (VendaItem / Faturamento Total) * 100 [cite: 25]
    $porcentagem = ($vendaItem / $faturamentoTotal) * 100;

    // Lógica de alerta baseada na participação [cite: 26, 27]
    if ($porcentagem < 10) {
        return "ALERTA: Baixa Conversão";
    } else {
        return "Produto Estrela";
    }
}

// --- PASSO 3: O COMPONENTE VISUAL (INTERFACE) --- [cite: 28]
function gerarCardHTML($nome, $preco, $mensagemBI) {
    // Uso de htmlspecialchars para evitar injeção de scripts (Segurança) [cite: 37]
    $nomeSeguro = htmlspecialchars($nome);
    
    // Retorna uma <div> com estilização CSS básica [cite: 30]
    // Usando concatenação (.) conforme solicitado [cite: 31]
    $html = "<div style='border: 1px solid #333; padding: 15px; border-radius: 8px; width: 200px; font-family: sans-serif;'>";
    $html .= "<h3 style='margin-top:0;'>Product: " . $nomeSeguro . "</h3>";
    $html .= "<p>Preço: " . $preco . "</p>";
    $html .= "<p style='font-weight: bold;'>Status: " . $mensagemBI . "</p>";
    $html .= "</div>";
    
    return $html;
}

// --- ÁREA DE TESTE (EXECUÇÃO) ---
$faturamentoTotal = 5000.00; // Exemplo de faturamento bruto [cite: 9]

// Exemplo de Produto com Baixo Desempenho
$prod1_nome = "Suco de Limão";
$prod1_vendas = 200.00; // Isso representa 4% (Baixa Conversão)

// Exemplo de Produto Estrela
$prod2_nome = "Hambúrguer Gourmet";
$prod2_vendas = 1500.00; // Isso representa 30% (Produto Estrela)

echo "<h2>Dashboard de BI - Restaurante</h2>";

// Exibindo os Cards formatados
echo gerarCardHTML($prod1_nome, formatarMoeda(10.00), analisarDesempenho($prod1_vendas, $faturamentoTotal));
echo "<br>";
echo gerarCardHTML($prod2_nome, formatarMoeda(45.00), analisarDesempenho($prod2_vendas, $faturamentoTotal));

?>