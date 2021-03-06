<?php
namespace Bilan\Micro\Interfaces\Model;

/**
 * Описывает интерфейс работы маппера.
 */
interface Mapper
{
    /**
     * Получаем модель.
     *
     * @param Model|string $model
     * @param int|array    $id если int - ищем по id, если array, ищем по where
     *
     * @return Model|Model[]
     */
    public function find($model, $id);

    /**
     * Сохраняем модель.
     *
     * @param Model $model
     *
     * @return bool
     */
    public function save(Model $model);

    /**
     * Получаем все модели из таблицы.
     *
     * @param Model|string $model
     *
     * @return Model[]
     */
    public function all($model);

    /**
     * Добавляем модель для транзакции.
     *
     * @param Model $model
     *
     * @return void
     */
    public function persist(Model $model);

    /**
     * Комитим данные в базу.
     *
     * @return bool
     */
    public function flush();

    /**
     * Удаляем модель.
     *
     * @param Model|string $model
     * @param int|array    $id если int - ищем по id, если array, ищем по where
     *
     * @return bool
     */
    public function delete($model, $id);
}