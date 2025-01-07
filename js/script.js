const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');

registerLink.onclick = () => {
    wrapper.classList.add('active');
}
loginLink.onclick = () => {
    wrapper.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registerForm');
    const successMessage = document.getElementById('successMessage');
    const submitBtn = document.getElementById('submitBtn');

    submitBtn.addEventListener('click', function () {
        // Exibe a mensagem de sucesso
        successMessage.style.display = 'block';

        // Aguarda 2 segundos e então envia o formulário
        setTimeout(() => {
            successMessage.style.display = 'none'; // Oculta a mensagem
            
            // Cria e envia o formulário manualmente
            const formData = new FormData(form);
            fetch('../control/usuarioControl.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    console.log('Cadastro realizado com sucesso!');
                    form.reset(); // Limpa os campos do formulário
                } else {
                    console.error('Erro ao cadastrar.');
                }
            })
            .catch(error => console.error('Erro:', error));
        }, 2000);
    });
})

;



