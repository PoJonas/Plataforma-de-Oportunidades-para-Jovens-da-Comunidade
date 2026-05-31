<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    @vite(['resources/css/app.css', 'resources/css/login.css', 'resources/js/app.js'])
</head>

<body>

    <div class="container-login">
        <div class="bem-vindo">
            <img src="{{ asset('img/logo-foguete sem fundo.svg') }}" alt="">
            <h4>Bem-vindo de volta</h4>
            <span>Acesse sua conta para continuar</span>
        </div>
        <form action="">

            <div class="usuario">
                <input type="text" name="usuario" id="usuario" required placeholder="">
                <label for="usuario">Email</label>
            </div>

            <div class="senha">
                <input type="password" id="senha" name="senha" required placeholder="">
                <label for="senha">Senha</label>
            </div>

            <div class="btn-login-container">
                <button type="submit" class="btn-login">Entrar</button>

                <a href="#" class="esqueciSenha">Esqueci a senha</a>
            </div>

        </form>
        <div class="cadastrar">
            <span>Não tem conta?</span>
            <a href="#">Cadastre-se</a>
        </div>
    </div>
</body>

</html>