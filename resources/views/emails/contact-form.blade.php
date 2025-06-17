<!DOCTYPE html>
<html>
<head>
    <title>Nova mensagem de contato</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #9935dc;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nova mensagem de contato</h1>
        </div>
        
        <div class="content">
            <p><strong>Nome:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Assunto:</strong> {{ $data['subject'] }}</p>
            <p><strong>Mensagem:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
        
        <div class="footer">
            <p>Esta mensagem foi enviada através do formulário de contato do site Bikes By Fazenda.</p>
        </div>
    </div>
</body>
</html> 