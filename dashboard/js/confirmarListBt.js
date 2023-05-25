// Obtém o elemento do botão e do menu suspenso
var botaoConfirmar = document.getElementById("botao-confirmar");
var menuSuspenso = document.getElementById("menu");

// Adiciona um ouvinte de evento de clique ao botão
botaoConfirmar.addEventListener("click", function() {
  // Obtém o valor selecionado do menu suspenso
  var nomeSelecionado = menuSuspenso.value;
  
  // Executa a ação desejada com o nome selecionado
  alert("Você selecionou o nome: " + nomeSelecionado);
});