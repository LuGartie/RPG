<?php
namespace APP\Model;

class Valido
{
    public static function userNameValido(string $user_nick):bool
    {
        return mb_strlen($user_nick) > 5;
    }
    public static function userSenhaValida(string $user_password):bool
    {
        return mb_strlen($user_password) > 9;
    }
    public static function personaNickValido(string $persona_nick):bool
    {
        return mb_strlen($persona_nick) > 5;
    }
    public static function validstatus(int $ap, int $ad, int $rl, int $def):bool
    {
        return $ap + $ad + $rl + $def == 10;
    }
}