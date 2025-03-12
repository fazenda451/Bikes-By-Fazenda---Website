<!DOCTYPE html>
<html>
  <head> 
   
  @include('admin.css')

  <style type="text/css">
    .div_deg
    {
      display: flex;
      justify-content: center;
      align-items: center;
      margin:60px;
    }

    input[type='text']
    {
      width: 400px;
      height: 50px;


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

          <h1 style="color: white;"><i class="fa-solid fa-screwdriver"></i> Update Suspensions</h1>
           
        <div class="div_deg">

            

            <form action="{{url('update_suspensions', $data->id) }}" method="post">

              @csrf

                <input type="text" name="suspension" value="{{$data->type}}">

                <input class="btn btn-primary" type="submit" value="Update Suspensions">
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