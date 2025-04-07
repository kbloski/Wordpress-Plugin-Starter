<?php

namespace Inc\Database;

use Inc\Database\Models\FeaturesModel;

class ModelsManager
{
    public static function init_models()
    {
        FeaturesModel::create_table();
    }

    public static function destroy_models()
    {
        FeaturesModel::drop_table();
    }
}