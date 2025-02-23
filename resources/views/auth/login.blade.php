<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: arial, san-serif;
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
                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                text-align: center;
                backdrop-filter: blur(10px);

            }
            h2{
                color: #005bea;
                margin-bottom: 15px;
            }
            input {
                display: block;
                width: calc(100%-20px);
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
            button:hover{
                background: #006cd1;
            }
            .social-buttons{
                display: flex;
                gap: 10px;
                margin-top: 15px;
                justify-content: center;
            }
            .social-buttons a {
                flex: 1;
                text-decoration: none;
                padding: 12px;
                border-radius: 6px;
                color: white;
                font-weight: bold;
                text-align: center;
                transition: opacity 0.3s;
            }
            .google {
                background: #db4437;
            }
            .facebook {
                background: #1877f2;

            }
            .social-buttons a:hover {
                opacity: 0.8;
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
                    <h2>Login</h2>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Login</button>
        </form>
        <p>or</p>
        <div class="social-buttons">
            <a href="{{route('google.redirect')}}" class="google">Google</a>
            <a href="{{route('facebook.redirect')}}" class="facebook">Facebook</a>
        </div>
        <p> <a href="{{route('register')}}" >Register</a></p>
        </div>
        </body>
        </htm>
