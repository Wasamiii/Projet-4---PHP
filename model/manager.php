<?php
namespace Wamp\www\model;  
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogscripter;charset=utf8', 'root', '');
        $db -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}