<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class NoticiaDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('INSERT INTO noticia VALUES(null,?, ?, ?, ?, ?);');
        $stmt->bindParam(1, $object->name);
        $stmt->bindParam(2, $object->price);
        $stmt->bindParam(3, $object->quantity);
        $stmt->bindParam(4, $object->barCode);
        $stmt->bindParam(5, $object->isActive);
        return $stmt->execute();
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('UPDATE noticia SET titulo=?, conteudo=? WHERE id_noticia=?;');
        $stmt->bindParam(1, $object->name);
        $stmt->bindParam(2, $object->quantity);
        $stmt->bindParam(3, $object->product_code);
        return $stmt->execute();
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $rs = $connection->query('select * from noticia');
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $rs = $connection->query("select * from noticia where id_noticia = $id");
        return $rs->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare('delete from noticia where id_noticia = ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}