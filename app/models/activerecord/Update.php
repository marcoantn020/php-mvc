<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface as InterfacesActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface as InterfacesActiveRecordInterface;
use app\models\connection\Connection;
use Exception;

class Update implements InterfacesActiveRecordExecuteInterface
{
    private string $field;
    private string $value;
    public function __construct (string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    public function execute (InterfacesActiveRecordInterface $activeRecordInterface)
    {
        try {
            $query = $this->createQuery($activeRecordInterface);
            $connection = Connection::connect();
            $attributes = array_merge($activeRecordInterface->getAttributes(), [$this->field => $this->value]);
            $prepare = $connection->prepare($query);
            $prepare->execute($attributes);
            return $prepare->rowCount();
        } catch (\Throwable $th) {
            formatException($th);
        }
    }

    
    private function createQuery(InterfacesActiveRecordInterface $activeRecordInterface)
    {
        if (array_key_exists('id', $activeRecordInterface->getAttributes())) {
            throw new Exception("[ID] field cannot be passed to update.");
        }
        // UPDATE tbl_users SET firstName = :firstName, lastName = :lastName WHERE id =:id;
        $sql = "UPDATE {$activeRecordInterface->getTable()} SET ";
        foreach ($activeRecordInterface->getAttributes() as $key => $value) {
            $sql .= "{$key}=:{$key},"; 
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE {$this->field} = :{$this->field}";

        return $sql;
    }
}