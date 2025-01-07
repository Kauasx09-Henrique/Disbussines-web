// Criando um gráfico de feedback fictício
const ctx = document.getElementById('chart').getContext('2d');

const chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Positivos', 'Negativos'],
        datasets: [{
            label: 'Feedback',
            data: [85, 15], // Porcentagem fictícia de feedback positivo e negativo
            backgroundColor: ['#00ff88', '#ff6b6b'],
            borderColor: '#fff',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                    }
                }
            }
        }
    }
});
