<?php

namespace Inc\Database;

use Inc\Database\Entities\FeaturesEntity;

class EntitiesManager
{
    public static function init_models()
    {
        FeaturesEntity::create_table();
    }

    public static function destroy_models()
    {
        FeaturesEntity::drop_table();
    }
}