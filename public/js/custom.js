// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// owl carousel 

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})

// Inicializa todos os dropdowns do Bootstrap
document.addEventListener('DOMContentLoaded', function() {
  // Inicializa os dropdowns do Bootstrap
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
  var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl);
  });

  // Inicializa os tooltips (se houver)
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Inicializa os popovers (se houver)
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });
});

// Função para verificar se o Bootstrap está carregado corretamente
function checkBootstrap() {
  if (typeof bootstrap !== 'undefined') {
    console.log('Bootstrap JS está carregado corretamente');
  } else {
    console.error('Bootstrap JS não está carregado!');
  }
}

// Executa a verificação quando a página carregar
window.addEventListener('load', checkBootstrap);