<?php
session_start();
if (empty($_SESSION['user_nick'])) {
    header("location:../../index.html");
}
$user = $_SESSION['user_nick']
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personagens da Comunidade - RPG</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-700">
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
    
    <h1 class="text-3xl text-center text-white p-4">Personagens da Comunidade</h1>

    <main class="flex items-center justify-center w-screen">
        <table class="table bg-black rounded">
            <thead class="rounded text-white bg-red-700 mx-2">
                <th class="rounded px-2">Nome</th>
                <th class="rounded px-2">Classe</th>
                <th class="rounded px-2">Poder de <br> Habilidade</th>
                <th class="rounded px-2">Dano de <br> Ataque</th>
                <th class="rounded px-2">Recarga de <br> habilidade</th>
                <th class="rounded px-2">Defesa</th>
                <th class="rounded px-2">Vida <br> Atual</th>
                <th class="rounded px-2">Criador</th>
            </thead>
            <tbody class="">
                <?php
                foreach ($_SESSION['list_persona'] as $persona) :
                ?>
                    <tr class="text-white text-center">
                        <td>
                            <?= $persona['persona_nick'] ?>
                        </td>
                        <td>
                            <?= $persona['persona_class'] ?>
                        </td>
                        <td>
                            <?= $persona['ap'] ?>
                        </td>
                        <td>
                            <?= $persona['ad'] ?>
                        </td>
                        <td>
                            <?= $persona['rl'] ?>
                        </td>
                        <td>
                            <?= $persona['def'] ?>
                        </td>
                        <td>
                            <?= $persona['hp'] ?>
                        </td>
                        <td>
                            <?= $persona['user_id_fp'] ?>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
    <section Class="flex items-center justify-center w-screen p-2">
        <a href="../Controller/persona.php?operation=My&user_id_fp=<?=$_SESSION['user_nick']?>" CLASS="rounded bg-red-700 text-white p-2" >Meus personagens</a> 
    </section>
</body>
</html>