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
    <title>Meus Personagens - RPG</title>
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
    
    <h1 class="text-3xl text-center text-white p-4">Criar Personagem</h1>

    <main class="flex items-center justify-center w-screen">
        <form class="rounded bg-black w-3/4 p-4" action="../controller/Persona.php?operation=insert" method="POST">
            <section class="p-4 flex justify-center ">
                <label class="text-white" for="persona_nick">Nome</label>
                <input class="rounded mx-6" type="text" name="persona_nick" id="persona_nick" placeholder="">

                <label class="text-white" for="persona_class">Classe</label>
                <select class="rounded mx-6" name="persona_class" id="persona_class">
                    <option value="">
                        - - - - - -
                    </option>
                    <option value="G">
                        Guerreiro
                    </option>
                    <option value="E">
                        Escudeiro
                    </option>
                    <option value="M">
                        Mago
                    </option>
                    <option value="L">
                        Ladino
                    </option>
                </select>
            </section>
            <p class="text-2xl text-white text-center ">Status</p>
            <section class="flex justify-between p-2 mx-6">
                <label class="text-white" for="ap">Poder de habilidade</label>
                <input class="rounded" type="number" id="ap" name="ap" min="1" max="5">
                
                <label class="text-white" for="ad">Dano de ataque</label>
                <input class="rounded" type="number" id="ad" name="ad" min="1" max="5">
                
                <label class="text-white" for="rl">Recarga</label>
                <input class="rounded" type="number" id="rl" name="rl" min="1" max="5">
                
                <label class="text-white" for="def">Defesa</label>
                <input class="rounded" type="number" id="def" name="def" min="1" max="5">
            </section>
            <button type="submit" class="px-6 text-white bg-red-800 rounded m-4">
                    Criar
            </button>
            <button class="px-2 bg-gray-200 rounded mx-2">
                <a href="dashboard.php">Cancelar</a>
            </button>
        </form>
    </main>

    <h1 class="text-3xl text-center text-white p-4">Meus Personagens</h1>

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
                <th class="rounded w-10">Ações</th>
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
                        <td>
                            <a class="rounded bg-yellow-700" href="../Controller/Persona.php?operation=edit&persona=<?= $persona["persona_nick"] ?>">Editar</a>
                            <a class="rounded bg-red-700" href="../Controller/Persona.php?operation=delete&persona=<?= $persona["persona_nick"] ?>">Deletar</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>