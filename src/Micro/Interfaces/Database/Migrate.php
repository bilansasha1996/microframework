<?php
namespace Bilan\Micro\Interfaces\Database;

/**
 * Описывает интерфейс миграций в которых реализованы методы для создания и удаления таблиц.
 */
interface Migrate
{
    /**
    * Создание таблицы.
    *
    * @return void
    */
    public function up();

    /**
     * Удаление таблицы.
     *
     * @return void
     */
    public function down();

}