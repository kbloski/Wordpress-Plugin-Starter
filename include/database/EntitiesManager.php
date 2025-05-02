<?php

namespace Inc\Database;

use Inc\Database\Entities\ExampleEntity;

class EntitiesManager
{
    public static function initEntities()
    {
        ExampleEntity::createTable();
    }

    public static function destroyEntities()
    {
        ExampleEntity::dropTable();
    }
}