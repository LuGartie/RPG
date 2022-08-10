<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\UserDAO;
use APP\Utils\Redirect;
use APP\Model\Valido;
use APP\Model\User;
use PDOException;
//quando não ha operação
if (empty($_GET['operation'])) {Redirect::redirect(message: 'Essa operação não existe!!!', type: 'error');}

switch ($_GET['operation']) {
    case 'insert':
        insertUser();
        break;
    case 'login':
        findUser();
        break;
    case 'logout':
        logoutUser();
        break;
    default:
        Redirect::redirect(message: 'Operação informada é inválida!!!', type: 'error');
}

function findUser()
{
    $user_nick = $_POST['user_nick'];
    $user_password = $_POST['user_password'];

    $dao = new UserDAO();
    $result = $dao->findUser($user_nick);

    if(password_verify($user_password,$result['user_password'])){
        session_start();
        $_SESSION['user_nick'] = $user_nick;
        header("location:../View/dashboard.php");
    } else {
        Redirect::redirect(message:['Usuário ou senha inválidos!!!']);
    };
}

function logoutUser()
{
    unset($_SESSION['user_nick']);   
    header("location:../../index.html");
}

function insertUser()
{
    // quando a operação foi alcançada sem a inserção
    if(empty($_POST)){Redirect::redirect('Requisição inválida!', type:'error');}
    
    $user_nick = $_POST['user_nick'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

    $error = array();

    //Validações
    if (!Valido::userNameValido($user_nick)) {
        array_push($error, 'Seu nome de usuário deve conter ao menos 5 caracteres entre letras e números!!!');
    }
    if (!Valido::userSenhaValida($user_password)) {
        array_push($error, 'Sua senha deve conter ao menos 10 caracteres entre letras e números!!!');
    }

    if ($error) { //se houver erro
        Redirect::redirect(
            message: $error, type: 'warning'
        );
    } else { //se não houver erro
        $User = new User (
            user_nick: $user_nick,
            user_password: $user_password
        );

        $dao = new UserDAO;

        try {
            $result = $dao->insert($User);
        } catch (PDOException $e){
            Redirect::redirect(message:'Ocorreu um erro inesperado.', type: 'warning');
        }
        
        if ($result)
            Redirect::redirect(
                message: 'Você foi cadastrado com sucesso!!! Seja Bem-Vindo'
            );
        else
            Redirect::redirect(
                message: 'Não foi possível cadastrar sua conta.',
                type: 'error'
            );
    }
}