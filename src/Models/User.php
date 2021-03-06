<?php
namespace Bilan\Models;

use Bilan\Micro\Model\Model;

class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * Добавления событий.
     */
    public function __construct()
    {
        $this->addEvent();
    }

    /**
     * Добавления событий
     *
     * @return void
     */
    public function addEvent()
    {
        $em = micro('em');
        $em->listen('user.created', function ($payload) {
            if ($payload->id === null) {
                return false;
            }
            return true;
        });
        $em->listen('user.deleted', function ($payload) {
            if ($payload->id === null) {
                return false;
            }
            return true;
        });
    }
}