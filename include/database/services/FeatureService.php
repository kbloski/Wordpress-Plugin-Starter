<?php 

namespace Inc\Database\Services;
use Inc\Database\Helpers\TableNameHelper;

class FeatureService extends AbstractService {
    public function __construct() {
        parent::__construct(TableNameHelper::get_feature_table_name());
    }

    public function get_feature_by_slug($slug) {
        return $this->wpdb->get_row(
            $this->wpdb->prepare("SELECT * FROM {$this->table} WHERE slug = %s", $slug),
            ARRAY_A
        );
    }
}
