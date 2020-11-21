<?php
namespace Wamp\www\model;  
class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogscripter;charset=utf8', 'root', '');
        return $db;
    }
}