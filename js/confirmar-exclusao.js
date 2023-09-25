const links = document.querySelectorAll(".excluir");

for(const link of links){

    //Evento ao clicar
    link.addEventListener("click", function(event){
        // Anular comportamento padrão
        event.preventDefault();

        // Captura da resposta do usuário
        let resposta = confirm("Tem certeza que deseja excluir este item?");

        if (resposta) {
            location.href = this.href;
        }
    })
}