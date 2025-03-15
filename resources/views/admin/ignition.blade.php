<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style type="text/css">
      .content-wrapper {
        padding: 25px;
        background-color: #2d3035;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
      }
      
      .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
      }
      
      .page-title {
        color: #9935dc;
        font-size: 24px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      
      .stats-container {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
      }
      
      .stat-card {
        flex: 1;
        min-width: 200px;
        background-color: #343a40;
        border-radius: 8px;
        padding: 20px;
        display: flex;
        align-items: center;
        border: 1px solid #3d4148;
      }
      
      .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 20px;
      }
      
      .stat-ignition {
        background-color: rgba(153, 53, 220, 0.2);
        color: #9935dc;
      }
      
      .stat-motorcycles {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
      }
      
      .stat-value {
        font-size: 24px;
        font-weight: 600;
        color: white;
        margin: 0;
      }
      
      .stat-label {
        font-size: 14px;
        color: #adb5bd;
        margin: 0;
      }

      .form-container {
        background-color: #343a40;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 25px;
        border: 1px solid #3d4148;
      }
      
      .form-title {
        color: #9935dc;
        font-size: 18px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      
      .form-group {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
      }
      
      .form-control {
        flex-grow: 1;
        background-color: #2d3035;
        border: 1px solid #3d4148;
        color: #fff;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 16px;
      }
      
      .form-control:focus {
        outline: none;
        border-color: #9935dc;
        box-shadow: 0 0 0 2px rgba(153, 53, 220, 0.25);
      }
      
      .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
      }
      
      .btn-primary {
        background-color: #9935dc;
        color: white;
      }
      
      .btn-primary:hover {
        background-color: #8024c0;
      }
      
      .btn-success {
        background-color: #28a745;
        color: white;
      }
      
      .btn-success:hover {
        background-color: #218838;
      }
      
      .btn-danger {
        background-color: #dc3545;
        color: white;
      }
      
      .btn-danger:hover {
        background-color: #c82333;
      }
      
      .search-container {
        width: 100%;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        background-color: #343a40;
        border-radius: 8px;
        padding: 5px 15px;
        border: 1px solid #3d4148;
      }
      
      .search-container i {
        color: #9935dc;
        margin-right: 10px;
      }
      
      .search-input {
        flex-grow: 1;
        background: transparent;
        border: none;
        color: #fff;
        padding: 10px 5px;
        font-size: 16px;
      }
      
      .search-input:focus {
        outline: none;
      }
      
      .table-container {
        background-color: #343a40;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #3d4148;
      }
      
      .data-table {
        width: 100%;
        border-collapse: collapse;
      }
      
      .data-table th {
        background-color: #9935dc;
        color: white;
        text-align: left;
        padding: 15px;
        font-weight: 500;
        font-size: 15px;
      }
      
      .data-table td {
        padding: 15px;
        border-bottom: 1px solid #3d4148;
        color: #e9ecef;
      }
      
      .data-table tr:last-child td {
        border-bottom: none;
      }
      
      .data-table tr:hover {
        background-color: #3d4148;
      }
      
      .action-buttons {
        display: flex;
        gap: 10px;
      }
      
      .empty-state {
        text-align: center;
        padding: 50px 20px;
        color: #adb5bd;
      }
      
      .empty-state i {
        font-size: 50px;
        color: #3d4148;
        margin-bottom: 20px;
      }
      
      .empty-state h3 {
        font-size: 20px;
        margin-bottom: 10px;
        color: white;
      }
      
      @media (max-width: 768px) {
        .form-group {
          flex-direction: column;
        }
        
        .stats-container {
          flex-direction: column;
        }
        
        .stat-card {
          width: 100%;
        }
      }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
      <div class="container-fluid">
        <div class="content-wrapper">
          <div class="page-header">
            <h1 class="page-title"><i class="fas fa-bolt"></i> Gerenciamento de Sistemas de Ignição</h1>
          </div>
          
          <!-- Estatísticas Rápidas -->
          <div class="stats-container">
            <div class="stat-card">
              <div class="stat-icon stat-ignition">
                <i class="fas fa-plug"></i>
              </div>
              <div>
                <h2 class="stat-value">{{ count($data) }}</h2>
                <p class="stat-label">Sistemas de Ignição</p>
              </div>
            </div>
            
            <div class="stat-card">
              <div class="stat-icon stat-motorcycles">
                <i class="fas fa-motorcycle"></i>
              </div>
              <div>
                <h2 class="stat-value">{{ \App\Models\Motorcycle::count() }}</h2>
                <p class="stat-label">Motos Cadastradas</p>
              </div>
            </div>
          </div>
          
          <!-- Formulário de Adição -->
          <div class="form-container">
            <h3 class="form-title"><i class="fas fa-plus-circle"></i> Adicionar Novo Sistema de Ignição</h3>
            <form action="{{url('add_ignition')}}" method="post">
              @csrf 
              <div class="form-group">
                <input type="text" name="IgnitionSystem" class="form-control" placeholder="Digite o sistema de ignição" required />
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> Salvar
                </button>
              </div>
            </form>
          </div>
          
          <!-- Barra de Pesquisa -->
          <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" class="search-input" placeholder="Buscar sistemas de ignição..." oninput="searchIgnition()">
          </div>
          
          <!-- Tabela de Sistemas de Ignição -->
          <div class="table-container">
            @if(count($data) > 0)
            <table class="data-table" id="ignitionTable">
              <thead>
                <tr>
                  <th>Sistema de Ignição</th>
                  <th>Motos</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $ignition)
                <tr>
                  <td>{{ $ignition->system }}</td>
                  <td>{{ \App\Models\Motorcycle::where('ignition_system_id', $ignition->id)->count() }}</td>
                  <td>
                    <div class="action-buttons">
                      <a href="{{ url('edit_ignition', $ignition->id) }}" class="btn btn-success">
                        <i class="fas fa-edit"></i> Editar
                      </a>
                      <a onclick="confirmDelete(event, '{{ $ignition->system }}')" href="{{ url('delete_ignition', $ignition->id) }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Excluir
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <div class="empty-state">
              <i class="fas fa-bolt"></i>
              <h3>Nenhum sistema de ignição encontrado</h3>
              <p>Adicione seu primeiro sistema de ignição usando o formulário acima.</p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    
    @include('admin.js')
    
    <script>
      function searchIgnition() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const table = document.getElementById('ignitionTable');
        const rows = table.getElementsByTagName('tr');
        
        for (let i = 1; i < rows.length; i++) {
          const ignitionSystem = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
          if (ignitionSystem.includes(input)) {
            rows[i].style.display = '';
          } else {
            rows[i].style.display = 'none';
          }
        }
      }
      
      function confirmDelete(event, ignitionSystem) {
        event.preventDefault();
        if (confirm(`Tem certeza que deseja excluir o sistema de ignição "${ignitionSystem}"?`)) {
          window.location.href = event.target.closest('a').href;
        }
      }
    </script>
  </body>
</html>
