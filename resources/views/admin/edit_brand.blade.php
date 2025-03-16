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
      max-width: 600px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 25px;
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
  </style>
  
</head>
  <body>

    @include('admin.header')
    
   @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <h1 class="page-title">Atualizar Marca</h1>
           
        <div class="form-container">

            

            <form action="{{url('update_brand', $data->id) }}" method="post">

              @csrf

                <div class="form-group">
                    <label class="form-label">Nome da Marca</label>
                    <input type="text" name="brand" value="{{$data->brand_name}}" class="form-control" required>
                </div>
                
                <div class="buttons-container">
                    <a href="{{ url('view_brand') }}" class="btn-secondary">Cancelar</a>
                    <button type="submit" class="btn-primary">Atualizar Marca</button>
                </div>
            </form>

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