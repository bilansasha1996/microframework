<?php
namespace Bilan\Micro\Support\Traits;

trait Singleton 
{
    /**
     * @var Singleton
     */
    protected static $instance;

    /**
     * Не допускается вызов извне, чтобы предотвратить создание нескольких экземпляров.
     */
     private function __construct()
     {
     }

    /**
     * Предотвратить инстанции от клонирования (что бы создать второй экземпляр)
     */
    private function __clone()
    {
    }

    /**
     * Для избежания клонирования необходимо выполнить десериализацию (что бы создать второй экземпляр)
     */
    private function __wakeup()
    {
    }

    /**
     * Проверка на наличие уже созданного экземпляра класса
     *
     * @return Singleton $instance
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }
}