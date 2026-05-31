<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <form action="">
        <div class="container-login">
            <div class="usuario">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" required placeholder=" seu@gmail.com">
            </div>

            <div class="senha">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required placeholder="••••••••">
            </div>

            <div class="btn-login-container">
                <button type="submit" class="btn-login">Entrar</button>
            </div>
        </div>
    </form>
</body>

</html>