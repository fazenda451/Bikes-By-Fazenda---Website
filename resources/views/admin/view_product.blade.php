<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      /* Centralizar e melhorar a tabela */
      .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }

      /* Tabela com bordas roxas */
      .table_deg {
        width: 90%;
        margin: auto;
        border-collapse: collapse;
        background-color: #333;
      }

      /* Estilos das células do cabeçalho */
      th {
        background-color: #6a1b9a; /* Roxo escuro */
        color: white;
        font-size: 19px;
        font-weight: bold;
        padding: 15px;
        text-align: center;
      }

      /* Estilos das células da tabela */
      td {
        border: 1px solid #6a1b9a; /* Roxo escuro */
        text-align: center;
        color: white;
        padding: 10px;
      }

      /* Estilo da pesquisa */
      input[type='search'] {
        width: 300px;
        height: 40px;
        margin: 20px 0;
        padding: 0 15px;
        border: 2px solid #6a1b9a; /* Roxo escuro */
        background-color: #444;
        color: white;
        border-radius: 5px;
      }

      /* Estilo do botão de pesquisa */
      input[type='submit'] {
        background-color: #6a1b9a; /* Roxo escuro */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s;
      }

      /* Hover no botão de pesquisa */
      input[type='submit']:hover {
        background-color: #9c4dcc; /* Roxo mais claro */
      }

      /* Adicionando estilo ao link do botão */
      .btn {
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
      }

      /* Botões de Editar e Deletar */
      .btn-success {
        background-color: #4caf50;
        color: white;
      }

      .btn-danger {
        background-color: #f44336;
        color: white;
      }

      /* Hover nos botões */
      .btn-success:hover {
        background-color: #45a049;
      }

      .btn-danger:hover {
        background-color: #e53935;
      }

      /* Estilo de paginação */
      .div_deg .pagination {
        margin-top: 20px;
        color: white;
        font-size: 14px;
      }

      .div_deg .pagination a {
        color: white;
        padding: 5px 10px;
        margin: 0 5px;
        text-decoration: none;
        border-radius: 5px;
        background-color: #444;
        border: 1px solid #6a1b9a;
      }

      .div_deg .pagination a:hover {
        background-color: #6a1b9a;
      }
    </style>
  </head>

  <body style="background-color: #222;"> <!-- Fundo cinza escuro para o corpo -->

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <form action="{{url('product_search')}}" method="get">
            @csrf
            <input type="search" name="search" placeholder="Search Products...">
            <input type="submit" class="btn btn-secondary" value="Search">
          </form>

          <div class="div_deg">
            <table class="table_deg">
              <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

              @foreach($product as $products)
              <tr>
                <td>{{$products->title}}</td>
                <td>{!!Str::limit($products->description,50)!!}</td>
                <td>{{$products->category ? $products->category->category_name : 'Sem categoria'}}</td>
                <td>{{$products->price}} €</td>
                <td>{{$products->Quantity}}</td>
                <td>
                  <img height="120" width="120" src="products/{{$products->image}}">
                </td>
                <td>
                  <a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>

          <div class="div_deg">
            {{$product->onEachSide(1)->links()}}
          </div>

        </div>    
      </div>
    </div>

    @include('admin.js')

  </body>
</html>
