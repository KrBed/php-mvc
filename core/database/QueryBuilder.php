<?php


class QueryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $table
     * @param $className
     * @param array $ctorParams
     * @return array
     */
    public function selectAll($table, $className, array $ctorParams)
    {

        $statement = $this->pdo->prepare("SELECT * FROM {$table}");
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "{$className}", $ctorParams);
        return $tasks;
    }

    /**
     * @param $table
     * @param $parameters
     */
    public function insert($table, $parameters)
    {
        $props = implode(',', array_keys($parameters));
        $placeHolders = ':' . implode(', :', array_keys($parameters));

        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, $props, $placeHolders);
        try {
            $query = $this->pdo->prepare($sql);

            $query->bindParam(':name',$parameters["name"],PDO::PARAM_STR);
            $query->bindParam(':email',$parameters["email"],PDO::PARAM_STR);
            $query->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }

}
