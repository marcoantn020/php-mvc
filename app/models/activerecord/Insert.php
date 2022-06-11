<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Insert implements ActiveRecordExecuteInterface
{
    public function execute (ActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);
            $connection = Connection::connect();
            $prepare = $connection->prepare($query);
            return $prepare->execute($activeRecordInterface->getAttributes());
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        // INSERT INTO tbl_users (firstName, lastName) VALUES (:firstName,:lastName);
        $sql = "INSERT INTO {$activeRecordInterface->getTable()} (";
        $sql .= implode(',',array_keys($activeRecordInterface->getAttributes())) . ") VALUES (";
        $sql .= ":" . implode(',:',array_keys($activeRecordInterface->getAttributes())) . ");";
        return $sql;
    }
}