<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;
use Exception;

class Delete implements ActiveRecordExecuteInterface
{
    private string $field;
    private string $value;
    public function __construct (string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    public function execute (ActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);
            $connection = Connection::connect();
            $prepare = $connection->prepare($query);
            $prepare->execute([$this->field => $this->value]);
            return $prepare->rowCount();
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if ($activeRecordInterface->getAttributes()) {
            throw new Exception("To delete it is not necessary to pass attributes.");
        }
        // DELETE FROM tbl_users WHERE id = :id;
        $sql = "DELETE FROM {$activeRecordInterface->getTable()} WHERE {$this->field} = :{$this->field};";
        return $sql;
    }
}