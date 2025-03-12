<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Link para o Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>

.statistic-block {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Transição suave */
}

.statistic-block:hover {
    transform: translateY(-5px); /* Desloca para cima */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Aumenta a sombra */
}


.statistic-block .title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
    padding: 5px;
}

.statistic-block .number {
    font-size: 24px;
    font-weight: bold;
}

.progress {
    height: 10px;
    border-radius: 5px;
    background-color: #e9ecef;
}

.progress-bar {
    border-radius: 5px;
}
    </style>
</head>
<body class="home-page">
    <h2 class="h5 no-margin-bottom">Dashboard</h2>
    </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <!-- Alterado para o ícone do Font Awesome -->
                                <div class="icon"><i class="fa-solid fa-users"></i></div><strong>Total Clients</strong>
                            </div>
                            <div class="number dashtext-1">{{$user}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <!-- Alterado para o ícone do Font Awesome -->
                                <div class="icon"><i class="fa-solid fa-box"></i></div><strong>Total Products</strong>
                            </div>
                            <div class="number dashtext-2">{{$product}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="statistic-block block">
                      <div class="progress-details d-flex align-items-end justify-content-between">
                          <div class="title">
                              <!-- Alterado para o ícone do Font Awesome -->
                              <div class="icon"><i class="fa-solid fa-motorcycle"></i></div><strong>Total Motorcycles</strong>
                          </div>
                          <div class="number dashtext-4">{{$motorcycle}}</div>
                      </div>
                      <div class="progress progress-template">
                          <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                      </div>
                  </div>
              </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <!-- Alterado para o ícone do Font Awesome -->
                                <div class="icon"><i class="fa-solid fa-cart-shopping"></i></div><strong>Total Orders</strong>
                            </div>
                            <div class="number dashtext-3">{{$order}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <!-- Alterado para o ícone do Font Awesome -->
                                <div class="icon"><i class="fa-solid fa-truck"></i></div><strong>Total Delivered</strong>
                            </div>
                            <div class="number dashtext-4">{{$delivered}}</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <!-- Alterado para o ícone do Font Awesome -->
                                <div class="icon"><i class="fa-solid fa-money-check-dollar"></i></div><strong>Current Month €</strong>
                            </div>
                            <div class="number dashtext-4">{{ number_format($monthlyEarnings, 2, ',', '.') }}€</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <!-- Alterado para o ícone do Font Awesome -->
                                <div class="icon"><i class="fa-solid fa-wallet"></i></div><strong>Annual  €</strong>
                            </div>
                            <div class="number dashtext-4">{{ number_format($annualEarnings, 2, ',', '.') }}€</div>
                        </div>
                        <div class="progress progress-template">
                            <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos lado a lado -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="statistic-block block">
                        <div class="title">
                            <strong>Sales This Month</strong>
                        </div>
                        <canvas id="salesLineChart"></canvas>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="statistic-block block">
                        <div class="title">
                            <strong>Top Category Sold</strong>
                        </div>
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer__block block no-margin-bottom">
            <div class="containser-fluid text-center">
            </div>
        </div>
    </footer>

    <!-- Carregar o Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // Obter os dados das vendas no mês passados pelo controller
      var salesDates = @json($salesData->pluck('date')); 
      var salesCounts = @json($salesData->pluck('count'));

      // Gráfico de linha para vendas no mês
      var ctxSales = document.getElementById('salesLineChart').getContext('2d');
      var salesLineChart = new Chart(ctxSales, {
        type: 'line', // Tipo de gráfico em linha
        data: {
          labels: salesDates, // As datas
          datasets: [{
            label: 'Sales',
            data: salesCounts, // Quantidade de vendas por dia
            borderColor: 'rgba(169, 41, 180, 0.86)', // Cor da linha
            backgroundColor: 'rgba(76, 0, 130, 0.12)', // Cor do fundo da linha (sem preenchimento)
            fill: true, // Preencher a área abaixo da linha
            borderWidth: 2
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true, // Começar o gráfico no 0
            },
            x: {
              title: {
                display: true,
                text: 'Date' // Rótulo para o eixo X (datas)
              }
            },
          },
          plugins: {
            legend: {
              display: false // Não mostrar a legenda (se não quiser)
            }
          }
        }
      });

      // Obter os dados das categorias e vendas passados pelo controller
      var categories = @json($categories->pluck('category'));
      var sales = @json($categories->pluck('total_sold'));

      // Gráfico de barras para categorias mais vendidas
      var ctxCategory = document.getElementById('categoryChart').getContext('2d');
      var categoryChart = new Chart(ctxCategory, {
        type: 'bar', // Tipo de gráfico
        data: {
          labels: categories, // Categorias
          datasets: [{
            label: 'Categories Solds',
            data: sales, // Quantidade de produtos vendidos por categoria
            backgroundColor: 'rgba(76, 0, 130, 0.12)', // Cor do fundo da linha (sem preenchimento)
            borderColor: 'rgba(169, 41, 180, 0.86)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
</body>
</html>
