<?php

class Connection
{
    public static function make($config){
        try {

            $dbo = new PDO($config['connection'] .";dbname=" .$config["name"],$config["username"],$config["password"]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $dbo;
    }
}
