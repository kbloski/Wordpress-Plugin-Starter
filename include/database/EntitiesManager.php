<?php

namespace Inc\Database;

use Inc\Database\Entities\ExampleEntity;

class EntitiesManager
{
    public static function init_models()
    {
        ExampleEntity::create_table();
    }

    public static function destroy_models()
    {
        ExampleEntity::drop_table();
    }
}