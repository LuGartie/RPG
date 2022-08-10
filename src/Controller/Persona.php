<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\PersonaDAO;
use APP\Utils\Redirect;
use APP\Model\Valido;
use APP\Model\Persona;
use PDOException;

if (empty($_GET['operation'])) {Redirect::redirect(message: 'Essa operação não existe!!!', type: 'error');}

switch ($_GET['operation']) {
    case 'insert':
        insertPersona();
        break;
    case 'delete':
        deletePersona();
        break;
    case 'list':
        listMyPersona();
        break;
    case 'My';
        findMy();
        break;
    case 'edit';
        editPersona();
        break;
    case 'save';
        saveEditPersona();
        break;
    default:
        Redirect::redirect(message: 'Operação informada é inválida!!!', type: 'error');
}

$error = array();

function insertPersona()
{
    if (empty($_POST)) {
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }

    session_start();
    $persona_nick = $_POST["persona_nick"];
    $persona_class = $_POST["persona_class"];
    $ap = $_POST["ap"];
    $ad = $_POST["ad"];
    $rl = $_POST["rl"];
    $def = $_POST["def"];
    $user = $_SESSION['user_nick'];

    $error = array();

    if (!Valido::personaNickValido($persona_nick)) {
        array_push($error, 'Nome invalido!!!');
    }

    if (!Valido::validstatus($ap, $ad, $rl, $def)) {
        array_push($error, 'A soma de seus pontos deve ser igual a 10!!!');
    }

    if ($error) {
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $persona = new Persona(
            persona_nick: $persona_nick,
            persona_class: $persona_class,
            ap: $ap,
            ad: $ad,
            rl: $rl,
            def: $def,
            hp: 100,
            user: $user
        );
        $dao = new PersonaDAO();

        try {
            $result = $dao->insert($persona);
            if ($result) {
                Redirect::redirect(message: 'Seu personagem foi criado com sucesso!');
            } else {
                Redirect::redirect(message: 'Não foi possível criar seu personagem.', type: 'error');
                var_dump($persona);
            }
        } catch (PDOException $e) {
            Redirect::redirect(message: 'Ocorreu um erro inesperado.', type: 'error'); // problemas aqui
        }
    }
}

function listMyPersona()
{
    $dao = new PersonaDAO();
    try {
        $persona = $dao->findAll();
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Ocorreu um erro inesperado.', type: 'error');
    }
    session_start();
    if ($persona) {
        $_SESSION['list_persona'] = $persona;
        header("location:../View/list_persona.php");
    } else {
        Redirect::redirect(message: ['Não há personagens cadastrados no sistema!!!'], type: 'warning');
    }
}

function findMy()
{
    $user = $_GET['user_id_fp'];
    $dao = new PersonaDAO();
    try {
        $persona = $dao->findMy($user);
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Ocorreu um erro inesperado.', type: 'warning');
    }
    session_start();
    if ($persona) {
        $_SESSION['list_persona'] = $persona;
        echo "Funciona";
        header("location:../View/newpersona.php");
    } else {
        header("location:../View/firstpersona.php");
    }
}

function deletePersona()
{
    $nick = $_GET['persona'];
    $dao = new PersonaDAO();
    try {
        $result = $dao->delete($nick);
        if ($result) {
            Redirect::redirect(message: 'Personagem removido com sucesso!!!');
        } else {
            Redirect::redirect(message: ['Não foi possível remover seu personagem!!!'], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Ocorreu um erro inesperado.', type: 'error');
    }
}

function editPersona()
{
    $nick = $_GET['persona'];
    $dao = new PersonaDAO();
    $data = $dao->findOne($nick);
    if ($data) {
        session_start();
        $_SESSION['persona_edit'] = $data;
        header('location:../View/editpersona.php');
    } else {
        Redirect::redirect(message: 'Personagem não localizado!');
    }
}
function saveEditPersona()
{
    if (empty($_POST)) {
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }
    session_start();
    $persona_nick = $_POST['persona_nick'];
    $persona_class = $_POST['class'];
    $ap = $_POST['ap'];
    $ad = $_POST['ad'];
    $rl = $_POST['rl'];
    $def = $_POST['def'];
    $user = $_SESSION['user_nick'];

    $error = array();
    if (!Valido::validstatus($ap, $ad, $rl, $def)) {
        array_push($error, 'A soma de seus pontos deve ser igual a 10!!!');
    }

    if ($error) {
        Redirect::redirect(message: $error, type: 'warning');
    } else {
        $persona = new Persona(
            persona_class: $persona_class,
            ap: $ap,
            ad: $ad,
            rl: $rl,
            def: $def,
            hp: 100,
            user: $user,
            persona_nick: $persona_nick,
        );
        $dao = new PersonaDAO();
        $result = $dao->update($persona);
        if ($result) {
            Redirect::redirect(message:'Personagem atualizado!');
        } else {
            Redirect::redirect(message:'Não foi possível atualizar o personagem!', type: 'warning');
        }
    }
}