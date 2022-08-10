<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class PersonaDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('INSERT INTO persona VALUES(?, ?, ?, ?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $object->persona_nick);
        $stmt->bindParam(2, $object->persona_class);
        $stmt->bindParam(3, $object->ap);
        $stmt->bindParam(4, $object->ad);
        $stmt->bindParam(5, $object->rl);
        $stmt->bindParam(6, $object->def);
        $stmt->bindParam(7, $object->hp);
        $stmt->bindParam(8, $object->user);
        return $stmt->execute();
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('update persona set persona_class=?, ap=?, ad=?, rl=?, def=?, hp=?, user_id_fp=? WHERE persona_nick=?;');
        $stmt->bindParam(1, $object->persona_class);
        $stmt->bindParam(2, $object->ap);
        $stmt->bindParam(3, $object->ad);
        $stmt->bindParam(4, $object->rl);
        $stmt->bindParam(5, $object->def);
        $stmt->bindParam(6, $object->hp);
        $stmt->bindParam(7, $object->user);
        $stmt->bindParam(8, $object->persona_nick);
        return $stmt->execute();
    }
    public function findMy($user)
    {
        session_start();

        $connection = Connection::getConnection();
        $rs = $connection->query("select * from persona where user_id_fp = '$user'");
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $rs = $connection->query('select * from persona');
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findOne($nick)
    {
        $connection = Connection::getConnection();
        $rs = $connection->query("select * from persona where persona_nick = '$nick'");
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($nick)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("delete from persona where persona_nick = ?");
        $stmt->bindParam(1, $nick);
        return $stmt->execute();
    }
}