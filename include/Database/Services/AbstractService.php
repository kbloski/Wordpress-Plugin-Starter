<?php

namespace Inc\Database\Services;

abstract class AbstractService implements IAbstractService {
    protected $table;
    protected $wpdb;

    public function __construct($table) {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $table; 
    }

    protected function map_placeholders(array $data): array {
        return array_map(function ($value) {
            if (is_int($value)) return '%d';
            if (is_float($value)) return '%f';
            return '%s';
        }, $data);
    }

    public function create(array $data) {
        $placeholders = $this->map_placeholders($data);

        $inserted = $this->wpdb->insert(
            $this->table,
            $data,
            $placeholders
        );

        return $inserted ? $this->wpdb->insert_id : false;
    }

    public function getById($id) {
        return $this->wpdb->get_row(
            $this->wpdb->prepare("SELECT * FROM {$this->table} WHERE id = %d", $id)
        );
    }
    
    public function getAll($orderby = 'id', $order = 'DESC') {
        return $this->wpdb->get_results(
            "SELECT * FROM {$this->table} ORDER BY {$orderby} {$order}"
        );
    }
    
    public function updateById($id, array $data) {
        $placeholders = $this->map_placeholders($data);

        return $this->wpdb->update(
            $this->table,
            $data,
            ['id' => $id],
            $placeholders,
            ['%d']
        );
    }

    public function deleteById($id) {
        return $this->wpdb->delete(
            $this->table,
            ['id' => $id],
            ['%d']
        );
    }
}
