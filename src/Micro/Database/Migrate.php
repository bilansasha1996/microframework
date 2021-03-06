<?php
namespace Bilan\Micro\Database;

use Bilan\Micro\Interfaces\Database\Migrate as MigrateInterface;

class Migrate implements MigrateInterface
{
    /**
     * @var string
     */
    protected $table = '';

    /**
     * @var string
     */
    protected $field = '';

    /**
     * @var string
     */
    protected $engine = '';

    /**
     * @var string
     */
    protected $charset = '';



    /**
     * Создание таблицы
     *
     * @return void
     */
    public function up()
    {
        $str  = implode(', ', $this->field);
        micro('db')->getConection()->query("CREATE TABLE IF NOT EXISTS $this->table ($str) Engine=$this->engine DEFAULT 
        CHARSET=$this->charset;");


    }

    /**
     * Удаление таблицы
     *
     * @return void
     */
    public function down()
    {
        micro('db')->getConection()->query("DROP TABLE IF EXISTS $this->table");
    }

}
