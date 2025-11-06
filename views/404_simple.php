<?php http_response_code(404); ?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>404 - Sahifa topilmadi</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            margin-top: 15vh;
            background: #f4f4f4;
            color: #333;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        h1 {
            font-size: 6rem;
            margin: 0;
            color: #e74c3c;
        }

        p {
            font-size: 1.2rem;
            margin: 20px 0;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>404</h1>
    <p>Kechirasiz, bu yangilik yoki sahifa mavjud emas.</p>
    <p><a href="/">Bosh sahifaga qaytish</a></p>
</div>
</body>
</html>