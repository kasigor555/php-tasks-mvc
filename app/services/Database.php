<?php
namespace App\services;

use PDO;
use Aura\SqlQuery\QueryFactory;

class Database
{
  public function __construct(PDO $pdo, QueryFactory $queryFactory)
  {
    $this->pdo = $pdo;
    $this->queryFactory = $queryFactory;
  }

  public function getAll($table)
  {
    $select = $this->queryFactory->newSelect();
    $select->cols(['*'])
            ->from($table);
    $stm = $this->pdo->prepare($select->getStatement());
    $stm->execute($select->getBindValues());

    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getOne($table, $id)
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
}