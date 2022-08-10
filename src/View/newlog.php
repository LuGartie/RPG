<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criando sua conta!</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-700">
<header class="bg-black">
        <nav class="flex p-2 justify-between">
            <ul class="flex">
                <li>
                    <a class="text-white p-2" href="../../index.html">Home</a>
                </li>
                <li>
                    <a class="text-white p-2" href="src\View\newlog.php">Criar conta</a>
                </li>
            </ul>
            <form class="flex mx-2" action="../Controller/User.php?operation=login" method="POST">
                <input class="h-6 rounded mx-2" type="text" name="user_nick" id="user_nick" placeholder="Digite seu usuário">
                <input class="h-6 rounded mx-2" type="password" name="user_password" id="user_password" placeholder="Digite usa senha">
                <button type="submit" class="px-2 text-white bg-red-800 rounded mx-2">
                    Logar
                </button>
            </form>
        </nav>
    </header>
    <main class="flex items-center justify-center w-screen h-screen">
        <section class="flex items-center justify-center w-2/4 bg-black h-1/5">
            <form  action="../controller/User.php?operation=insert" method="POST">
                <article class="p-2">
                    <label for="user_nick" class="text-white">Nome de usuário</label>
                    <input class="rounded mx-2" type="text" name="user_nick" id="user_nick" placeholder="Digite seu nome de usuário">
                </article>
                <article  class="p-2">
                    <label for="user_nick" class="text-white">Senha</label>
                    <input class="rounded mx-2" type="password" name="user_password" id="user_password" placeholder="Digite uma senha">
                </article>
                <article  class="p-2">
                    <button type="submit mx-2" class="px-2 text-white bg-red-800 rounded mx-2">
                    Criar conta
                    </button>
                <a class="px-2 bg-gray-200 rounded mx-2" href="../../index.html">Cancelar</a>
                </article>
                
            </form>
        </section>
    </main>
    
</body>
</html>