<?php

namespace App\services;

use PDO;
use Aura\SqlQuery\QueryFactory;
use Locale;

class Database
{
  public function __construct(PDO $pdo, QueryFactory $queryFactory)
  {
    $this->pdo = $pdo;
    $this->queryFactory = $queryFactory;
  }

  public function getAll($table) // Вывести все жлементы
  {
    $select = $this->queryFactory->newSelect();
    $select->cols(['*'])
      ->from($table);
    $stm = $this->pdo->prepare($select->getStatement());
    $stm->execute($select->getBindValues());

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getOne($table, $id) // Вывести один элемент по ID
  {
    $select = $this->queryFactory->newSelect();
    $select->cols(['*'])
      ->from($table)
      ->where('id=:id')
      ->bindValue('id', $id);
    $stm = $this->pdo->prepare($select->getStatement());
    $stm->execute($select->getBindValues());

    return $stm->fetch(PDO::FETCH_ASSOC);
  }

  public function save($table, $data)
  {
    $insert = $this->queryFactory->newInsert();
    $insert
          ->into($table)
          ->cols($data);

    $stm = $this->pdo->prepare($insert->getStatement());
    $stm->execute($insert->getBindValues());
  }

  public function update($table, $id, $data)
  {
    $update = $this->queryFactory->newUpdate();
    $update
          ->table($table)
          ->cols($data)
          ->where('id = :id')
          ->bindValue('id', $id);

    $stm = $this->pdo->prepare($update->getStatement());
    $stm->execute($update->getBindValues());
  }

  public function delete($table, $id)
  {
    $delete = $this->queryFactory->newDelete();
    $delete
          ->from($table)
          ->where('id = :id')
          ->bindValue('id', $id);

    $stm = $this->pdo->prepare($delete->getStatement());
    $stm->execute($delete->getBindValues());
  }
}
