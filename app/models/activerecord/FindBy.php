<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;
use Exception;

class FindBy implements ActiveRecordExecuteInterface
{
    private string $identifier_field;
    private string $fields;
    private $value;
    public function __construct (string $identifier_field, $value, string $fields = '*')
    {
        $this->identifier_field = $identifier_field;
        $this->fields = $fields;
        $this->value = $value;
    }

    public function execute (ActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);
            $connection = Connection::connect();
            $prepare = $connection->prepare($query);
            $prepare->execute([$this->identifier_field => $this->value]);
            return $prepare->fetch();
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    private function createQuery(ActiveRecordInterface $activeRecordInterface)
    {
        if ($activeRecordInterface->getAttributes()) {
            throw new Exception("To delete it is not necessary to pass attributes.");
        }
        // SELECT * FROM tbl_users WHERE id = :id;
        $sql = "SELECT {$this->fields} FROM {$activeRecordInterface->getTable()} WHERE {$this->identifier_field} = :{$this->identifier_field};";
        return $sql;
    }
}