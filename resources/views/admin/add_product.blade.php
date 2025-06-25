<!DOCTYPE html>
<html lang="pt">
<head> 
    @include('admin.css')
    <style type="text/css">

        body{
            background-color: #2d3035;
        }

        .page-content {
            background-color: #000000;
        }

        .page-header {
            background-color: #2d3035;
        }

        .container-fluid {
            background-color: #2d3035;
        }

        section {
            background-color: #2d3035;
        }

        h2.h5 {
            color: #9935dc;
        }

        .no-margin-bottom {
            margin-bottom: 0;
        }

        .form-container {
            margin: 20px;
            background-color: #2d3035;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .page-title {
            color: #9935dc;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .form-section {
            background-color: #343a40;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #3d4148;
        }
        
        .section-title {
            color: #9935dc;
            font-size: 18px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #3d4148;
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
        
        @media (max-width: 992px) {
            .form-group {
                flex: 0 0 calc(50% - 20px);
            }
        }
        
        @media (max-width: 768px) {
            .form-group {
                flex: 0 0 calc(100% - 20px);
            }
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            color: #adb5bd;
            margin-bottom: 8px;
        }
        
        .form-control {
            width: 100%;
            height: 40px;
            background-color: #2d3035;
            border: 1px solid #3d4148;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            border-color: #9935dc;
            outline: none;
        }
        
        textarea.form-control {
            height: 100px;
            resize: vertical;
        }
        
        .form-hint {
            display: block;
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }
        
        .btn-primary {
            background-color: #9935dc;
            border-color: #9935dc;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #8429c5;
            border-color: #8429c5;
        }
        
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 40px;
            margin: 0;
            opacity: 0;
            cursor: pointer;
        }
        
        .file-upload-btn {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: 40px;
            padding: 8px 12px;
            background-color: #2d3035;
            border: 1px solid #3d4148;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .file-upload-text {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Add New Product</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="form-container">
                    
                    <form action="{{url('upload_product')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-section">
                            <h3 class="section-title">Product Information</h3>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Discount (%)</label>
                                    <input type="number" name="discount_percentage" class="form-control" min="0" max="100" step="0.01" placeholder="e.g., 10, 25, 50">
                                    <span class="form-hint">Leave empty for no discount (0-100%)</span>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="qty" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Sizes</label>
                                    <input type="text" name="size" class="form-control" placeholder="E.g.: S,M,L,XL or 38,39,40,41,42">
                                    <span class="form-hint">Separate sizes with commas</span>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select a category</option>
                                        @foreach($category as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Product Image</label>
                                    <div class="file-upload">
                                        <input type="file" name="image" class="file-upload-input" required>
                                        <div class="file-upload-btn">
                                            <i class="fa fa-upload"></i>
                                            <span class="file-upload-text">Choose file</span>
                                        </div>
                                    </div>
                                    <span class="form-hint">Supported formats: JPG, PNG, GIF</span>
                                </div>
                            </div>
                            
                            <div class="form-group" style="flex: 0 0 calc(100% - 20px); margin: 0 10px 20px;">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" required></textarea>
                                <span class="form-hint">Describe the product in detail</span>
                            </div>
                        </div>
                        
                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i> Add Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

</section>
    
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    
    <script>
        // Script para mostrar o nome do arquivo selecionado
        $(document).ready(function() {
            $('.file-upload-input').change(function() {
                var fileName = $(this).val().split('\\').pop();
                if (fileName) {
                    $('.file-upload-text').text(fileName);
                } else {
                    $('.file-upload-text').text('Escolher arquivo');
                }
            });
        });
    </script>
</body>
</html> 