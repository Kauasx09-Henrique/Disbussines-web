function buscarEndereco() {
    console.log("Função buscarEndereco chamada.");
    var cep = document.getElementById('cep').value.replace(/\D/g, '');

    if (cep != "") {
        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {
            fetch('https://viacep.com.br/ws/' + cep + '/json/')
                .then(response => response.json())
                .then(data => {
                    if (!("erro" in data)) {
                        document.getElementById('endereco').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('uf').value = data.uf;
                    } else {
                        alert("CEP não encontrado.");
                    }
                })
                .catch(error => {
                    console.error("Erro ao buscar o CEP:", error);
                });
        } else {
            alert("Formato de CEP inválido.");
        }
    }
}
