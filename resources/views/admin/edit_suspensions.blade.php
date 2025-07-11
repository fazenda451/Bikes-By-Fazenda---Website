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

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #adb5bd;
            margin-bottom: 8px;
            font-size: 16px;
            font-weight: 500;
        }
        
        .form-label i {
            margin-right: 8px;
            color: #9709e9;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 45px;
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
        
        .input-icon {
            position: absolute;
            top: 42px;
            left: 15px;
            color: #adb5bd;
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
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            display: inline-block;
            text-align: center;
            margin-right: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        }
        
        .info-box p {
            color: #adb5bd;
            font-size: 14px;
            margin: 0;
        }
        
        .suspension-types {
            display: flex;
            margin-bottom: 25px;
            gap: 15px;
        }
        
        .type-card {
            flex: 1;
            background-color: #333;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        
        .type-card i {
            font-size: 24px;
            color: #9709e9;
            margin-bottom: 10px;
        }
        
        .type-card h4 {
            color: #fff;
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .type-card p {
            color: #adb5bd;
            font-size: 14px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title"><i class="fas fa-motorcycle"></i> Update Suspension</h1>
            
            <div class="form-container">
                <div class="form-header">
                    <h2>Edit System Information</h2>
                    <p>Update the suspension system details for motorcycles</p>
                </div>
                
                <div class="suspension-types">
                    <div class="type-card">
                        <i class="fas fa-compress-alt"></i>
                        <h4>Telescopic</h4>
                        <p>Comfort and control</p>
                    </div>
                    <div class="type-card">
                        <i class="fas fa-expand-alt"></i>
                        <h4>Monoshock</h4>
                        <p>Superior performance</p>
                    </div>
                    <div class="type-card">
                        <i class="fas fa-balance-scale"></i>
                        <h4>Dual Shock</h4>
                        <p>Maximum stability</p>
                    </div>
                </div>
                
                <div class="info-box">
                    <h3><i class="fas fa-info-circle"></i> Important Information</h3>
                    <p>The suspension system is crucial for comfort, stability, and safety of the motorcycle. Choose the appropriate type for each model.</p>
                </div>
                
                <form action="{{url('update_suspensions', $data->id) }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label"><i class="fas fa-tag"></i> Suspension Type</label>
                        <i class="fas fa-compress-alt input-icon"></i>
                        <input type="text" name="suspension" value="{{$data->type}}" class="form-control" required placeholder="Ex: Telescopic, Monoshock, Dual Shock, etc.">
                    </div>
                    
                    <div class="buttons-container">
                        <a href="{{ url('view_suspensions') }}" class="btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                        <button type="submit" class="btn-primary"><i class="fas fa-save"></i> Update Suspension</button>
                    </div>
                    
                    <div class="form-footer">
                        <i class="fas fa-clock"></i> Last update: {{ date('m/d/Y H:i') }}
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @include('admin.js')
</body>
</html> 