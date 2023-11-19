// Aguarda o carregamento completo do DOM antes de executar o código
document.addEventListener('DOMContentLoaded', function() {
    // Seu código JavaScript aqui
    
    // Exemplo: alterar cor de fundo ao clicar em um botão
    const button = document.getElementById('meuBotao');

    if (button) {
        button.addEventListener('click', function() {
            document.body.style.backgroundColor = 'lightblue';
        });
    }
});
