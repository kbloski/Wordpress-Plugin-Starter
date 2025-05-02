<?php 

namespace Inc\Database\Services;
use Inc\Database\Helpers\TableNameHelper;

class FeatureService extends AbstractService {
    public function __construct() {
        parent::__construct(TableNameHelper::get_feature_table_name());
    }
}
