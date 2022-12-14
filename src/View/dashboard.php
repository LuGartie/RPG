<?php
session_start();
if (empty($_SESSION['user_nick'])) {
    header("location:../../index.html");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - RPG</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="h-screen bg-gray-700">
    <header class="bg-black">
        <nav class="flex p-2 justify-between">
            <ul class="flex">
                <li>
                    <a class="text-white p-2" href="dashboard.php">Home</a>
                </li>
                <li>
                    <a class="text-white p-2" href="../Controller/persona.php?operation=My&user_id_fp=<?=$_SESSION['user_nick']?>">Meus Personagens</a>
                </li>
                <li>
                    <a class="text-white p-2" href="../Controller/persona.php?operation=list">Todos Personagens</a>
                </li>
            </ul>
            <article class="flex p-2">
                <p class="text-white">
                    <?php echo $_SESSION['user_nick']?>
                </p>
                <buttom class="px-2 text-white bg-red-800 rounded mx-2">
                    <a href="../Controller/User.php?operation=logout">LogOut</a>
                </button>
            </article>
        </nav>
    </header>
    <div>
        <section class="p-4 items-center flex justify-between mx-10">
            <article class="flex justify-between">
                <div class="mx-4 p-2 rounded-full bg-black">
                    <p class="text-white text-center">Guerreiro</p>
                    <img class="h-20" src="imagens\Guerreiro.png" alt="">
                </div>
                <article>
                    <p class="text-white">Ataques potentes de espada! <br>Avance e corte como guerreiro!</p>
                </article>
                <div class="mx-4 p-2 rounded-full bg-black">
                    <p class="text-white text-center">Escudeiro</p>
                    <img class="h-20" src="imagens\tanque.png" alt="">
                </div>
                <p class="text-white">Imponente como uma montanha! <br>Proteja os fracos com seu escudo!</p>
                <div class="mx-4 p-2 rounded-full bg-black">
                    <p class="text-white text-center">Mago</p>
                    <img class="h-20" src="imagens\Mago.png" alt="">
                </div>
                <p class="text-white">Poder Implac??vel! <br>Conquiste tudo pela m??gia!</p>
                <div class="mx-4 p-2 rounded-full bg-black">
                    <p class="text-white text-center">Ladino</p>
                    <img class="h-20" src="imagens\Ladino.png" alt="">
                </div>
                <p class="text-white">M??os leves e um olhar agu??ado! <br>Eles nem saber??o o que os!</p>
                
            </article>
        </section>
    </div>
</body>
</html>