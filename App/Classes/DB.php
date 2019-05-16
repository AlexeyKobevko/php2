<?php


namespace App\Classes;


use App\Traits\SingletonTrait;
use \PDO;


class DB
{
    use SingletonTrait;
    public $pdo;
    protected function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=geek_brains_shop;host=localhost', 'geek', '123123');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('SET NAMES utf8');
    }
    public function fetchAll($sql)
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetchOne($sql)
    {
        return $this->fetchAll($sql)[0] ?? null;
    }
    public function exec($sql, $parameters = [])
    {
        $sth = $this->pdo->prepare($sql);
        return $sth->execute($parameters);
    }
}