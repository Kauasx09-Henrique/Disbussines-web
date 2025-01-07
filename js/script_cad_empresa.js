document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form"),
          nextBtn = form.querySelector(".nextBtn"),
          backBtn = form.querySelector(".backBtn"),
          allInputFirst = form.querySelectorAll(".first input");

    // Adiciona o evento de clique ao botão "Avançar"
    nextBtn.addEventListener("click", (e) => {
        e.preventDefault();  // Evita o comportamento padrão do botão

        // Verifica se todos os campos da primeira etapa estão preenchidos
        const allFilled = Array.from(allInputFirst).every(input => input.value.trim() !== "");

        if (allFilled) {
            // Adiciona a classe 'secActive' ao formulário para mostrar a segunda etapa
            form.classList.add('secActive');
        } else {
            // Exibe um alerta caso algum campo esteja vazio
            alert("Por favor, preencha todos os campos obrigatórios.");
        }
    });

    // Adiciona o evento de clique ao botão "Voltar"
    backBtn.addEventListener("click", (e) => {
        e.preventDefault();  // Evita o comportamento padrão do botão
        form.classList.remove('secActive');  // Remove a classe 'secActive' para retornar à primeira etapa
    });
});
