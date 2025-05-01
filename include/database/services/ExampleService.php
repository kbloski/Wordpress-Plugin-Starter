<?php 

namespace Inc\Database\Services;
use Inc\Database\Helpers\TableNameHelper;

class ExampleService extends AbstractService {
    public function __construct() {
        parent::__construct(TableNameHelper::get_example_table_name());
    }
}
