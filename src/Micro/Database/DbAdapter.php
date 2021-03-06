<?php
namespace Bilan\Micro\Database;

use Bilan\Micro\Micro;
use Bilan\Micro\Support\Traits\Singleton;

/**
 * Адаптер для базы данных
 */
class DbAdapter
{
    use Singleton;

    /**
     * @var PDO $pdo
     */
    protected $pdo;

    /**
     * @var QueryBilder
     */
    protected $query;

    /**
     * Cоединение с базой. Создание объекта PDO.
     */
    public function __construct()
    {
        // Получаем массив конфирурации базы данных.
        $conection = Micro::getInstance()->get('db');
        $this->query = Micro::getInstance()->get('queryBilder');
        $this->pdo = $conection->getConection();
    }

    /**
     * Выполнение запроса в базу данных.
     *
     * @throws \Exception PDO error.
     *
     * @return array
     *
     */
    public function get(){
        try{
            $stmt = $this->pdo->prepare($this->query->bild());
            $stmt->execute($this->query->paramForExecute);
        }
        catch (\PDOException $e){
            return $stmt;
            throw  new \Exception('PDO error: ' . $e->getMessage());
        }
        return $stmt;
    }

    /**
     * Магический метод __coll. Вызвывется при попытке вызова у DbAdapter
     * методов формирования запросов.
     *
     * @return DbAdapter
     */
    public function __call($name, $arguments){
        // Вызываем метод класса QueryBilder
        $this->query = $this->query->$name(...$arguments);
        return $this;
    }

    /**
     * Открытие транзакции/
     *
     * @return bool
     */
    public function beginTransaction(){
        return micro('db')->getConection()->beginTransaction();
    }

    /**
     * Запись данных.
     *
     * @return bool
     */
    public function commit(){
        return micro('db')->getConection()->commit();
    }

    /**
     * Откат операции.
     *
     * @return bool
     */
    public function rollBack(){
        return micro('db')->getConection()->rollBack();
    }

}