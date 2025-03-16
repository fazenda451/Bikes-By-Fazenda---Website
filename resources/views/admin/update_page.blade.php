<!DOCTYPE html>
<html>
  <head> 
   
  @include('admin.css')

  <style type="text/css">
    .page-content {
        padding: 30px;
        background-color: #1a1a1a;
        min-height: 100vh;
    }

    .page-header {
        margin-bottom: 30px;
    }

    .page-title {
        color: #9709e9;
        font-size: 28px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #9709e9;
    }

    .form-container {
        background-color: #2a2a2a;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .form-group {
        flex: 0 0 calc(50% - 20px);
        margin: 0 10px 20px;
    }

    .form-group.full-width {
        flex: 0 0 calc(100% - 20px);
    }

    .form-label {
        display: block;
        color: #adb5bd;
        margin-bottom: 8px;
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        background-color: #333;
        border: 1px solid #444;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
        border-color: #9709e9;
        box-shadow: 0 0 0 3px rgba(151, 9, 233, 0.25);
        outline: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23adb5bd' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px 12px;
        padding-right: 40px;
    }

    .btn-primary {
        background-color: #9709e9;
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s, transform 0.2s;
        display: inline-block;
        text-align: center;
    }

    .btn-primary:hover {
        background-color: #7d0cff;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s, transform 0.2s;
        display: inline-block;
        text-align: center;
        margin-right: 10px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
    }

    .buttons-container {
        display: flex;
        justify-content: flex-start;
        margin-top: 20px;
    }

    .current-image {
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #444;
        padding: 5px;
        background-color: #333;
        display: inline-block;
    }

    .current-image img {
        border-radius: 3px;
        max-width: 100%;
        height: auto;
    }

    .file-input {
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .form-group {
            flex: 0 0 calc(100% - 20px);
        }
    }
  </style>
  
</head>
  <body>

    @include('admin.header')
    
   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <h1 class="page-title">Atualizar Produto</h1>

          <div class="form-container">
            <form action="{{url('edit_product',$data->id)}}" 
            method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" value="{{$data->title}}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Preço</label>
                    <input type="number" step="0.01" name="price" value="{{$data->price}}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Quantidade</label>
                    <input type="number" name="quantity" value="{{$data->Quantity}}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Tamanhos</label>
                    <input type="text" name="size" value="{{$data->size}}" placeholder="Ex: S,M,L,XL ou 38,39,40,41,42" class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Categoria</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}" {{ $data->category_id == $cat->id ? 'selected' : '' }}>
                                {{$cat->category_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Imagem Atual</label>
                    <div class="current-image">
                        <img src="/products/{{$data->image}}" alt="{{$data->title}}" width="150">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Nova Imagem</label>
                    <input type="file" name="image" class="form-control file-input">
                </div>
                
                <div class="form-group full-width">
                    <label class="form-label">Descrição</label>
                    <textarea name="description" class="form-control" required>{{$data->description}}</textarea>
                </div>
            </div>
            
            <div class="buttons-container">
                <a href="{{ url('view_product') }}" class="btn-secondary">Cancelar</a>
                <button type="submit" class="btn-primary">Atualizar Produto</button>
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src=" {{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src=" {{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src=" {{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src=" {{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src=" {{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src=" {{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src=" {{asset('admincss/js/charts-home.js')}}"></script>
    <script src=" {{asset('admincss/js/front.js')}}"></script>
  </body>
</html> 