<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #00c6fb, #005bea);
        }
        .container {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }
        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ff4b5c;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            transition: background 0.3s;
        }
        .logout:hover {
            background: #d93749;
        }
        h2 {
            color: #005bea;
            margin-bottom: 15px;
        }
        p {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="logout">Logout</button>
</form>

      
        <h2>Welcome to the Dashboard!</h2>
        <p>Your account has been successfully created.</p>
    </div>

</body>
</html>