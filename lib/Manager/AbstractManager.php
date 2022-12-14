<?php

namespace Plugo\Manager;

require dirname(__DIR__, 2) . '/config/database.php';

abstract class AbstractManager {
    
    private function connect(): \PDO {
        $db = new \PDO(
            "mysql:host=" . DB_INFOS['host'] 
            . ";port=" . DB_INFOS['port'] 
            . ";dbname=" . DB_INFOS['dbname'],DB_INFOS['username'],DB_INFOS['password']
        );
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES utf8');
        return $db;
    }

    private function executeQuery(string $query, array $params = []): \PDOStatement {
        $db = $this->connect();
        $stmt = $db->prepare($query);
        foreach($params as $key => $param){
            $stmt->bindValue($key,$param);
        }
        $stmt->execute();
        return $stmt;
    }

    private function classToTable(string $class): string {
        $tmp = explode('\\', $class);
        return strtolower(end($tmp));
    }

    protected function readOne(string $class, array $clause) {
        $query = "SELECT * FROM " . $this->classToTable($class);
        $arrayVal = [];
        if($clause != null){
            $query = $query . " WHERE ";
            foreach($clause as $key => $val){
                if($key != array_key_last($clause)){
                    $query = $query . $key . " = :" . $key . " AND ";
                }else{
                    $query = $query . $key . " = :" . $key;
                }

                $arrayVal[$key] = $val;
            }
        }
        $stmt = $this->executeQuery($query, $arrayVal);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    protected function readMany(string $class, array $clause = null, array $orderBy = null) {
        $query = "SELECT * FROM " . $this->classToTable($class);
        $arrayVal = [];
        if($clause != null){
            $query = $query . " WHERE ";
            foreach($clause as $key => $val){
                if($key != array_key_last($clause)){
                    $query = $query . $key . " = :" . $key . " AND ";
                }else{
                    $query = $query . $key . " = :" . $key;
                }

                $arrayVal[$key] = $val;
            }
        }

        if($orderBy != null){
            $query = $query . " ORDER BY " . key($orderBy) . " :valueOrder";
            $valueOrder = $orderBy[key($orderBy)];

            $arrayVal['valueOrder'] = $valueOrder;
        }

        if($stmt = $this->executeQuery($query, $arrayVal)){
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
            return $stmt->fetchAll();
        }
        
    }

    protected function create(string $class, array $fields) {
        $query = "INSERT INTO " . $this->classToTable($class) . ' (';
        foreach(array_keys($fields) as $field){
            $query .= $field;
            if($field != array_key_last($fields)){
                $query .= ', ';
            }
        }
        $query .= ') VALUES (';
        foreach(array_keys($fields) as $field){
            $query .= ':' . $field;
            if($field != array_key_last($fields)){
                $query .= ', ';
            }
        }
        $query .= ')';
        return $this->executeQuery($query, $fields);
    }

    protected function update(string $class, array $fields, int $id) {
        $query = "UPDATE " . $this->classToTable($class) . " SET ";
        foreach(array_keys($fields) as $field) {
            $query .= $field . " = :" . $field;
            if($field != array_key_last($fields)){
                $query .= ', ';
            }
        }
        $query .= ' WHERE id = :id';
        $fields['id'] = $id;
        return $this->executeQuery($query, $fields);
    }

    protected function delete(string $class, int $id) {
        $query = "DELETE FROM " . $this->classToTable($class) . " WHERE id = :id";
        return $this->executeQuery($query, ['id' => $id]);
    }


}