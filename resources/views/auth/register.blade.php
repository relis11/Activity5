<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            background: linear-gradient(135deg, #00c6fb, #005bea); 
            margin: 0;
        }
        .container { 
            width: 350px; 
            background: white; 
            padding: 30px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
            text-align: center;
            backdrop-filter: blur(10px);
        }
        h2 { 
            color: #005bea; 
            margin-bottom: 15px;
        }
        input { 
            display: block; 
            width: calc(100% - 20px); 
            margin: 10px auto; 
            padding: 12px; 
            border: 1px solid #ccc; 
            border-radius: 6px;
            font-size: 16px;
        }
        button { 
            width: 100%; 
            padding: 12px; 
            background: #0084ff; 
            color: white; 
            border: none; 
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover { 
            background: #006cd1; 
        }
        p a { 
            text-decoration: none; 
            color: #0084ff; 
            font-weight: bold;
        }
        p a:hover { 
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create an Account</h2>
        <form method="POST" action="{{ route('processRegister') }}">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>
</body>
</html>

