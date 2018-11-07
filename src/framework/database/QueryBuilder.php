<?php
declare(strict_types=1);

namespace Romek\framework\database;

use PDO;
use PDOStatement;

final class QueryBuilder
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get the PDO object
     *
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * Get all rows from a database table and return an array with standard classes
     *
     * @param string $table
     * @param null|string $intoClass
     * @param array $whereColumnConditionValueArray
     * @return array
     */
    public function selectAll(string $table, ?string $intoClass, array $whereColumnConditionValueArray = []): array
    {
        $sql = "SELECT * FROM {$table}";
        if (!empty($whereColumnConditionValueArray)) {
            $sql = $this->getSqlWhere($sql, $whereColumnConditionValueArray);
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $this->fetchAll($statement, $intoClass);
    }

    /**
     * Insert a row into a table
     *
     * @param string $table
     * @param array $parameters
     */
    public function insert(string $table, array $parameters)
    {
        $sql = $this->getSqlInsert($table, $parameters);

        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
    }

    /**
     * Update a column in the database
     *
     * @param string $table
     * @param string $column
     * @param string|int $value
     * @param array $whereColumnConditionValueArray
     */
    public function update(string $table, string $column, $value, array $whereColumnConditionValueArray = [])
    {
        $sql = sprintf(
            'UPDATE %s SET %s = %s',
            $table,
            $column,
            $this->getValue($value)
        );

        if (!empty($whereColumnConditionValueArray)) {
            $sql = $this->getSqlWhere($sql, $whereColumnConditionValueArray);
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    /**
     * Get all rows from a database table and return an array with standard classes
     *
     * @param string $table
     * @param array $whereColumnConditionValueArray
     */
    public function delete(string $table, array $whereColumnConditionValueArray)
    {
        $sql = "DELETE FROM {$table}";
        $sql = $this->getSqlWhere($sql, $whereColumnConditionValueArray);

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }

    /**
     * Helper method to create an insert statement (excluding parameter values)
     *
     * @param string $table
     * @param array $parameters
     * @return string
     */
    private function getSqlInsert(string $table, array $parameters): string
    {
        //convert an array to a string to get column names
        $columnNames = implode(', ', array_keys($parameters)); //this will output "column1, column2"

        //convert an array to a string where each column will be prefixed by a colon. This will output ":column1, :column2"
        $columnNamesPrefixedWithColon = implode(
            ', ',
            //after the array is converted with a prefix (":"), convert it into a comma separated string
            array_map(function ($column) {
                return ":{$column}"; //convert "column1" into ":column1"
            }, array_keys($parameters))
        );

        //replace the first %s by $table, the second %s by $columnNames and the third %s by $columnNamesPrefixedWithColon
        return sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            $columnNames,
            $columnNamesPrefixedWithColon
        );
    }

    /**
     * Helper method to create a where statement
     *
     * @param string $sql
     * @param array $whereColumnConditionValueArray
     * @return string
     */
    public function getSqlWhere(string $sql, array $whereColumnConditionValueArray)
    {
        $where = sprintf(
            'WHERE %s %s %s',
            $whereColumnConditionValueArray[0]['column'],
            $whereColumnConditionValueArray[0]['condition'],
            $this->getValue($whereColumnConditionValueArray[0]['value'])
        );

        for ($i = 0; $i < count($whereColumnConditionValueArray); $i++) {
            if ($i !== 0) {
                $where .= sprintf(
                    ' AND %s %s %s',
                    $whereColumnConditionValueArray[$i]['column'],
                    $whereColumnConditionValueArray[$i]['condition'],
                    $this->getValue($whereColumnConditionValueArray[$i]['value'])
                );
            }
        }
        return $sql . ' ' . $where;
    }

    /**
     * Helper method to fetch data with or without $intoClass
     *
     * @param PDOStatement $statement
     * @param string $intoClass
     * @return array
     */
    public function fetchAll(PDOStatement $statement, ?string $intoClass): array
    {
        if (is_null($intoClass)) {
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }

        $classPath = "Team13CD\\app\\models\\{$intoClass}";

        return $statement->fetchAll(PDO::FETCH_CLASS, $classPath);
    }


    /**
     * Setup the value (to update a row in the database) in a string
     * Note: can't use a switch, because php uses loose comparison (`null == false` is the same when using loose comparison)
     *
     * @param $value
     * @return string
     */
    private function getValue($value): string
    {
        if ($value === null) {
            return 'null';
        }

        if ($value === false) {
            return 'false';
        }

        if ($value === true) {
            return 'true';
        }

        return "'$value'";
    }
}
