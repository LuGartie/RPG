<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DNS', 'mysql:host=localhost:3307;dbname=rpg');
    define('USER', 'root');
    define('PASSWORD', '');
}
//* incluir configurações do servidor.