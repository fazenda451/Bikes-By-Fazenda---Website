// Arquivo específico para o dropdown do menu de usuário
document.addEventListener('DOMContentLoaded', function() {
  // Seleciona o dropdown do usuário
  var userDropdown = document.getElementById('userDropdown');
  
  if (userDropdown) {
    // Adiciona um evento de clique ao dropdown
    userDropdown.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Encontra o menu dropdown associado
      var dropdownMenu = this.nextElementSibling;
      
      // Alterna a classe 'show' para exibir/ocultar o menu
      if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
      } else {
        dropdownMenu.classList.add('show');
      }
    });
    
    // Fecha o dropdown quando clicar fora dele
    document.addEventListener('click', function(e) {
      if (!e.target.matches('#userDropdown') && !e.target.closest('.dropdown-menu')) {
        var dropdowns = document.getElementsByClassName('dropdown-menu');
        for (var i = 0; i < dropdowns.length; i++) {
          if (dropdowns[i].classList.contains('show')) {
            dropdowns[i].classList.remove('show');
          }
        }
      }
    });
  }
}); 