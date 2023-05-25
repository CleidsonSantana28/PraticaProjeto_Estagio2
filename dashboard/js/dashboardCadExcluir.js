function confirmaExcluir(event) {
    event.preventDefault(); // Evita que o link seja aberto imediatamente quando clicar nele
  
    var resposta = confirm("Você tem certeza que deseja excluir?");
  
    if (resposta === true) {
      window.location.href = event.target.href; // Abre o link se o usuário confirmar
    } else {
      alert("Ação cancelada!"); // Exibe uma mensagem se o usuário cancelar
    }
  }