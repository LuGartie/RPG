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
    <title>Editando Personagem - RPG</title>
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
    
    <h1 class="text-3xl text-center text-white p-4">Editar Personagem</h1>

    <main class="flex items-center justify-center w-screen">
        <form class="rounded bg-black w-3/4 p-4" action="../controller/Persona.php?operation=save" method="POST">
            <section class="p-4 flex justify-center mx-4 ">
                <?php
                $persona = $_SESSION['persona_edit'];
                ?>
                <label class="text-white px-4" for="persona_nick">Nome: <?= $persona['persona_nick']?></label>
                <input type="hidden" name="persona_nick" id="persona_nick" value=<?= $persona['persona_nick']?>>

                <label class="text-white" for="persona_class">Classe (<?= $persona['persona_class']?>)</label>
                <select class="rounded mx-6" name="class" id="class">
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
                <label class="text-white" for="ap">Poder de habilidade (<?= $persona['ap']?>)</label>
                <input class="rounded" type="number" id="ap" name="ap" min="1" max="5">
                
                <label class="text-white" for="ad">Dano de ataque (<?= $persona['ad']?>)</label>
                <input class="rounded" type="number" id="ad" name="ad" min="1" max="5">
                
                <label class="text-white" for="rl">Recarga (<?= $persona['rl']?>)</label>
                <input class="rounded" type="number" id="rl" name="rl" min="1" max="5">
                
                <label class="text-white" for="def">Defesa (<?= $persona['def']?>)</label>
                <input class="rounded" type="number" id="def" name="def" min="1" max="5">
            </section>
            <button type="submit" class="px-6 text-white bg-red-800 rounded m-4">
                    Salvar mudanças
            </button>
            <button class="px-2 bg-gray-200 rounded mx-2">
                <a href="dashboard.php">Cancelar</a>
            </button>
        </form>
    </main>
</body>
</html>