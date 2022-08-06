<?php

namespace App\Core\Database;

class QueryBuilder
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAll($tableName)
    {
        
        $query = $this->pdo->prepare("SELECT * FROM {$tableName}");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function selectJoin($tableName1, $tableName2, $field, $connection, $alias)
    {

        $sql = "SELECT {$tableName1}.*, {$tableName2}.{$field} AS {$alias} FROM {$tableName1} LEFT JOIN {$tableName2} ON {$tableName1}.{$connection} = {$tableName2}.id;";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

 

    public function select($tableName, $filters)
    {

        $preparedFilters = array_map(function ($filter) {
            return $filter . "=:" . $filter;
        }, array_keys($filters));

        $sql = sprintf(
            'SELECT * FROM %s WHERE %s',
            $tableName,
            implode(', ', $preparedFilters)
        );


        $query = $this->pdo->prepare($sql);

        $query->execute($filters);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function update($tableName, $data)
    {


        $preparedFilters = array_map(function ($filter) {
            return $filter . "=:" . $filter;
        }, array_keys($data));

        unset($preparedFilters[0]);


        $sql = sprintf('UPDATE %s SET %s WHERE id=:id',
            $tableName,
            implode(', ', $preparedFilters)
        );

        $query = $this->pdo->prepare($sql);

        $query->execute($data);
    }

    public function insert($tableName, $data)
    {

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES(%s)',
            $tableName,
            implode(', ', array_keys($data)),
            ":" . implode(', :', array_keys($data))
        );

        try {
            $query = $this->pdo->prepare($sql);

            $query->execute($data);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            die;
        }

       
    }

     
    


    public function getOneAssoc($tableName, $field) //function added so that line 155 on this page could work (stdClass cannot be used)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$tableName} WHERE id='{$field}'");

        $query->execute();

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function getOneByField($table, $parameters)
    {

        $params = '';
        foreach($parameters as $key => $parameter) {
            $params.= "$key = '$parameter' AND ";
        }
        $params = substr($params, 0, -5);

        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$params}");


        $query->execute();

        return $query->fetch(\PDO::FETCH_OBJ);
    }


    public function delete($tableName, $data)
    {
        $sql = sprintf("DELETE FROM %s WHERE id=:id; ",
            $tableName
        );

        $query = $this->pdo->prepare($sql);
        $query->execute($data);
    }

 
}
