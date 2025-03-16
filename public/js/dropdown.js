// Arquivo específico para o dropdown do menu de usuário
document.addEventListener('DOMContentLoaded', function() {
  // Inicializa os dropdowns do Bootstrap 5
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl);
  });
  
  // Código para dropdowns personalizados que não usam Bootstrap 5
  var customDropdowns = document.querySelectorAll('.custom-dropdown-toggle');
  
  customDropdowns.forEach(function(dropdown) {
    dropdown.addEventListener('click', function(e) {
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
  });
  
  // Fecha os dropdowns personalizados quando clicar fora deles
  document.addEventListener('click', function(e) {
    if (!e.target.matches('.custom-dropdown-toggle') && !e.target.closest('.dropdown-menu')) {
      var dropdowns = document.querySelectorAll('.custom-dropdown-menu.show');
      dropdowns.forEach(function(dropdown) {
        dropdown.classList.remove('show');
      });
    }
  });
}); 