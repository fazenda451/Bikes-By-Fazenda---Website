<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2d1e40;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .error-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
        }
        .error-title {
            font-size: 6rem;
            font-weight: bold;
            color: #a370f0;
        }
        .error-text {
            font-size: 1.5rem;
        }
        .btn-purple {
            background-color: #a370f0;
            border: none;
            color: white;
        }
        .btn-purple:hover {
            background-color: #8a5ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="error-box">
                    <div class="error-title">404</div>
                    <p class="error-text">Oops! The page you are looking for does not exist.</p>
                    <a href="/admin/dashboard" class="btn btn-purple">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>