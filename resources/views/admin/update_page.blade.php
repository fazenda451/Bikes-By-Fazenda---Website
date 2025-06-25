<!DOCTYPE html>
<html>
  <head> 
   
  @include('admin.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        display: flex;
        align-items: center;
    }
    
    .page-title i {
        margin-right: 15px;
        font-size: 32px;
    }

    .form-container {
        background-color: #2a2a2a;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }
    
    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(to bottom, #9709e9, #7d0cff);
    }

    .form-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #444;
    }
    
    .form-header h2 {
        color: #fff;
        font-size: 20px;
        margin-bottom: 10px;
    }
    
    .form-header p {
        color: #adb5bd;
        font-size: 14px;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .form-group {
        flex: 0 0 calc(50% - 20px);
        margin: 0 10px 25px;
        position: relative;
    }

    .form-group.full-width {
        flex: 0 0 calc(100% - 20px);
    }
    
    /* Ajuste específico para o grupo da categoria */
    .form-group.category-group {
        flex: 0 0 calc(100% - 20px);
    }

    .form-label {
        display: flex;
        align-items: center;
        color: #adb5bd;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: 500;
    }
    
    .form-label i {
        margin-right: 8px;
        color: #9709e9;
        width: 20px;
        text-align: center;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        background-color: #333;
        border: 1px solid #444;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #9709e9;
        box-shadow: 0 0 0 3px rgba(151, 9, 233, 0.25);
        outline: none;
        background-color: #3a3a3a;
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
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }
    
    select.form-control option {
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #9709e9, #7d0cff);
        border: none;
        color: white;
        padding: 14px 28px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .btn-primary i {
        margin-right: 8px;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #7d0cff, #9709e9);
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: white;
        padding: 14px 28px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-right: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .btn-secondary i {
        margin-right: 8px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .buttons-container {
        display: flex;
        justify-content: flex-start;
        margin-top: 30px;
    }

    .current-image {
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #444;
        padding: 5px;
        background-color: #333;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .current-image:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .current-image img {
        border-radius: 3px;
        max-width: 100%;
        height: auto;
    }

    .file-input {
        margin-top: 10px;
        background-color: #333;
        border: 1px solid #444;
        border-radius: 5px;
        color: #fff;
        padding: 10px;
        width: 100%;
    }
    
    .file-input::-webkit-file-upload-button {
        background: linear-gradient(135deg, #9709e9, #7d0cff);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-right: 10px;
    }
    
    .info-box {
        background-color: rgba(151, 9, 233, 0.1);
        border-left: 4px solid #9709e9;
        padding: 15px;
        margin-bottom: 25px;
        border-radius: 0 5px 5px 0;
    }
    
    .info-box h3 {
        color: #9709e9;
        font-size: 16px;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
    }
    
    .info-box h3 i {
        margin-right: 8px;
    }
    
    .info-box p {
        color: #adb5bd;
        font-size: 14px;
        margin: 0;
    }
    
    .form-footer {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #444;
        color: #adb5bd;
        font-size: 14px;
    }
    
    .form-footer i {
        color: #9709e9;
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .form-group {
            flex: 0 0 calc(100% - 20px);
        }
        
        .page-content {
            padding: 20px 15px;
        }
        
        .form-container {
            padding: 20px 15px;
        }
        
        .buttons-container {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn-secondary {
            margin-right: 0;
            margin-bottom: 15px;
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
          <h1 class="page-title"><i class="fas fa-edit"></i> Update Product</h1>

          <div class="form-container">
            <div class="form-header">
                <h2>Edit Product Information</h2>
                <p>Update the product details and information</p>
            </div>
            
            <div class="info-box">
                <h3><i class="fas fa-info-circle"></i> Important Information</h3>
                <p>All fields marked with an asterisk (*) are required. Make sure to provide accurate information for better product presentation.</p>
            </div>
            
            <form action="{{url('edit_product',$data->id)}}" 
            method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-tag"></i> Title *</label>
                    <input type="text" name="title" value="{{$data->title}}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-dollar-sign"></i> Price *</label>
                    <input type="number" step="0.01" name="price" value="{{$data->price}}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-percent"></i> Discount (%)</label>
                    <input type="number" step="0.01" name="discount_percentage" value="{{$data->discount_percentage}}" class="form-control" min="0" max="100" placeholder="e.g., 10, 25, 50">
                    <span class="form-hint">Leave empty for no discount (0-100%)</span>
                </div>
                
                <div class="form-group category-group">
                    <label class="form-label"><i class="fas fa-layer-group"></i> Category *</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select a category</option>
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}" {{ $data->category_id == $cat->id ? 'selected' : '' }}>
                                {{$cat->category_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-cubes"></i> Quantity *</label>
                    <input type="number" name="quantity" value="{{$data->Quantity}}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-ruler"></i> Sizes</label>
                    <input type="text" name="size" value="{{$data->size}}" placeholder="Ex: S,M,L,XL or 38,39,40,41,42" class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-image"></i> Current Image</label>
                    <div class="current-image">
                        <img src="/products/{{$data->image}}" alt="{{$data->title}}" width="150">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label"><i class="fas fa-upload"></i> New Image</label>
                    <input type="file" name="image" class="file-input">
                </div>
                
                <div class="form-group full-width">
                    <label class="form-label"><i class="fas fa-align-left"></i> Description *</label>
                    <textarea name="description" class="form-control" required>{{$data->description}}</textarea>
                </div>
            </div>
            
            <div class="buttons-container">
                <a href="{{ url('view_product') }}" class="btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update Product</button>
            </div>
            
            <div class="form-footer">
                <i class="fas fa-clock"></i> Last update: {{ date('m/d/Y H:i') }}
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    @include('admin.js')
  </body>
</html> 