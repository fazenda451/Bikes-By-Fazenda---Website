<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      

      input[type='text'] {
        width: 400px;
        height: 50px;
        padding: 10px;
        border-radius: 5px;
        border: 2px solid #6a1b9a; /* roxo */
        margin-right: 10px;
        background-color: #444;
        color: white;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
      }

      input[type='text']:focus {
        border-color: #8e24aa; /* roxo mais claro */
        box-shadow: 0 0 8px rgba(106, 27, 154, 0.6);
      }

      .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
      }

      .table_deg {
        text-align: center;
        margin: auto;
        border: 2px solid #6a1b9a; /* roxo */
        margin-top: 50px;
        width: 80%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #333; /* fundo cinza escuro para a tabela */
        overflow: hidden;
      }

      th {
        background-color: #6a1b9a; /* roxo */
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        transition: background-color 0.3s ease;
      }

      th:hover {
        background-color: #8e24aa; /* tom de roxo mais claro */
      }

      td {
        color: white;
        padding: 10px;
        border: 1px solid #6a1b9a; /* roxo */
        transition: background-color 0.3s ease;
      }

      td:hover {
        background-color: #444; /* fundo mais claro ao passar o mouse */
      }

      .btn {
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
      }

      .btn-primary {
        background-color: #6a1b9a; /* roxo */
        color: white;
        border: none;
      }

      .btn-primary:hover {
        background-color: #8e24aa; /* tom de roxo mais claro */
        transform: scale(1.05);
      }

      .btn-success {
        background-color: #388e3c;
        color: white;
      }

      .btn-success:hover {
        background-color: #4caf50;
        transform: scale(1.05);
      }

      .btn-danger {
        background-color: #d32f2f;
        color: white;
      }

      .btn-danger:hover {
        background-color: #f44336;
        transform: scale(1.05);
      }

      .search-button {
        background-color: #6a1b9a; /* roxo */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        transition: all 0.3s ease;
      }

      .search-button:hover {
        background-color: #8e24aa;
        transform: scale(1.05);
      }

      .search-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
      }

      .page-header h1 {
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 20px;
        color: #6a1b9a; /* roxo */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      }

      .page-header {
        
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      }

      .container-fluid {
        padding: 20px;
      }
    </style>
  </head>

  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Add Brand</h1>
          <div class="div_deg"> 
            <form action="{{url('add_brand')}}" method="post">
              @csrf 
              <div>
                <input type="text" name="brand" placeholder="Enter Brand" />
                <input class="btn btn-primary" type="submit" value="Add Brand">
              </div>
            </form>
          </div>

          <!-- Search Section -->
          <div class="search-container">
            <input type="text" id="search" placeholder="Search Brands..." />
            <button class="search-button" onclick="searchBrand()">Search</button>
          </div>

          <!-- Table Section -->
          <div>
            <table class="table_deg">
              <tr>
                <th>Brand Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

              @foreach($data as $data)

              <tr>
                <td>{{$data->brand_name}}</td>
                <td>
                  <a class="btn btn-success" href="{{url('edit_brand',$data->id)}}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_brand',$data->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script>
      function searchBrand() {
        let input = document.getElementById('search').value.toLowerCase();
        let rows = document.querySelectorAll('.table_deg tr');
        
        rows.forEach(row => {
          let brand = row.querySelector('td') ? row.querySelector('td').innerText.toLowerCase() : '';
          if (brand.indexOf(input) === -1) {
            row.style.display = 'none';
          } else {
            row.style.display = '';
          }
        });
      }
    </script>
    @include('admin.js')
  </body>
</html>