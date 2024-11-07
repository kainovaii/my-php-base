<?php
namespace Core\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database {
    public function connection()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'vegasrp',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        $capsule->setAsGlobal();
    
        $capsule->bootEloquent();

        return $capsule;
    }
}