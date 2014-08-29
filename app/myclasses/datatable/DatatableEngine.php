<?php
namespace DinhTrong\Datatable;
class DatatableEngine {
    protected $query;
    public function __construct($query) {
        $this->query = $query;
    }
}

