<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #e8f0fe;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333333;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 5px;
            border: 1px solid #cccccc;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .form-btn {
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-btn:hover {
            background-color: #0056b3;
        }

        .sign-up-label {
            text-align: center;
            font-size: 0.875rem;
            color: #666666;
            margin-top: 1rem;
        }

        .sign-up-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .sign-up-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="title">Inscription</h1>
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <input type="text" id="name" name="name" class="input" placeholder="Nom" required>
            <input type="email" id="email" name="email" class="input" placeholder="Adresse e-mail" required>
            <input type="password" id="password" name="password" class="input" placeholder="Mot de passe" required>
            <input type="password" id="password_confirmation" name="password_confirmation" class="input" placeholder="Confirmer le mot de passe" required>
            <button type="submit" class="form-btn">S'inscrire</button>
        </form>
        <p class="sign-up-label">
            Vous avez déjà un compte ? <a href="{{ route('login') }}" class="sign-up-link">Se connecter</a>
        </p>
    </div>
</body>
</html>
