<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;
use Exception;

class FindAll implements ActiveRecordExecuteInterface
{
    private array $where;
    private int $limit;
    private string $fields;
    public function __construct (string $fields = '*', array $where = [], int $limit = 0)
    {
        $this->fields = $fields;
        $this->limit = $limit;
        $this->where = $where;
    }

    public function execute (ActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);
            // return $query;
            $connection = Connection::connect();
            $prepare = $connection->prepare($query);
            $prepare->execute($this->where);
            return $prepare->fetchAll();
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if ($activeRecordInterface->getAttributes()) {
            throw new Exception("To delete it is not necessary to pass attributes.");
        }
        if (count($this->where) > 1) {
            throw new Exception("In where can only pass a search argument.");
        }
        $where = array_keys($this->where);
        // SELECT * FROM tbl_users;
        $sql = "SELECT {$this->fields} FROM {$activeRecordInterface->getTable()} ";
        $sql .= (!$this->where) ? '' : "WHERE {$where[0]} = :{$where[0]} ";
        $sql .= ($this->limit > 0) ? "LIMIT {$this->limit} ;" : '';
        return $sql;
    }
}