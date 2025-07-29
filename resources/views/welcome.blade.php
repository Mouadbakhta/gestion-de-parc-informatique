<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4b6cb7, #182848);
            min-height: 100vh;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(8px);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        p {
            font-size: 1.2rem;
        }

        .btn-custom {
            margin-top: 20px;
            padding: 10px 25px;
            border-radius: 50px;
            background-color: #ff5f6d;
            border: none;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #ffc371;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="glass-card">
        <h1>Bienvenue sur {{ config('app.name') }}</h1>
        <p>Application de gestion du stock de matériel</p>

        @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-custom">Tableau de bord</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-custom">Se connecter</a>
            <a href="{{ route('register') }}" class="btn btn-custom ms-2">S'inscrire</a>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
