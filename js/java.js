// Seleciona os elementos necessários
const checkbox = document.getElementById('checkbox');
const mensalPayments = document.querySelectorAll('.mensal');
const anualPayments = document.querySelectorAll('.anual');

// Função para atualizar a visibilidade dos preços
function updatePrices() {
    const isChecked = checkbox.checked;

    mensalPayments.forEach(element => {
        element.classList.toggle('hidden', isChecked);
        element.classList.toggle('visible', !isChecked);
    });

    anualPayments.forEach(element => {
        element.classList.toggle('hidden', !isChecked);
        element.classList.toggle('visible', isChecked);
    });
}

// Adiciona um event listener para atualizar a visibilidade quando o estado do checkbox mudar
checkbox.addEventListener('change', updatePrices);

// Inicializa a visibilidade correta ao carregar a página
document.addEventListener('DOMContentLoaded', updatePrices);
