<?php

namespace APP\MODEL\DAO;

use APP\Model\Connection;
use PDO;

class userDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('INSERT INTO user VALUES(null, ?, ?);');
        $stmt->bindParam(1, $object->user_nick);
        $stmt->bindParam(2, $object->user_password);
        return $stmt->execute();
    }
    public function update($object)
    {
    }
    public function findMy($user)
    {
        $connection = Connection::getConnection();
        $rs = $connection->query("select * from persona where user_id_fp = $user");
        return $rs->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $rs = $connection->query("select * from persona where persona_nick = $id");
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('delete from persona where persona_nick = ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
    public function findUser($user_nick)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("select user_nick,user_password from user where user_nick = '$user_nick'");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}